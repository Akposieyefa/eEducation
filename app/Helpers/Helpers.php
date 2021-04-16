<?php

namespace App\Helpers;

class Helpers
{
       public static function customIDGenerator($model, $trow, $length = 5, $prefix)
       {
              $data = $model::orderBy('id', "desc")->first();
              if (!$data) {
                     $main_length =    $length;
                     $last_number = "";
              } else {
                     $code = substr($data->$trow, strlen($prefix) + 1);
                     $actual_last_number = ($code / 1) * 1;
                     $increment_last_number = $actual_last_number + 1;
                     $last_number_length = strlen($increment_last_number);
                     $main_length = $length - $last_number_length;
                     $last_number = $increment_last_number;
              }
              $zeros = "";
              for ($i = 0; $i <  $main_length; $i++) {
                     $zeros .= "0";
              }
              return $prefix . '/' . $zeros . $last_number;
       }

       public static function formatAmount($number)
       {
              return number_format($number, 2, '.', ',');
       }
}
