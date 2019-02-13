<!DOCTYPE html>
<!---->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Главная</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!--<style>
            .container {
                border: solid 3px #004d00;
                width: 128px;
                height: 350px;
                background: #e6ffe6;
                padding: 20px;
            }
            #inputSize{
                width: 100px;
            }
            .warning{
                color: red;
            }
        </style>-->
    </head>
        <?php include_once __DIR__ . '/function.php';?>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="#!">Главная<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#!">Гостевая книга<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#!">Disabled</a>
                </li>
              </ul>
            </div>
        </nav>
        
        <div class="container">
            <div class="row">
                <div class="col">
            
            <h4 class="text-center">Калькулятор</h4>
            
                <form action="" method="GET">

                    <input type="text" name="firstNumber" class="form-control" placeholder="A: ">
                    <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="operation" value="A_plus_B" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">+</label>
                    </div>
                    <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="operation" value="A_minus_B"  class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">-</label>
                    </div>
                    <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="operation" value="A_multiplyBy_B"  class="custom-control-input">
                            <label class="custom-control-label" for="customRadio3">*</label>
                    </div>
                    <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="operation" value="A_divideBy_B"  class="custom-control-input">
                            <label class="custom-control-label" for="customRadio4">/</label>
                    </div>
                   
                    <input type="text" name="secondNumber" id="inputSize" size="2" class="form-control" placeholder="B: "><br>
                    
                    
                    <button type="submit" class="btn btn-outline-info">=</button><br><br>
                    
                         <?php if (CheckingAllArguments($_GET)) { ?>
                             
                    <div class="alert alert-success" role="alert"> <h4>Результат: </h4><?php echo $_GET['operation']($_GET['firstNumber'], $_GET['secondNumber']); ?> </div>
                                
                            <?php } elseif (CheckingAllArguments($_GET) || !empty($_GET)) { ?>
                    
                    <div class="alert alert-warning" role="alert">Ошибка: <br> Пустые строки, текст или не выбрана операция!!</div>
                    
                             <?php } ?>
                </form>
                    </div>
                    <div class="col">
                            <h4 class="text-center">Галерея</h4>
                    </div>
                </div>
            </div>
        <hr>
    </body>
    
</html>