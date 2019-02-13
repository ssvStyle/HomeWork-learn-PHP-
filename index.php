<!DOCTYPE html>
<!---->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Главная</title>
        <style>
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
        </style>
    </head>
        <?php include_once __DIR__ . '/function.php';?>
    <body>
        
        <h3>Главная</h3>
        
        <div class="container">
            
            <h3>Калькулятор</h3>
            
                <form action="" method="GET">

                    A: <input type="text" name="firstNumber" id="inputSize" size="2"><br>
                    <input type="radio" name="operation" value="A_plus_B" checked="checked">+<br>
                            <input type="radio" name="operation" value="A_minus_B">-<br>
                            <input type="radio" name="operation" value="A_multiplyBy_B">*<br>
                            <input type="radio" name="operation" value="A_divideBy_B">/<br>
                    B: <input type="text" name="secondNumber" id="inputSize" size="2"><br>
                    
                    
                    <br><button type="submit">=</button><br><br><b>Результат:</b><br><br>
                         <?php if (emptyVariableCheck($_GET['firstNumber'], $_GET['secondNumber']) && operationChecking($_GET['operation']) && numericCheck($_GET['firstNumber']) && numericCheck($_GET['secondNumber'])) {
                                echo $_GET['operation']($_GET['firstNumber'], $_GET['secondNumber']);
                         } else { ?>
                    <b class="warning">Ошибка:<br>Пустые поля, текст или не отмеченна операция!!!</b>
                         <?php } ?>
                </form>
            
            </div>
        
    </body>
    
</html>