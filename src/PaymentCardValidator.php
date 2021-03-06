<?php

class PaymentCardValidator {

    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Validates a number against the Luhn check algorithm
     * @return bool
     */
    public function isValid()
    {
        // Reverse the number
        $number = strrev($this->number);

        // Split up the number into chunks
        $number = str_split($number);

        // Maintain a rolling total
        $total = 0;

        // Starting from the second to last number double the number and then for every other number do the same
        for ($i = 1; $i < count($number); $i += 2)
        {
            $doubled_value = $number[$i] * 2;

            // If the doubled number is greater than 9 then add the constituent parts to the total e.g. 16 becomes 1 + 6 = 7
            if ($doubled_value > 9)
            {
                $number_parts = str_split($doubled_value);

                $total += $number_parts[0];
                $total += $number_parts[1];
            } 
            else
            {
                $total += $doubled_value;
            }
        }

        return ($total % 10 == 0) ? true : false;
    }
}
