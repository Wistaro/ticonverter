<?php
session_start();
echo '<meta charset="utf-8"><pre>';
//print_r($_SESSION);
echo '</pre>';

include('php/converter.class.php');

$file = new converter($_SESSION['src'], $_SESSION['format_convert'], $_SESSION['lang'],"Gest");

echo '<textarea>'.$file->GetSrc().'</textarea><br />';
echo '<textarea>'.$file->ColorToMono().'</textarea><br />';

