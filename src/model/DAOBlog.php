<?php

require_once 'Blog.php';
require_once 'singleton.php';


class DAOBlog
{

    private $cnx;

    public function __construct()
    {
        $this->cnx = Singleton::getInstance()->cnx;
    }
}
