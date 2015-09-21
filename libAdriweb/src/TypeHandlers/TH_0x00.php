<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars\TypeHandlers;

include_once "ITIVarTypeHandler.php";

// Type Handler for type 0x00: Real
class TH_0x00 implements ITIVarTypeHandler
{
    public static function makeDataFromString($str = '', array $options = [])
    {
        if ($str == '' || !is_numeric($str))
        {
            throw new \Exception("Invalid input string. Needs to be a valid real number");
        }
        $number = (float)$str;
        $exponent = (int)floor(log10(abs($number)));
        $number *= pow(10, -$exponent);
        $str = str_replace(['-', '.'], '', sprintf('%0.14f', $number));

        $flags = 0;
        $flags |= ($number < 0) ? (1 << 7) : 0;
        $flags |= (isset($options['seqInit']) && $options['seqInit'] === true) ? 1 : 0;

        $data = [];
        $data[0] = $flags;
        $data[1] = $exponent + 0x80;
        for ($i = 2; $i < 9; $i++)
        {
            $data[$i] = hexdec(substr($str, 2*($i-2), 2)) & 0xFF;
        }

        return $data;
    }

    public static function makeStringFromData(array $data = [], array $options = [])
    {
        if (count($data) !== 9)
        {
            throw new \Exception("Invalid data array. Needs to contain 9 bytes");
        }
        $flags      = $data[0];
        $isNegative = ($flags >> 7 === 1);
//      $isUndef    = ($flags  & 1 === 1); // if true, "used for initial sequence values"
        $exponent   = $data[1] - 0x80;
        $number     = '';
        for ($i = 2; $i < 9; $i++)
        {
            $number .= dechex($data[$i]);
        }
        $number = substr($number, 0, 1) . '.' . substr($number, 1);
        $number = ($isNegative ? -1 : 1) * pow(10, $exponent) * ((float)$number);

        return (string)$number;
    }
}
