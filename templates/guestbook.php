<!DOCTYPE html>
<!---->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Главная</title>
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
        <div class="conteiner">
            
            <div class="row justify-content-center">
                
                <div class="col-md-12 offset-6">
                    
                <!--************Note block loop start************************************************-->
                    
                <?php $guestBook = new GuestBook('./guestbook.db'); 
                
                foreach ($guestBook->getData() as $note) { ?>
                    
                    <div class="media col-md-6 border box my-1 pl-0 p-1">

                            <img class="d-flex align-self-center mr-3 img-thumbnail" width="70px" src="/HomeWork/img/no-user-image.gif" alt="image">
                        <div class="media-body">
                            
                            <div class="row"><h5 class="col flex-item-md-between mt-0 pt-0 text-info">Гость</h5><p class="col text-secondary flex-item-md-between text-right mt-0 pt-0 mb-0">15.02.2019</p></div>
                          
                         <?php echo $note; ?>
                          
                        </div>

                    </div>
 
                    <?php } ?>
                <!--************Note block loop end************************************************-->
                </div>
                
                
                <div class="row col-md-6 pl-0 pr-0">
                    
                    <form action="GuestBook.php" method="POST" class="col-md-6">
                        
                    <div class="form-group col-md-6 pl-0">
                        <label for="formGroupExampleInput">Ваше имя</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="You name" name="name">
                    </div>
                        
                    <div class="form-group col-md-6 pl-0">
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email">
                    </div>
                        
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ваше сообщение</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                    </div>
                    
                  
                  
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
                  
                </form>
                    
                    <!--************Result (Add note) block start************************************************-->
                    
                    <?php 
                        $newNote = !empty($_POST['text']) ? htmlspecialchars(trim($_POST['text'])) : '';
                        $result = 0;
                    
                    if (strlen($newNote) > 5) {
                        
                        $guestBook->append($newNote)->save();?>
                    
                        <meta http-equiv="refresh" content="0; url=GuestBook.php?result=ok" />
                    
                    <?php } elseif (isset($_POST['text'])) { ?>
                        
                        <meta http-equiv="refresh" content="0; url=GuestBook.php?result=error" />
                    
                    <?php } ?>
                    
                    <!--************Result (Add note) block end************************************************-->
                    
                    <!--************Add note error block start************************************************-->
                    <?php if (isset($_GET['result'])) {
                        $result = $_GET['result'];
                    } ?>
                        
                    <?php if ($result === 'ok') { ?>
                        
                        <div class="row col-md-6 alert alert-success h-25 mx-0 justify-content-center" role="alert">Запись добавленна))</div>
                    
                    <?php } elseif ($result === 'error') { ?>
                    
                        <div class="row col-md-6 alert alert-warning h-25 mx-0 p-2" role="alert">Ошибка: Пустое поле или слишком короткое....</div>
                    
                    <?php } ?>
                    
                        
                        <!--************Add note error block end************************************************-->
                        
                </div>
                
            </div>
            
        </div>
        
        <hr>
        
    </body>
    
</html>