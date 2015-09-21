<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars;

abstract class TIVarTypes
{
    private static $types = [];

    /**
     *  Make and insert the associative arrays for the type.
     *
     * @param string    $name   The name of the type
     * @param int       $id     The ID of the type
     * @param array     $exts   The extensions the type can have (order: 83+/84+, 84+CSE, 84+CE, 83PCE, 82A)
     */
    private static function insertType($name, $id, array $exts)
    {
        self::$types[$name]    = [ 'id'   => $id,   'exts' => $exts ];
        self::$types[$id]      = [ 'name' => $name, 'exts' => $exts ];
        foreach ($exts as $ext)
        {
            self::$types[$ext] = [ 'id'   => $id,   'name' => $name ];
        }
    }

    public static function initTIVarTypesArray()
    {
        self::insertType('Unknown',               -1,   [     ]);

        /* Standard types */
        self::insertType('Real',                0x00,   ['8xn']);
        self::insertType('RealList',            0x01,   ['8xl']);
        self::insertType('Matrix',              0x02,   ['8xm']);
        self::insertType('Equation',            0x03,   ['8xy']);
        self::insertType('String',              0x04,   ['8xs']);
        self::insertType('Program',             0x05,   ['8xp']);
        self::insertType('ProtectedProgram',    0x06,   ['8xp']);
        self::insertType('Picture',             0x07,   ['8xi', '8ci']);
        self::insertType('GraphDataBase',       0x08,   ['8xd']);
//      self::insertType('WindowSettings',      0x0B,   ['8xw']);
        self::insertType('Complex',             0x0C,   ['8xc']);
        self::insertType('ComplexList',         0x0D,   ['8xl']);
        self::insertType('WindowSettings',      0x0F,   ['8xw']);
        self::insertType('RecallWindow',        0x10,   ['8xz']);
        self::insertType('TableRange',          0x11,   ['8xt']);
        self::insertType('Backup',              0x13,   ['8xb', '8cb']);
        self::insertType('AppVar',              0x15,   ['8xv']);
        self::insertType('TemporaryItem',       0x16,   [     ]);
        self::insertType('GroupObject',         0x17,   ['8xg', '8cg']);
        self::insertType('Image',               0x1A,   [       '8ca']);

        /* Exact values (TI-83 Premium CE) */
        /* See https://docs.google.com/document/d/1P_OUbnZMZFg8zuOPJHAx34EnwxcQZ8HER9hPeOQ_dtI */
        self::insertType('ExactComplexFrac',    0x1B,   ['8xc']);
        self::insertType('ExactRealRadical',    0x1C,   ['8xn']);
        self::insertType('ExactComplexRadical', 0x1D,   ['8xc']);
        self::insertType('ExactComplexPi',      0x1E,   ['8xc']);
        self::insertType('ExactComplexPiFrac',  0x1F,   ['8xc']);
        self::insertType('ExactRealPi',         0x20,   ['8xn']);
        self::insertType('ExactRealPiFrac',     0x21,   ['8xn']);

        /* System/Flash-related things */
        self::insertType('OperatingSystem',     0x23,   ['8xu', '8cu', '8eu', '8pu', '82u']);
        self::insertType('FlashApp',            0x24,   ['8xk', '8ck', '8ek']);
        self::insertType('Certificate',         0x25,   ['8xq', '8cq']);
        self::insertType('CertificateMemory',   0x27,   [     ]);
        self::insertType('Clock',               0x29,   [     ]);
        self::insertType('FlashLicense',        0x3E,   [     ]);

        self::$types[0x0B] = self::$types[0x0F];
    }

    /**
     * @param   int     $id     The type ID
     * @return  string          The type name for that ID
     */
    public static function getNameFromID($id = -1)
    {
        if ($id !== -1 && isset(self::$types[$id]))
        {
            return self::$types[$id]['name'];
        } else {
            return 'Unknown';
        }
    }

    /**
     * @param   string  $name   The type name
     * @return  int             The type ID for that name
     */
    public static function getIDFromName($name = '')
    {
        if ($name !== '' && isset(self::$types[$name]))
        {
            return self::$types[$name]['id'];
        } else {
            return -1;
        }
    }

    /**
     * @param   int     $id     The type ID
     * @return  string[]        The array of extensions for that ID
     */
    public static function getExtensionsFromTypeID($id = -1)
    {
        if ($id !== -1 && isset(self::$types[$id]))
        {
            return self::$types[$id]['exts'];
        } else {
            return 'Unknown';
        }
    }

    /**
     * @param   string  $name
     * @return  string[]        The array of extensions for that ID
     */
    public static function getExtensionsFromName($name = '')
    {
        if ($name !== '' && isset(self::$types[$name]))
        {
            return self::$types[$name]['exts'];
        } else {
            return [];
        }
    }

    public static function isValidTypeID($id = -1)
    {
        return ($id >= 0 && is_int($id) && isset(self::$types[$id]));
    }

    public static function isValidTypeName($name = '')
    {
        return ($name !== '' && isset(self::$types[$name]));
    }
}

TIVarTypes::initTIVarTypesArray();
