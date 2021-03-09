<?php

namespace App\Actions\CompanyType;

use App\Contracts\Action;
use App\Models\CompanyType;

final class GetCompanyTypeListAction extends Action
{
  /**
   * Получает лист типов для компании
   */
  public static function run() : array
  {
    $company_type_list = CompanyType::get();
    return compact('company_type_list');
  }
}
