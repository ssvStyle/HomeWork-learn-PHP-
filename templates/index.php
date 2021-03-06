        <div class="container text-dark">
            
            
            <div class="row">
                <div class="col">
            
            <h4 class="text-center">Калькулятор</h4>
            
            <form method="GET">

                    <input type="text" name="firstDigit" class="form-control" placeholder="A: " value="<?php   echo isset($_GET['firstDigit']) ? htmlspecialchars(trim($_GET['firstDigit'])) : '';?>">
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
                   
                    <input type="text" name="secondDigit" id="inputSize" size="2" class="form-control" placeholder="B: " value="<?php   echo isset($_GET['secondDigit']) ? htmlspecialchars(trim($_GET['secondDigit'])) : '';?>"><br>
                    
                    
                    <button type="submit" name="Calculator" class="btn btn-outline-info">=</button><br><br>
                    
                        <?php //**************************errors and the result of the calculator start**************************
                    
                        $firstDigit = isset($_GET['firstDigit']) ? htmlspecialchars(trim($_GET['firstDigit'])) : '';
                        
                        $secondDigit = isset($_GET['secondDigit']) ? htmlspecialchars(trim($_GET['secondDigit'])) : '';
                        
                        $nameOfOperation = isset($_GET['operation']) ? htmlspecialchars(trim($_GET['operation'])) : '';
                        
                        $resultCheck = emptyVariableCheck($firstDigit, $secondDigit) && typeVariableCheck($firstDigit, $secondDigit) && function_exists($nameOfOperation);
                        
                        if ($resultCheck) { ?>

                        <div class="alert alert-success" role="alert"> <h4>Результат: </h4><?php echo $nameOfOperation($firstDigit, $secondDigit); ?> </div>

                        <?php } elseif (isset($_GET['Calculator'])) { ?>

                            <div class="alert alert-warning" role="alert">Ошибка: <br> Пустые строки, текст или не выбрана операция!!</div>

                        <?php } //**************************errors and the result of the calculator end**************************?>
                </form>
            
                    </div>
                
                
                    <div class="col">
                            <h4 class="text-center">Галерея</h4>
                            
                        <?php //**************************cycle of displaying all the pictures start**************************
                        
                        $imageList = getImagelist();
                            
                                        foreach ($imageList as $key => $value) { ?>
                            
                            <a href="image.php?id=<?php echo $key;?>"><img class="img-thumbnail" width="120px" src="/HomeWork/img/gallery/<?php echo $value;?>" alt="image"></a>
                                        
                        <?php }  //**************************cycle of displaying all the pictures end**************************?>
                            
                   
                    
                            <hr>
                            
                            <form action="formHandlers/upload.php" method="post" enctype="multipart/form-data">
                                
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="newFile"><br>
                                    
                                        <?php if (isset($_SESSION['id'])) { ?>
                                    
                                    <button class="btn btn-outline-primary">Загрузить</button>
                                    
                                        <?php } else { ?>
                                    
                                    <p><a href="login.php">Авторизация</a></p>
                                    
                                        <?php } ?>
                                    
                            </form>
                            
                    
                    
                        <?php  //**************************check for file upload errors start**************************
                        
                        $result = isset($_GET['file_upload_result']) ? $_GET['file_upload_result'] : '';
                    
                            if ($result == 'error') { ?>
                            
                                <br><div class="alert alert-warning" role="alert">Ошибка: <br> Неверный формат или не добавлен файл!!!</div>
                            
                       <?php }//**************************check for file upload errors end**************************?>
                                
                    
                    
                            
                    </div>
                
                </div>
            </div>