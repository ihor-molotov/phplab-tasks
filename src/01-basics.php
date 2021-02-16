<?php
/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater than 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter(int $minute)
{
    if ($minute > 0 && $minute <= 15) {
        $responce = 'first';
    } elseif ($minute > 15 && $minute <= 30) {
        $responce = 'second';
    } elseif ($minute > 30 && $minute <= 45) {
        $responce = 'third';
    } elseif ($minute > 45 && $minute <= 60 || $minute == 0) {
        $responce = 'fourth';
    } else {
        throw new InvalidArgumentException('The minute is negative or greater than 60');
    }
    return $responce;
}

/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower than 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $year
 * @return boolean
 * @throws InvalidArgumentException
 */
function isLeapYear(int $year)
{
    if ($year < 1900) {
        throw new InvalidArgumentException('The year is lower than 1900');
    }
    return (bool) date('L', mktime(0, 0, 0, 1, 1, $year));
}

/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more or less than 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  string  $input
 * @return boolean
 * @throws InvalidArgumentException
 */
function isSumEqual($input) {
    $first_res = 0;
    $second_res = 0;
    $sum_array = str_split($input);
    if (count($sum_array) != 6) {
      throw new InvalidArgumentException("InvalidArgumentException;");
    } else {
      for ($i = 0; $i < count($sum_array) / 2; $i++) {
        $first_res += $sum_array[$i];
      }
      for ($k = count($sum_array) - 1; $k >= count($sum_array) / 2; $k--) {
        $second_res += $sum_array[$k];
      }
      if ($first_res == $second_res) {
        return true;
      } else {
        return false;
      }
    }
  }
  
  