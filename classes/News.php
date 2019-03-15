<?php

include_once 'Article.php';
include_once __DIR__ . '/../app/models/DB.php';
/**
 * Description of News
 *
 * @author ssv
 */
class News
{
    protected $news = [];


    public function __construct()
    {
        
        $db = new DB;
        $allNews = $db->query('SELECT * FROM news', []);
        
        foreach ($allNews as $article) {
            $this->news[$article['id']] = new Article($article);
        }
        
    }
    
    public function getNews()
    {
        return $this->news;
    }
    
    public function getNewsById(int $id)
    {
        if (array_key_exists($id, $this->news)){
            return $this->news[$id];
        }
        
        return reset($this->news);
    }
}
