<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Doxygen extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'doxygen:config';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Обновляет конфигурацию Doxygen исходя из конфига проекта.';

  private string $default_doxygen_dir;
  private string $doxygen_dir;
  private string $os_command_check;

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();

    $this->default_doxygen_dir = base_path('doxygen');
    $this->os_command_check = PHP_OS_FAMILY === 'Linux' ? 'which' : 'where';
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $this->newLine();

    if (!`{$this->os_command_check} doxygen`) {
      $this->error('Command doxygen not found.');
      $this->warn('Check if doxygen is added to PATH.');
      return 0;
    }
    $doxygen_version = $this->getDoxygenVersion();
    $this->info(" Found doxygen version $doxygen_version.");

    if (!file_exists($this->default_doxygen_dir)) {
      $this->newLine();
      $this->warn(" Doxygen project not found.");
      // $answer = $this->confirm("Create a '{$this->default_doxygen_dir}' directory for Doxygen project? Сhoose 'no' to specify directory by yourself.");

      // if ($answer) {
      //   $this->doxygen_dir = $this->default_doxygen_dir;
      // }
      // else {
      //   $directory = null;
      //   do {
      //     $directory = $this->ask("Specify the directory where the Doxygen project will be placed as new folder");
      //     if ($this->isDirectoryEndWithNewDoxygenFolder($directory)) break;
      //   }
      //   while (!$this->isCorrectDoxygenDirectory($directory));
      //   $this->doxygen_dir = $this->guessDoxygenDirectory($directory);
      // }

      $this->doxygen_dir = $this->default_doxygen_dir;

      mkdir($this->doxygen_dir);
      $this->info(" Folder $this->doxygen_dir created.");


      // while ($this->isNotEmptyDirectory($this->doxygen_dir))
      // {
      //   $this->warn(" Directory '{$this->doxygen_dir}' is not empty!");
      //   $answer = $this->ask("Clear the directory and hit Enter or type 'exit' to shutdown");
      //   if ($answer === 'exit') return 0;
      // }

      $doxyfile = $this->getDoxyfilePath();
      exec("doxygen -g {$doxyfile}");
      $this->info(" Doxygen config file created.");

      $this->setConfigParameters();
      $this->info(" Doxygen config parameters is set.");

      exec("doxygen $doxyfile");
    }
  }

  private function getCurrentOSExecString()
  {
    if (PHP_OS_FAMILY === 'Linux') {
      return "( cat Doxyfile ; echo 'PROJECT_NUMBER=1.0' ) | doxygen -";
    }
    if (PHP_OS_FAMILY === 'Windows') {
      return "( type Doxyfile & echo PROJECT_NUMBER=1.0 ) | doxygen.exe -";
    }
  }

  private function getDoxygenVersion() : string
  {
    return exec('doxygen -v');
  }

  private function isCorrectDoxygenDirectory(?string $directory) : bool
  {
    if (in_array($directory, ['.', '/.', '..', '/..'], true)) {
      $this->error(" Directory $directory is invalid.");
      return false;
    }
    if (!file_exists($directory)) {
      $this->error(" Directory $directory does not exists.");

      return false;
    }

    return true;
  }

  private function isNotEmptyDirectory(string $directory) : bool
  {
    return count(scandir($directory)) > 2;
  }

  private function guessDoxygenDirectory(string $directory) : string
  {
    return $this->isDirectoryEndWithNewDoxygenFolder($directory) ?
      $directory :
      $directory . DIRECTORY_SEPARATOR . 'doxygen';
  }

  private function isDirectoryEndWithNewDoxygenFolder(string $directory) : bool
  {
    $array_path = $this->splitDirectory($directory);
    $len = count($array_path) - 1;
    return in_array($array_path[$len], ['Doxygen', 'doxygen']);
  }

  private function splitDirectory(string $directory) : array
  {
    return explode(DIRECTORY_SEPARATOR, $directory);
  }

  private function getDoxyfilePath() : string
  {
    return $this->doxygen_dir . DIRECTORY_SEPARATOR . 'Doxyfile';
  }



  private function setConfigParameters() : void
  {
    $doxyfile = $this->getDoxyfilePath();

    $parameters = [
      'PROJECT_NAME'     => "\"".config('app.name')."\"",
      'INPUT'            => app_path(),
      'OUTPUT_DIRECTORY' => $this->doxygen_dir,
      'EXTRACT_ALL'      => 'YES',
      'RECURSIVE'        => 'YES',
    ];

    $doxyspace = "            ";

    $result = '';
    $handle = fopen($doxyfile, "r+");
    if ($handle) {
      while (($line = fgets($handle)) !== false) {
        $newline = $line;
        if (str_contains($line, '=')) {
          foreach ($parameters as $parameter => $value) {
            if (str_contains($line, $parameter)) {
              $newline = "{$parameter}{$doxyspace} = {$value}";
              unset($parameters[$parameter]);
            }
          }
        }
        $result .= $newline;
      }
      fclose($handle);
    }
    else {
      $this->error('An error occured while read file.');
    }

    file_put_contents($this->getDoxyfilePath(), $result);
  }
}
