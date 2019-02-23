<!DOCTYPE html>
<!---->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Большое изображение</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
        <?php include_once __DIR__ . '/function.php';?>
    <body>
        
        <?php include_once __DIR__ . '/navigation.php';?>
        
        <!-- ^^^^Menu^^^^^-->
        
        <div class="col">
            
            <img class="img-fluid rounded mx-auto d-block" width="900 " src="/HomeWork/img/gallery/<?php echo getImageById($_GET['id']);?>" alt="image">
        
        </div>
    </body>
    
</html>

