<?php

namespace App\Entities;

use CooperAV\SmsAero\SmsAero as SMSAero;

use App\Repositories\SMSRepository;
use App\Exceptions\SMS\MaximumRepeatsExceededException;

class SMSManager
{
  const MAX_REPEATS = 3;

  protected SMSAero $Sender;

  public string $send_type = 'DIRECT';

  function __construct()
  {
    $this->Sender = new SMSAero(config('smsaero.login'), config('smsaero.key'));
  }

  public function generateVerificationCode() : string
  {
    return rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
  }

  public function getSMS(string $phone) : ?SMS
  {
    $data_from_redis = SMSRepository::get("sms:${phone}");
    return $data_from_redis ? unserialize($data_from_redis) : null;
  }

  public function putSMS(SMS $sms, int $lifetime_in_minutes) : void
  {
    $sms->validate('phone');
    $this->checkForRepeating($sms);
    $redis_key = "sms:{$sms->phone}";
    $lifetime_in_seconds = $lifetime_in_minutes * SECONDS_IN_MINUTE;

    SMSRepository::store($redis_key, serialize($sms), $lifetime_in_seconds);
  }

  public function sendSMS(SMS $sms)
  {
    return $this->Sender->send($sms->full_phone, $sms->message, $this->send_type);
  }



  protected function checkForRepeating(SMS &$sms) : void
  {
    $prev_sms = $this->getSMS($sms->phone);
    if ($prev_sms) {
      $sms->repeat = $prev_sms->repeat;
    }
    if ($sms->repeat === self::MAX_REPEATS + 1) {
      throw new MaximumRepeatsExceededException();
    }
    $sms->repeat += 1;
  }
}
