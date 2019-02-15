<!DOCTYPE html>
<!---->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Главная</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
        <?php include_once __DIR__ . '/function.php';?>
    <body>
        
        <?php include_once __DIR__ . '/navigation.php';?>
        
        <div class="container text-dark">
            <div class="row  justify-content-center">
                <div class="col-md-4">
                <form class="form-signin">
                  <img class="mb-4" src="/docs/4.2.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                  <label for="inputEmail" class="sr-only">Email address</label>
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <div class="checkbox mb-3">
                    <label>
                      <input type="checkbox" value="remember-me"> Remember me
                    </label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
                  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
                </form>
            </div>
            </div>
        </div>
        <hr>
    </body>
    
</html>
