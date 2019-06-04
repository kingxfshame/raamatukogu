<?php
require ('database.php');

function lisaZanri($zanrinimetus){
    global $connect;
    $kask=$connect->prepare("INSERT INTO zanrid(zanr)
VALUES (?)");
    $kask->bind_param("s",$zanrinimetus);
    $kask->execute();
}
function lisaAutor($nimi,$perekonnanimi){
    global $connect;
    $kask=$connect->prepare("INSERT INTO autor(nimi,perekonnanimi)
VALUES (?,?)");
    $kask->bind_param("ss",$nimi,$perekonnanimi);
    $kask->execute();
}



function lisaToode($toodeNimetus,$toodegruppID,$hind){
    global $yhendus;
    $kask=$yhendus->prepare("INSERT INTO toode(toodeNimetus,toodegruppID,hind)
VALUES (?,?,?)");
    $kask->bind_param("sdi",$toodeNimetus,$toodegruppID,$hind);
    $kask->execute();
}


function ToodeKustutamine($id){
    global $yhendus;
    $kask=$yhendus->prepare("DELETE FROM toode WHERE id=?");
    $kask->bind_param("i",$id);
    $kask->execute();
}


function redegerimine($taskOptionRedegeri , $redegtoodenimi , $redegtoodehind , $taskOptionRedeg){
    global $yhendus;
    $kask=$yhendus->prepare("UPDATE toode SET toodeNimetus =? , toodegruppID=? , hind = ? WHERE id= ?");
    $kask->bind_param("sidi",$redegtoodenimi , $taskOptionRedeg , $redegtoodehind ,$taskOptionRedegeri );
    $kask->execute();
}
?>
