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
  protected $signature = 'doxygen:generate';

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

      $this->doxygen_dir = $this->default_doxygen_dir;

      mkdir($this->doxygen_dir);
      $this->info(" Folder $this->doxygen_dir created.");

      $doxyfile = $this->getDoxyfilePath();
      exec("doxygen -g {$doxyfile}");
      $this->info(" Doxygen config file created.");
    }
    else {
      $this->warn(" Found Doxygen project.");
    }
    $doxyfile = $this->getDoxyfilePath();

    $this->setConfigParameters();
    $this->info(" Doxygen config parameters is set.");

    exec("doxygen $doxyfile");
  }

  private function getDoxygenVersion() : string
  {
    return exec('doxygen -v');
  }

  private function splitDirectory(string $directory) : array
  {
    return explode(DIRECTORY_SEPARATOR, $directory);
  }

  private function getDoxyfilePath() : string
  {
    return $this->default_doxygen_dir . DIRECTORY_SEPARATOR . 'Doxyfile';
  }



  private function setConfigParameters() : void
  {
    $doxyfile = $this->getDoxyfilePath();

    $parameters = [
      'PROJECT_NAME'     => "\"".config('app.name')."\"",
      'INPUT'            => app_path() . " " . $this->get_laravel_path(),
      'OUTPUT_DIRECTORY' => $this->default_doxygen_dir,
      'EXTRACT_ALL'      => 'YES',
      'RECURSIVE'        => 'YES',
      'HAVE_DOT'         => 'YES',
      'CALL_GRAPH'       => 'YES',
      'CALLER_GRAPH'     => 'YES',
      'MAX_DOT_GRAPH_DEPTH' => '1',
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
              $newline = "{$parameter}{$doxyspace} = {$value}\n";
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

    file_put_contents($doxyfile, $result);
  }

  private function get_laravel_path() : string
  {
    $ds = DIRECTORY_SEPARATOR;
    return base_path("vendor{$ds}laravel{$ds}framework{$ds}src{$ds}Illuminate");
  }
}
