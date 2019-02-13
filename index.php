<!DOCTYPE html>
<!---->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Главная</title>
        <style>
            .container {
                border: solid 3px #004d00;
                width: 118px;
                height: 300px;
                background: #e6ffe6;
                padding: 20px;
            }
            #inputSize{
                width: 100px;
            }
        </style>
    </head>
        <?php include_once __DIR__ . '/function.php';?>
    <body>
        <pre>
        <?php var_dump($_GET); ?>
        </pre>
        
        <h3>Главная</h3>
        
        <div class="container">
            
            <h3>Калькулятор</h3>
            
                <form action="" method="GET">

                    <input type="text" name="firstNumber" id="inputSize" size="2"><br><input type="radio" name="operation" value="A_plus_B">+<br><input type="radio" name="operation" value="A_minus_B">-<br><input type="radio" name="operation" value="A_multiplyBy_B">*<br><input type="radio" name="operation" value="A_divideBy_B">/<br><input type="text" name="secondNumber" id="inputSize" size="2"><br>

                    <br><button type="submit">=</button><br><br><b>Результат: <?php echo $_GET['operation']($_GET['firstNumber'], $_GET['secondNumber']); ?></b>

                </form>
            
            </div>
        
    </body>
    
</html>