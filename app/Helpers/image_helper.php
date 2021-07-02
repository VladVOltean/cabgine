<?php

function src($fileName, $idconsult){
    $path='/uploads/'.$idconsult.'/';
    return $path . $fileName;
}
?>