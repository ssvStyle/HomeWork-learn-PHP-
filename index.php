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
            <div class="row">
                <div class="col">
            
            <h4 class="text-center">Калькулятор</h4>
            
                <form action="" method="GET">

                    <input type="text" name="firstNumber" class="form-control" placeholder="A: " value="<?php   echo isset($_GET['firstNumber']) ? htmlspecialchars(trim($_GET['firstNumber'])) : '';?>">
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
                   
                    <input type="text" name="secondNumber" id="inputSize" size="2" class="form-control" placeholder="B: " value="<?php   echo isset($_GET['secondNumber']) ? htmlspecialchars(trim($_GET['secondNumber'])) : '';?>"><br>
                    
                    
                    <button type="submit" class="btn btn-outline-info">=</button><br><br>
                    
                    <?php 
                    
                    $firstNumber = isset($_GET['firstNumber']) ? htmlspecialchars(trim($_GET['firstNumber'])) : '';
                    $secondNumber = isset($_GET['secondNumber']) ? htmlspecialchars(trim($_GET['secondNumber'])) : '';
                    $nameOfOperation = isset($_GET['operation']) ? htmlspecialchars(trim($_GET['operation'])) : '';
                    
                    $inbox = ['firstNumber' => $firstNumber, 'secondNumber' => $secondNumber, 'operation' => $nameOfOperation];
                    
                    if (CheckingAllArguments($inbox)) { ?>

                        <div class="alert alert-success" role="alert"> <h4>Результат: </h4><?php echo $nameOfOperation($firstNumber, $secondNumber); ?> </div>

                    <?php } elseif (CheckingAllArguments($inbox) || !empty($_GET)) { ?>

                        <div class="alert alert-warning" role="alert">Ошибка: <br> Пустые строки, текст или не выбрана операция!!</div>

                    <?php } ?>
                </form>
                    </div>
                    <div class="col">
                            <h4 class="text-center">Галерея</h4>
                            
                            <?php $imageList = getImagelist();
                            
                                        foreach ($imageList as $key => $value) { ?>
                            
                            <a href="image.php?id=<?php echo $key;?>"><img class="img-thumbnail" width="120px" src="/HomeWork/img/gallery/<?php echo $value;?>" alt="image"></a>
                                        
                                <?php } ?>
                            
                    </div>
                
                </div>
            </div>
        <hr>
    </body>
    
</html>