<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars\TypeHandlers;

interface ITIVarTypeHandler
{
    public function makeDataFromString($str = '');

    public function makeStringFromData($data = null);
}