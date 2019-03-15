<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author ssv
 */
class Article
{
    public $id;
    protected $author;
    protected $time;
    protected $header;
    protected $article;

    public function __construct($article)
    {
        $this->id = $article['id'];
        $this->author = $article['author'];
        $this->header = $article['header'];
        $this->article = $article['article'];
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getAuthor()
    {
        return $this->author;
    }
    
    public function getTime()
    {
        return $this->time;
    }
    
    public function getHeader()
    {
        return $this->header;
    }
    
    public function getArticle()
    {
        return $this->article;
    }
}
