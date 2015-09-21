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
    public static function makeDataFromString($str = '', array $options = []);

    public static function makeStringFromData(array $data = [], array $options = []);
}