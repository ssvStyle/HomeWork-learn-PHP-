<div class="conteiner">
    
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Новости</h1>
                    <hr>

                    <?php foreach ($data['news']->getNews() as $article) {?>

                    <a href="news.php?id=<?php echo $article->getId();?>"><?php echo $article->getHeader();?></a>
                    <p class="pl-3"><?php echo mb_substr($article->getArticle(), 0, 170);?> .... <br>Источник: <?php echo $article->getAuthor();?></p>

                    <?php } ?>
                    
            </div>
        </div>
</div>
