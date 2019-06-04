<?php
require('database.php');

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
    <!--стиль для авторизации в админ панель -->
    <style>

      #auth{display:none;}
      }
      #login{
      display: none;
      position: fixed;
      top: 200px;
      right: 800px;
      border: 3px solid #f1f1f1;
      z-index: 9;
      }
      .form-popup {
        display: none;
        position: fixed;
        top: 200px;
        right: 800px;
        border: 3px solid #f1f1f1;
        z-index: 9;
      }

      .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
      }

      .form-container input[type=text], .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
      }

      .form-container input[type=text]:focus, .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }

      .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
      }

      .form-container .cancel {
        background-color: red;
      }

      .form-container .btn:hover, .open-button:hover {
        opacity: 1;
      }
    </style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!--Скрипт для проверки введенных данных в форму авторизации -->
    <script>
    function OpenFunction() {
      document.getElementById("auth").style.display = "block";
    }
    function closeForm() {
        document.getElementById("auth").style.display = "none";
      }
    function check(form)
      {
        if(form.userid.value == "admin" && form.pswrd.value == "admin")
        {
          window.open('admin.php')
          document.getElementById("auth").style.display = "none";
            }
        else
        {
          alert("Не верный логин или пароль")
            }
      }
    </script>


</head>
<body>
  <div id="auth" class="form-popup">
  <form name="login" class="form-container">
      <b>Логин<b><input type="text" name="userid" placeholder="Введите Логин" required/>
      Пароль<input type="password" name="pswrd"placeholder="Введите Пароль" required/>
      <input type="button" onclick="check(this.form)" class="btn" value="Войти" />
      <input type="button" value="Отмена" class="btn cancel" onclick="closeForm();"/>
    </form>
  </div>
<div class="header">
    <h2 align="center">Библиотека</h2>
</div>

<ul>
    <li><a class="active" href="index.php">Все Книги</a></li>
    <li><a href="#" onclick="OpenFunction();">Администратор</a></li>
</ul>
<br>
<br>
<section id="team" class="pb-5">
      <div class="container">
          <h5 class="section-title h1">Все книги</h5>
          <div class="row">
              <!-- Team member -->
              <?php
              $database=$connect->prepare("SELECT raamatud.raamatu_nimi,raamatud.pilt,raamatud.kirjeldus,autor.nimi,autor.perekonnanimi,zanrid.zanr
                FROM raamatud,zanrid,autor
                WHERE  raamatud.autor = autor.autor_id
                AND raamatud.zanr = zanrid.zanrid_id
                ORDER by raamatud.autor ASC");
              $database->bind_result($raamatu_nimi, $pilt, $kirjeldus ,$nimi, $perekonnanimi , $zanrid);
              $database->execute();
              while($database->fetch()){
                echo '
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle("hover");">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="images/'.$pilt.'" alt="card image"></p>
                                        <h4 class="card-title">'.$raamatu_nimi.'</h4>
                                        <p class="card-text">Автор: '.$nimi.' '.$perekonnanimi.' <br> Жанр: '.$zanrid.'</p>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">'.$raamatu_nimi.'</h4>
                                        <p class="card-text">'.$kirjeldus.'</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-skype"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                ';
            }

              ?>
          </div>
      </div>
  </section>

</body>
</html>
