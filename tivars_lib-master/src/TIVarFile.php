<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars;

date_default_timezone_set('UTC');

include_once "BinaryFile.php";

class TIVarFile extends BinaryFile
{
    private $header = [
        'signature'     => null,
        'sig_extra'     => null,
        'comment'       => null,
        'entries_len'   => null
    ];
    private $varEntry = [
        'constBytes'    => null,
        'data_length'   => null,
        'typeID'        => null,
        'varname'       => null,
        'version'       => null,
        'archivedFlag'  => null,
        'data_length2'  => null,
        'data'          => null
    ];
    private $type = null;
    private $computedChecksum = null;
    private $inFileChecksum = null;
    private $isFromFile = null;

    // TODO: Handle multiple varEntries

    /**
     * Internal constructor, called from loadFromFile and createNew.
     * @param null $filePath
     * @throws \Exception
     */
    protected function __construct($filePath = '')
    {
        if ($filePath !== '')
        {
            $this->isFromFile = true;
            parent::__construct($filePath);
            $this->makeHeaderFromFile();
            $this->makeVarEntryFromFile();
            $this->computedChecksum = $this->computeChecksumFromFileData();
            $this->inFileChecksum = $this->getChecksumValueFromFile();
            $this->type = TIVarType::createFromID($this->varEntry['typeID']);
        } else {
            $this->isFromFile = false;
        }
    }

    public static function loadFromFile($filePath = '')
    {
        if ($filePath !== '')
        {
            return new self($filePath);
        } else {
            throw new \Exception("No file path given");
        }
    }

    public static function createNew(TIVarType $type = null, $name = '')
    {
        if ($type !== null)
        {
            $name = preg_replace('/[^A-Z0-9]/', '', $name);
            if ($name === '')
            {
                $name = 'FILE' . ((count($type->getExts()) > 0) ? $type->getExts()[0] : '');
                echo "Warning: Name was modified to: " . strtoupper(substr($name, 0, 8));
            }
            $name = strtoupper(substr($name, 0, 8));

            $instance = new self();
            $instance->type = $type;
            $instance->header = [
                'signature'     =>  "**TI83F*",
                'sig_extra'     =>  [ 0x1A, 0x0A, 0x00 ],
                'comment'       =>  str_pad("Created by tivars_lib on " . date("M j, Y"), 42, "\0"),
                'entries_len'   =>  [ 0x00, 0x00 ] // will have to be overwritten later
            ];
            $instance->varEntry = [
                'constBytes'    =>  [ 0x0B, 0x00 ],
                'data_length'   =>  [ 0x00, 0x00 ], // will have to be overwritten later
                'typeID'        =>  $type->getId(),
                'varname'       =>  str_pad($name, 8, "\0"),
                'version'       =>  0,
                'archivedFlag'  =>  0, // TODO: check when that needs to be 1.
                'data_length2'  =>  [ 0x00, 0x00 ], // will have to be overwritten later
                'data'          =>  null // will have to be overwritten later
            ];
            return $instance;
        } else {
            throw new \Exception("No file path given");
        }
    }


    /*** Makers ***/
    private function makeHeaderFromFile()
    {
        rewind($this->file);
        $this->header = [];
        $this->header['signature']   = $this->get_string_bytes(8);
        $this->header['sig_extra']   = $this->get_raw_bytes(3);
        $this->header['comment']     = $this->get_string_bytes(42);
        $this->header['entries_len'] = $this->get_raw_bytes(1)[0] + ($this->get_raw_bytes(1)[0] << 8);
    }

    private function makeVarEntryFromFile()
    {
        $dataSectionOffset = (8+3+42+2); // after header
        fseek($this->file, $dataSectionOffset);
        $this->varEntry = [];
        $this->varEntry['constBytes']   = $this->get_raw_bytes(2);
        $this->varEntry['data_length']  = $this->get_raw_bytes(1)[0] + ($this->get_raw_bytes(1)[0] << 8);
        $this->varEntry['typeID']       = $this->get_raw_bytes(1)[0];
        $this->varEntry['varname']      = $this->get_string_bytes(8);
        $this->varEntry['version']      = $this->get_raw_bytes(1)[0];
        $this->varEntry['archivedFlag'] = $this->get_raw_bytes(1)[0];
        $this->varEntry['data_length2'] = $this->get_raw_bytes(1)[0] + ($this->get_raw_bytes(1)[0] << 8);
        $this->varEntry['data']         = $this->get_raw_bytes($this->varEntry['data_length']);
    }


    /*** Getters ***/
    public function getHeader()
    {
        return $this->header;
    }

    public function getVarEntry()
    {
        return $this->varEntry;
    }

    public function getType()
    {
        return $this->type;
    }


    /*** Utils. ***/
    public function isValid()
    {
        return ($this->isFromFile) ? ($this->computedChecksum === $this->inFileChecksum) : ($this->computedChecksum !== null);
    }


    /*** Actions ***/
    public function fixChecksumInFile()
    {
        if ($this->isFromFile)
        {
            if (!$this->isValid())
            {
                fseek($this->file, $this->fileSize - 2);
                fwrite($this->file, chr($this->computedChecksum & 0xFF) . chr($this->computedChecksum >> 8));
                $this->inFileChecksum = $this->getChecksumValueFromFile();
            }
        } else {
            echo "[Error] No file loaded";
        }
    }

    public function computeChecksumFromFileData()
    {
        if ($this->isFromFile)
        {
            $dataSectionOffset = (8 + 3 + 42 + 2); // after header
            fseek($this->file, $dataSectionOffset);
            $sum = 0;
            for ($i = $dataSectionOffset; $i < $this->fileSize - 2; $i++)
            {
                $sum += $this->get_raw_bytes(1)[0];
            }
            return $sum & 0xFFFF;
        } else {
            echo "[Error] No file loaded";
            return -1;
        }
    }

    private function computeChecksumFromInstanceData()
    {
        return array_sum($this->varEntry['data']) & 0xFFFF;
    }

    public function getChecksumValueFromFile()
    {
        if ($this->isFromFile)
        {
            fseek($this->file, $this->fileSize - 2);
            return $this->get_raw_bytes(1)[0] + ($this->get_raw_bytes(1)[0] << 8);
        } else {
            echo "[Error] No file loaded";
            return -1;
        }
    }

    public function setContentFromData($data = null)
    {
        if ($data !== null)
        {
            $this->varEntry['data'] = $data;
            $this->computedChecksum = $this->computeChecksumFromInstanceData();
        } else {
            echo "[Error] No data given";
        }
    }

    public function setContentFromString($str = '')
    {
        $this->varEntry['data'] = $this->type->getTypeHandler()->makeDataFromString($str);
        $this->computedChecksum = $this->computeChecksumFromInstanceData();
    }

    public function getRawContent()
    {
        return $this->varEntry['data'];
    }

    public function getReadableContent()
    {
        return $this->type->getTypeHandler()->makeStringFromData($this->varEntry['data']);
    }

    public function saveVarToFile($filePath = '')
    {
        // TODO
    }

}