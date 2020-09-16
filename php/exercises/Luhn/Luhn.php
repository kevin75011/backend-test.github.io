<?php
declare(strict_types=1);

class Luhn
{
    public function isValid(string $str): bool
    {
        // Delete spaces
        $number = str_replace(' ','',$number);

        // Set the string length and parity
        $number_length=strlen($number);
        $parity=$number_length % 2;

        // Loop through each digit and do the maths
        $total=0;

        for ($i=0; $i<$number_length; $i++) {

              $digit=$number[$i];

              // Multiply even digits by two
              if ($i % 2 == $parity) {
                  $digit*=2;

                  // If the sum is two digits, subtract nine
                  if ($digit > 9) {
                      $digit-=9;
                  }
              }
              // Counter of digits
              $total+=$digit;     
        }

      // Mod 10 test
      return ($total % 10 == 0) ? true : false;
    }
}
