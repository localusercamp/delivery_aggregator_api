<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ActorServiceProvider extends ServiceProvider
{
  /**
   * Директория содержащая главный класс Action и всех его наследников.
   */
  protected $namespace = 'App\\Actions';

  /**
   * Основной класс Action.
   */
  protected $actor = 'App\\Helpers\\Actor';



  public function boot()
  {
    $this->actor::$namespace = $this->namespace;
  }
}
