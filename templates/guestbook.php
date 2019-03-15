        <div class="conteiner">
            
            <div class="row justify-content-center">
                
                <div class="col-md-12 offset-6">
                    
                <!--************Note block loop start************************************************-->
                    
                <?php foreach ($data['guestBook']->getAllMsg() as $obj) { ?>
                    
                    <div class="media col-md-6 border box my-1 pl-0 p-1">

                            <img class="d-flex align-self-center mr-3 img-thumbnail" width="70px" src="/HomeWork/img/no-user-image.gif" alt="image">
                        <div class="media-body">
                            
                            <div class="row"><h5 class="col flex-item-md-between mt-0 pt-0 text-info"><?php echo $obj->getName(); ?></h5><p class="col text-secondary flex-item-md-between text-right mt-0 pt-0 mb-0"><?php echo $obj->getdate(); ?></p></div>
                          
                         <?php echo $obj->getMsg(); ?>
                          
                        </div>

                    </div>
 
                    <?php } ?>
                
                </div>
                
                
                <div class="row col-md-6 pl-0 pr-0">
                    
                    <form action="formHandlers/addGBmsg.php" method="POST" class="col-md-6">
                        
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
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                        </div>
                        
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="send">Отправить</button>
                  
                    </form>
                    
                </div>
                
            </div>
            
        </div>