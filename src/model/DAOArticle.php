<?php

require_once 'Article.php';
require_once 'singleton.php';


class Article
{

    private $cnx;

    public function __construct()
    {
        $this->cnx = Singleton::getInstance()->cnx;
    }
}
