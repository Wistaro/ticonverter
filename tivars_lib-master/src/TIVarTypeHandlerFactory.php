<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars;

class TIVarTypeHandlerFactory
{
    /**
     * @param   int $typeID The type ID to get the handler of
     * @return  TypeHandlers\ITIVarTypeHandler
     */
    public static function create($typeID = -1)
    {
        $handler = null;
        $typeID = (int)$typeID;
        if (TIVarTypes::isValidTypeID($typeID))
        {
            $typeID_hex = (($typeID < 0x10) ? '0' : '') . dechex($typeID);
            $handlerName = "TH_0x{$typeID_hex}";
            $handlerIncludePath = __DIR__ . "/TypeHandlers/{$handlerName}.php";
            if (file_exists($handlerIncludePath))
            {
                include_once($handlerIncludePath);
                $fullHandlerName = 'tivars\TypeHandlers\\' . $handlerName;
                $handler = new $fullHandlerName;
            } else {
                include_once('TypeHandlers/TH_Unimplemented.php');
                $handler = new TypeHandlers\TH_Unimplemented();
            }
        } else {
            echo "[Error] Invalid var type ID";
        }
        return $handler;
    }
}