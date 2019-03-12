<?php

include_once 'Article.php';
/**
 * Description of News
 *
 * @author ssv
 */
class News
{
    protected $news = [];
    protected $pathToFile = '/opt/lampp/htdocs/HomeWork/db/news.db';


    public function __construct()
    {
        $allNews = file($this->pathToFile, FILE_IGNORE_NEW_LINES);
        
        foreach ($allNews as $article) {
            
            $this->news[] = new Article($article);
            
        }
    }
    
    public function getNews()
    {
        return $this->news;
    }
    
    public function getNewsById($id)
    {
        return $this->news[$id];
    }
}
