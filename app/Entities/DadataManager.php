<?php

namespace App\Entities;

use Exception;
use Illuminate\Support\Facades\Http;

class DadataManager
{
  public const LEGAL_TYPE      = 'LEGAL';
  public const INDIVIDUAL_TYPE = 'INDIVIDUAL';
  public const LEGAL_COUNT      = 10;
  public const INDIVIDUAL_COUNT = 12;
  public const ONLY_DIGITS_REGEX = "/^\d+$/";


  protected string $type;
  protected string $inn;


  public function getOrganisationsByInn()
  {
    $response = Http::post("https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/party", [
      'query' => $this->inn,
      'type'  => $this->type,
    ]);
    dd($response);
  }

  public function setTypeFromInn() : self
  {
    $this->type = strlen($this->inn) === 10 ? self::LEGAL_TYPE : self::INDIVIDUAL_TYPE;

    return $this;
  }

  public function setType(string $type) : self
  {
    $this->type = $type;

    return $this;
  }

  public function setInn(string $inn) : self
  {
    $this->inn = $inn;

    $this->validateInn();

    return $this;
  }



  protected function validateInn() : void
  {
    $len = strlen($this->inn);
    if (
      $len === self::LEGAL_COUNT ||
      $len === self::INDIVIDUAL_COUNT ||
      preg_match(self::ONLY_DIGITS_REGEX, $this->inn)
    );
    else {
      throw new Exception('Inn is invalid!');
    }
  }
}
