<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOBlog.php';
require_once '../src/model/DAOFavori.php';
require_once '../src/model/DAOCommentaire.php';

require_once '../src/model/Blog.php';
require_once '../src/model/Favori.php';
require_once '../src/model/Commentaire.php';

class BlogControlleur {
// -----PARTIE FONCTION GENERALES--------------------------------------------------------------------------
    public function displayArticles() {
        $daoblog=new DAOBlog();
        $articles=$daoblog->findAll();
        $page= Renderer::render('blogAccueil.php',compact('articles'));
        echo $page;
    }

    public function displayArticle($id) {
        $daoblog=new DAOBlog();
        $article=$daoblog->find($id);
        $page= Renderer::render('blogArticle.php',compact('article'));
        echo $page;
    }

// -----PARTIE FONCTION CLIENTS CONENCTES--------------------------------------------------------------------------
    public function aimerArticle($id) {
        $daofavori=new DAOFavori();
        $favori=new Favori();
        $favori->setidUserFavori($_SESSION["id"]);
        $favori->setidArticleFavori($id);
        $article=$daofavori->save($favori);
        echo("Article ajouté aux Favoris");
    }

    public function commenter($id) {
        $content = htmlspecialchars(isset($_POST["commentaire"]) ? $_POST["commentaire"] : NULL);
        $daoblog = new DAOBlog();
        $commentaire = new Commentaire();
        $commentaire->setContenu($content);
        $commentaire->setIdArticleCommentaire($id);
        $commentaire->setIdUserCommentaire($_SESSION["id"]);
        $article=$daoblog->save($commentaire);
        header('Location: /blog/article/'.$id);
    }

    public function partagereseaux() {

    }


// -----PARTIE FONCTION COLLABORATEUR--------------------------------------------------------------------------
     public function creerarticleCollaborateur() {

    }

    public function editionArticleCollaborateur() {

    }

    public function importPhotoArticleCollaborateur() {

    }
    
}