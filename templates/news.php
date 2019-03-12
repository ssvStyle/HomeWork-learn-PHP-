<div class="conteiner">
        
            
            <div class="row justify-content-center">
                <div class="col-md-6">
            <h1 class="text-center">Новости</h1>
            <hr>


            <?php $news = $data['news'];
            foreach ($news->getNews() as $article) {?>
            
            <?php echo $article->getTime();?> - 
            <a href="news.php?id=<?php echo $article->getId();?>"><?php echo $article->getHeader();?></a>
            <p class="pl-5 ml-2"><?php echo mb_substr($article->getArticle(), 0, 150);?> ....</p>
            <?php } ?>
                </div>
            </div>
</div>
