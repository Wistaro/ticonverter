<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars;

include_once "TIVarTypeHandlerFactory.php";

use tivars\TypeHandlers\ITIVarTypeHandler;

class TIVarType
{
    private $name = 'Unknown';
    private $id   = -1;
    private $exts = [];
    private $typeHandler = null;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getExts()
    {
        return $this->exts;
    }

    /**
     * @return ITIVarTypeHandler
     */
    public function getTypeHandler()
    {
        return $this->typeHandler;
    }

    /*** "Constructors" ***/

    /**
     * @param   int     $id     The type ID
     * @return  TIVarType
     */
    public static function createFromID($id = -1)
    {
        $instance = new self();
        $instance->id   = $id;
        $instance->exts = TIVarTypes::getExtensionsFromTypeID($id);
        $instance->name = TIVarTypes::getNameFromID($id);
        $instance->typeHandler = TIVarTypeHandlerFactory::create($id);
        return $instance;
    }

    /**
     * @param   string  $name   The type name
     * @return  TIVarType
     */
    public static function createFromName($name = '')
    {
        $instance = new self();
        $instance->name = $name;
        $instance->id   = TIVarTypes::getIDFromName($name);
        $instance->exts = TIVarTypes::getExtensionsFromName($name);
        $instance->typeHandler = TIVarTypeHandlerFactory::create($instance->id);
        return $instance;
    }
}
