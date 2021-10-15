<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOUser.php';

require_once '../src/model/User.php';

class BlogController {
    public function displayArticles() {
        $page= Renderer::render('blogAccueil.php');
        
        echo $page;

    }

    public function displayArticle() {

    }

    public function aimerArticle() {

    }

    public function commenter() {

    }
    public function partagereseaux() {

    }
}