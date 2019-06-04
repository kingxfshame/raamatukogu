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

function lisaRaamat($raamatu_nimi,$pilt,$autor,$kirjeldus,$zanr){
    global $connect;
    $kask=$connect->prepare("INSERT INTO raamatud(raamatu_nimi,pilt,autor,kirjeldus,zanr)
VALUES (?,?,?,?,?)");
    $kask->bind_param("ssisi",$raamatu_nimi,$pilt,$autor,$kirjeldus,$zanr);
    $kask->execute();
}




function kustutaAutor($id){
    global $connect;
    $kask=$connect->prepare("DELETE FROM autor WHERE autor_id=?");
    $kask->bind_param("i",$id);
    $kask->execute();
}


function kustutaZanr($id){
    global $connect;
    $kask=$connect->prepare("DELETE FROM zanrid WHERE zanrid_id=?");
    $kask->bind_param("i",$id);
    $kask->execute();
}
function kustutaRaamat($id){
    global $connect;
    $kask=$connect->prepare("DELETE FROM raamatud WHERE raamatud_id=?");
    $kask->bind_param("i",$id);
    $kask->execute();
}

function raamatuRedegeeremine($raamatud_id , $raamatu_nimi , $autor , $kirjeldus , $zanr){
    global $connect;
    $kask=$connect->prepare("UPDATE raamatud SET raamatu_nimi =? , autor=? , kirjeldus = ?, zanr = ? WHERE raamatud_id= ?");
    $kask->bind_param("sisii",$raamatu_nimi , $autor , $kirjeldus ,$zanr, $raamatud_id);
    $kask->execute();
}


function redegerimine($taskOptionRedegeri , $redegtoodenimi , $redegtoodehind , $taskOptionRedeg){
    global $yhendus;
    $kask=$yhendus->prepare("UPDATE toode SET toodeNimetus =? , toodegruppID=? , hind = ? WHERE id= ?");
    $kask->bind_param("sidi",$redegtoodenimi , $taskOptionRedeg , $redegtoodehind ,$taskOptionRedegeri );
    $kask->execute();
}
?>
