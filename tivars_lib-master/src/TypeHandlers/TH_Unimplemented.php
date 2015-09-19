<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars\TypeHandlers;

include_once "ITypeHandler.php";

class TH_Unimplemented implements ITIVarTypeHandler
{
    public function makeDataFromString($str = '')
    {
        echo "This type is not supported / implemented (yet?)";
    }

    public function makeStringFromData($data = null)
    {
        echo "This type is not supported / implemented (yet?)";
    }
}