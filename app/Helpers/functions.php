<?php

function splitName($name){
    $name = trim($name);
    $nameArray = explode(" ", $name);
    return array($nameArray[0], $nameArray[1]);
}
