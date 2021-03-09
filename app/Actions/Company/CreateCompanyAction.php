<?php

namespace App\Actions\Company;

use App\Contracts\Action;
use App\Repositories\CompanyRepository;

final class CreateCompanyAction extends Action
{
  /**
   * Создает компанию
   */
  public static function run(
    string $title,
    string $address,
    string $inn,
    ?string $website,
    string $head,
    string $head_post,
    int $territory_id,
    int $type_id
  ) : array
  {
    $company = CompanyRepository::store($title, $address, $inn, $website, $head, $head_post, $territory_id, $type_id);
    return compact('company');
  }
}
