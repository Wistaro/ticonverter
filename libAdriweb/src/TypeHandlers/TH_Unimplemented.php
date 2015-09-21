<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars\TypeHandlers;

include_once "ITIVarTypeHandler.php";

class TH_Unimplemented implements ITIVarTypeHandler
{
    public static function makeDataFromString($str = '', array $options = [])
    {
        echo "This type is not supported / implemented (yet?)";
    }

    public static function makeStringFromData(array $data = [], array $options = [])
    {
        echo "This type is not supported / implemented (yet?)";
    }
}