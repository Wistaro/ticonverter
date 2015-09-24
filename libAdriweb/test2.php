<?php
include_once "src/autoloader.php";

use tivars\TIVarFile;
use tivars\TIVarType;
use tivars\TIVarTypes;


$testPrgm = TIVarFile::loadFromFile('../ressources/SNAKE.8xp');
echo "Code TI-Basic: " . $testPrgm->getReadableContent(['lang' => 'fr']) . "\n";



?> 