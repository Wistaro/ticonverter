<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars\TypeHandlers;

include_once "ITIVarTypeHandler.php";

// Type Handler for type 0x05: Program
class TH_0x05 implements ITIVarTypeHandler
{
    public function makeDataFromString($str = '')
    {
        // TODO: tokenize.
    }

    public function makeStringFromData($data = null)
    {
        // TODO: detokenize.
    }
}