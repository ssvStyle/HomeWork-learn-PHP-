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
    protected $date;
    protected $time;
    protected $header;
    protected $article;

    public function __construct($article)
    {
        $array = explode( '-|-' ,$article);
        $this->id = $array[0];
        $this->date = $array[1];
        $this->time = $array[2];
        $this->header = $array[3];
        $this->article = $array[4];
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getDate()
    {
        return $this->date;
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
