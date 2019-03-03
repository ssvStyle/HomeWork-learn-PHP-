<!DOCTYPE html>
<!---->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Большое изображение</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    <body>
        
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Главная<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="GuestBook.php">Гостевая книга<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link disabled" href="#!">Disabled</a>
                            </li>
                          </ul>

                            <?php if(isset($_SESSION['id']) && isset($_SESSION['name'])) {?>

                            <ul class="nav justify-content-end">
                                <li class="nav-item">
                                    <p>Здравствуйте:  <?php echo $_SESSION['name']; ?>&nbsp;</p>
                                </li>
                                <li class="nav-item">
                                    <p><a href="signout.php">&nbsp;Выход</a></p>
                                </li>
                              </ul>

                            <?php } else { ?>

                            <ul class="nav justify-content-end">
                                <li class="nav-item">
                                  <a class="nav-link active" href="login.php">Войти</a>
                                </li>
                              </ul>

                            <?php } ?>

                        </div>
                    </nav>
        
        <!-- ^^^^Menu^^^^^-->
        
        <div class="col">
            
            <img class="img-fluid rounded mx-auto d-block" width="900 " src="/HomeWork/img/gallery/<?php echo getImageById($_GET['id']);?>" alt="image">
        
        </div>
    </body>
    
</html>