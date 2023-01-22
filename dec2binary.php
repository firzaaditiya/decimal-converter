<?php

const BINARY_FORMAT = 2;
const ZERO = 0;
const ONE = 1;

function decimal2binary(int $decimalNumber) : string
{
    // validation invalid number
    if ($decimalNumber < 0) {
        throw new Exception(message: "Error. Invalid decimal number");
    }

    if ($decimalNumber == 0) {
        return ZERO;
    }

    $tempDecimal = $decimalNumber;
    $binary = array();

    while(true) {
        // Repeat the steps until the quotient (tempDecimal) is equal to 0.
        if ((int)$tempDecimal == ZERO) {
           break;
        }

        // check the remainder for
        if ($tempDecimal % BINARY_FORMAT == ZERO) {
            // Divide the number by 2
            $tempDecimal = $tempDecimal / BINARY_FORMAT;

            // Get the remainder for the binary digit.
            $binary[] = ZERO;
        } else {
            // Divide the number by 2
            $tempDecimal = $tempDecimal / BINARY_FORMAT;

            // Get the remainder for the binary digit.
            $binary[] = ONE;
        }
    }

    return implode("", array_reverse($binary));
}

// example implementations
try {
    echo decimal2binary(decimalNumber: 256) . PHP_EOL;
} catch(Exception $exception) {
    echo "Error : " . $exception->getMessage() . PHP_EOL;
}