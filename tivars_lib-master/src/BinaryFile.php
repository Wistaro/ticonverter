<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

namespace tivars;

class BinaryFile
{
    protected $file = null;
    protected $filePath = null;
    protected $fileSize = null;

    /**
     * @param null $filePath
     * @throws \Exception
     */
    protected function __construct($filePath = null)
    {
        if ($filePath !== null)
        {
            $this->file = fopen($filePath, 'rb+');
            if ($this->file === false)
            {
                throw new \Exception("Can't open the input file");
            }
            $this->filePath = $filePath;
            $this->fileSize = fstat($this->file)['size'];
        } else {
            throw new \Exception("No file path given");
        }
    }

    /**
     * Returns an array of $bytes bytes read from the file
     *
     * @param int $bytes
     * @return array|bool
     * @throws \Exception
     */
    public function get_raw_bytes($bytes = 1)
    {
        if ($this->file !== null)
        {
            return array_merge(unpack("C*", fread($this->file, $bytes)));
        } else {
            throw new \Exception("No file loaded");
        }
    }

    /**
     * Returns a string of up to $bytes bytes read from the file (stops at NUL)
     *
     * @param   int $bytes
     * @return string
     * @throws \Exception
     */
    public function get_string_bytes($bytes = 1)
    {
        if ($this->file !== null)
        {
            $str = '';
            $finished = false;
            while ($bytes--)
            {
                $tmp = fread($this->file, 1);
                if (!$finished)
                {
                    if (ord($tmp) === 0)
                    {
                        $finished = true;
                    } else {
                        $str .= $tmp;
                    }
                }
            }
            return $str;
        } else {
            throw new \Exception("No file loaded");
        }
    }

    public function close()
    {
        if ($this->file !== null)
        {
            fclose($this->file);
            $this->file = null;
        }
    }

    function size()
    {
        if ($this->file !== null)
        {
            return $this->fileSize;
        } else {
            throw new \Exception("No file loaded");
        }
    }

    function __destruct()
    {
        $this->close();
    }
}