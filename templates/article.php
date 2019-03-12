<div class="conteiner">
        
            <?php $article = $data['article'];?>
            
    <div class="row justify-content-center">
                <div class="col-md-6">
            <h4 class="text-center"><?php echo $article->getHeader(); ?></h4>
            <hr>
            <?php echo $article->getArticle(); ?>
            <hr>
            
                </div>
            </div>
</div>
