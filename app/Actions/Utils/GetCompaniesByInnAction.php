<?php

namespace App\Actions\Utils;

use App\Contracts\Action;
use App\Entities\DadataManager;

final class GetCompaniesByInnAction extends Action
{
  /**
   * Делает запрос к dadata на получение информации о организациях по инн
   */
  public static function run(string $inn) : array
  {
    $DadataManager = new DadataManager();
    $DadataManager
      ->setInn($inn)
      ->setTypeFromInn()
      ->getOrganisationsByInn();
  }
}
