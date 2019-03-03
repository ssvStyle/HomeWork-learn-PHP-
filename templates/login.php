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
        
        <div class="container text-dark">
            
            <div class="row  justify-content-center">
                
                <div class="col-md-4">
                    
                    <form action="signin.php" method="POST" class="form-signin">
                    
                    <img class="mb-4" src="/docs/4.2.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                  
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                  
                    <label for="inputEmail" class="sr-only">login</label>
                  
                    <input type="text" id="inputEmail" class="form-control" placeholder="login" name="login" required autofocus>
                  
                    <label for="inputPassword" class="sr-only">Password</label><br>
                  
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required><br>
                  
                  <div class="checkbox mb-3">
                      
                    <label>
                        <input type="checkbox" value="remember-me" name="setCockie"> Remember me
                    </label>
                      
                  </div>
                  
                    <button class="btn btn-lg btn-primary btn-block" type="submit"  name="button" value="submit">Войти</button>
                  
                  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
                  
                </form>
                    
            </div>
            </div>
        </div>
        <hr>
    </body>
    
</html>
