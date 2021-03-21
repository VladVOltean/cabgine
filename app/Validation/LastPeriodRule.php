<?php

namespace App\Validation;


class LastPeriodRule
{

  function check_lastperiod(string $str, string $last_data, string &$error = null): bool
  {
    if ($str < date($last_data)) {
      return false;
    }
    return true;
  }
}
