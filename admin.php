<?php
require('php/funktsioonid.php');
if(isset($_REQUEST["ZanriLisamine"])) {
    lisaZanri($_REQUEST["uusZanriNimi"]);
    header("Location: admin.php");
    exit();
}
if(isset($_REQUEST["AutoriLisamine"])) {
    lisaAutor($_REQUEST["autorinimi"],$_REQUEST["autoriperekonnanimi"]);
    header("Location: admin.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hirmude maja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">
</head>
<body>
<div class="header">
    <h2 align="center">Библиотека</h2>
</div>

<ul>
    <li><a class="active" href="index.php">Все Книги</a></li>
</ul>
<h3 style="text-align:center;">Панель Администратора</h3>
<br>
<br>

<div id ="AutoriLisamine">
<a href="?add" class="btn btn-outline-primary">Добавить нового автора</a>
    <br>
    <br>
    <?php
    if(isset($_REQUEST["add"])){
        echo "<form action='admin.php' method='post'> ";
        echo "Имя Автора:";
        echo "<br>";
        echo "<input type='text' name='autorinimi'>";
        echo "<br>";
        echo "Фамилия:";
        echo "<br>";
        echo "<input type='text' name='autoriperekonnanimi'>";
        echo "<br>";
        echo "<br>";
        echo "<input type='submit' name='AutoriLisamine' value='Добавить' class=\"btn btn-outline-success\">";
    }
    ?>
</div>
<div id ="ZanriLisamine">
<a href="?addgrupp" class="btn btn-outline-primary">Добавить Новый Жанр</a>
    <br>
    <br>
    <?php
    if(isset($_REQUEST["addgrupp"])){
        echo "<form action='admin.php'>";
        echo "Название нового жанра: ";
        echo "<br>";
        echo "<input type='text' name='uusZanriNimi'>";
        echo "<br>";
        echo "<br>";
        echo "<input type='submit' name='ZanriLisamine' value='Добавить' class=\"btn btn-outline-success\">";
    }

    ?>
</div>

<div id ="raamatu_lisamine">
<a href="?addraamat" class="btn btn-outline-primary">Добавить новую Книгу</a>
    <br>
    <br>
    <?php
    if(isset($_REQUEST["addraamat"])){
        echo "<form action='admin.php'>";
        echo "Название Книги: ";
        echo "<br>";
        echo "<input type='text' name='uusRamatuNimi'>";
        echo "<br>";
        echo "Описание: ";
        echo "<br>";
        echo "<input type='text' name='uusRamatuKirjeldus'>";
        echo "<br>";
        echo "Автор: ";
        echo "<br>";

        echo "<select name='autor'>";
        $kask=$connect->prepare("SELECT autor_id,nimi,perekonnanimi FROM autor ");
        $kask->bind_result($id,$nimi,$perekonnanimi);
        $kask->execute();
        while($kask->fetch()){
            echo "<option value='$id'>$nimi $perekonnanimi</option>";
        }
        echo "</select>";

        echo "<br>";
        echo "Жанр: ";
        echo "<br>";

        echo "<select name='zanr'>";
        $kask=$connect->prepare("SELECT zanrid_id,zanr FROM zanrid ");
        $kask->bind_result($id,$zanr);
        $kask->execute();
        while($kask->fetch()){
            echo "<option value='$id'>$zanr</option>";
        }
        echo "</select>";

        echo "<br>";
        echo "Обложка книги: ";
        echo "<br>";
        echo "<input type='file' name='myImage' accept='image/jpeg'>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<input type='submit' name='ZanriLisamine' value='Добавить' class=\"btn btn-outline-success\">";
    }

    ?>
</div>









<div id ="Ramatukustutamine">
    <a href="?udalenie" class="btn btn-outline-primary">Удалить Книгу</a>
    <br>
    <br>
    <?php
    if(isset($_REQUEST["udalenie"])){
        echo "<form action='admin.php'>";
        echo "Название Книги:";
        echo "<br>";
        echo "<select name='taskOptionDelete'>";
        $kask=$connect->prepare("SELECT raamatud_id,raamatu_nimi FROM raamatud ");
        $kask->bind_result($id,$raamatu_nimi);
        $kask->execute();
        while($kask->fetch()){
            echo "<option value='$id'>$raamatu_nimi</option>";
        }
        echo "</select>";
        echo "<br>";
        echo "<br>";
        echo "<input type='submit' name='ToodeKustutamine' value='Удалить' class=\"btn btn-outline-danger\">";
    }

    ?>
</div>
<div id ="RedegRaamat">
    <a href="?redeg" class="btn btn-outline-primary">Редактировать Книгу</a>
    <br>
    <br>
    <?php
    if(isset($_REQUEST["redeg"])){
        echo "<form action='admin.php'>";
        echo "Выберите Книгу:";
        echo "<br>";
        echo "<select name='taskOptionRedegeri'>";

        $kask=$connect->prepare("SELECT raamatud.raamatud_id,raamatud.raamatu_nimi,raamatud.pilt,raamatud.kirjeldus,autor.nimi,autor.perekonnanimi,zanrid.zanr
          FROM raamatud,zanrid,autor
          WHERE  raamatud.autor = autor.autor_id
          AND raamatud.zanr = zanrid.zanrid_id");
        $kask->bind_result($raamatud_id,$raamatu_nimi, $pilt, $kirjeldus ,$nimi, $perekonnanimi , $zanrid);
        $kask->execute();
        while($kask->fetch()){
            echo "<option value='$raamatud_id'>$raamatu_nimi</option>";
        }
        echo "</select>";
        echo "<br>";
        echo "------------";
        echo "<br>";
        echo "<form action='admin.php' method='post'> ";
        echo "Toode nimi:";
        echo "<br>";
        echo "<input type='text' name='redegtoodenimi'>";
        echo "<br>";
        echo "Hind:";
        echo "<br>";
        echo "<input type='text' name='redegtoodehind'>";
        echo "<br>";
        echo "Toode Grupp:";
        echo "<br>";
        echo "<select name='taskOptionRedeg'>";
        $kask=$yhendus->prepare("SELECT id,toodeGruppiNimi FROM toodegrupp ");
        $kask->bind_result($id,$toodegrupp);
        $kask->execute();
        while($kask->fetch()){
            echo "<option value='$id'>$toodegrupp</option>";
        }
        echo "</select>";

        echo "<br>";
        echo "<br>";






        echo "<input type='submit' name='ToodeRedegeerimine' value='Redegeeri' class=\"btn btn-outline-info\">";
    }

    ?>
</div>




















    <div class="footer">
        <p>artur.kexpa()gmail.com <br>
          Artur Šumilo
        </p>
    </div>

</body>
</html>
