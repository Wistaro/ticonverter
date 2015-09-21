<?php
/*
 * Part of tivars_lib
 * (C) 2015 Adrien 'Adriweb' Bertrand
 * https://github.com/adriweb/tivars_lib
 * License: MIT
 */

include_once "src/autoloader.php";

use tivars\TIVarFile;
use tivars\TIVarType;
use tivars\TIVarTypes;


assert(TIVarTypes::getIDFromName("ExactRealPi") === 32);


$testPrgm = TIVarFile::loadFromFile('testData/ProtectedProgram_long.8xp');
assert($testPrgm->getHeader()['entries_len'] === $testPrgm->size() - 57);
$newPrgm = TIVarFile::createNew(TIVarType::createFromName("Program"));
$newPrgm->setContentFromString($testPrgm->getReadableContent(['lang' => 'fr']));
assert($testPrgm->getRawContent() === $newPrgm->getRawContent());


$testPrgm = TIVarFile::loadFromFile('testData/Program.8xp');
$newPrgm = TIVarFile::createNew(TIVarType::createFromName("Program"));
$newPrgm->setContentFromString($testPrgm->getReadableContent(['lang' => 'en']));
assert($testPrgm->getRawContent() === $newPrgm->getRawContent());


$testReal = TIVarFile::loadFromFile('testData/Real_neg.8xn'); // -42.1337
$newReal = TIVarFile::createNew(TIVarType::createFromName("Real"));
$newReal->setContentFromString('-42.1337');
assert($testReal->getReadableContent() === '-42.1337');
assert($testReal->getRawContent() === $newReal->getRawContent());

?>