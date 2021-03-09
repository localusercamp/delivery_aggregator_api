<?php

namespace App\Repositories;

use App\Models\Company;
use App\Contracts\Repository;
use App\Models\Status;

class CompanyRepository extends Repository
{
  public static function store(
    string $title,
    string $address,
    string $inn,
    ?string $website,
    string $head,
    string $head_post,
    int $territory_id,
    int $type_id
  ) : Company
  {
    $company = new Company();
    $company->title        = $title;
    $company->address      = $address;
    $company->inn          = $inn;
    $company->website      = $website;
    $company->head         = $head;
    $company->head_post    = $head_post;
    $company->territory_id = $territory_id;
    $company->type_id      = $type_id;
    $company->status_id    = Status::REVIEW;
    $company->owner_id     = auth()->id();
    $company->save();

    return $company;
  }
}
