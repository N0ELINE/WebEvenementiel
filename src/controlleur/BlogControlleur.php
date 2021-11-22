<?php

require_once '../src/utils/Renderer.php';
require_once '../src/model/DAOFavori.php';
// require_once '../src/model/DAOCommentaire.php';
require_once '../src/model/DAOArticle.php';

// require_once '../src/model/Blog.php';
// require_once '../src/model/Favori.php';
// require_once '../src/model/Commentaire.php';
// require_once '../src/model/Article.php';

class BlogControlleur
{
    // -----PARTIE FONCTION GENERALES--------------------------------------------------------------------------
    public function displayArticles()
    {
        $daoarticle = new DAOArticle();
        $articles = $daoarticle->findAll();
        $page = Renderer::render('blogAccueil.php', compact('articles'));
        echo $page;
    }

    public function displayArticle($id)
    {
        $daoarticle = new DAOArticle();
        $article = $daoarticle->find($id);
        $page = Renderer::render('blogArticle.php', compact('article'));
        echo $page;
    }

    public function articleAime($id)
    {
        $daoarticle = new DAOArticle();
        $article = $daoarticle->find($id);
        $page = Renderer::render('blogAccueil.php', compact('articleAime'));
        echo $page;
    }

    // -----PARTIE FONCTION CLIENTS CONENCTES--------------------------------------------------------------------------
    public function aimerArticle($id)
    {
        $daofavori = new DAOFavori();
        $favori = new Favori();
        $favori->setIdUserFavori($_SESSION["id"]);
        $favori->setIdArticleFavori($id);
        $article = $daofavori->saveFavoris($favori);
        echo ("Article ajouté aux Favoris");
    }

    public function commenter($id)
    {
        $content = htmlspecialchars(isset($_POST["commentaire"]) ? $_POST["commentaire"] : NULL);
        $daoarticle = new DAOArticle();
        $commentaire = new Commentaire();
        $commentaire->setContenu($content);
        $commentaire->setIdArticleCommentaire($id);
        $commentaire->setIdUserCommentaire($_SESSION["id"]);
        //DAO COMMENTAIRE TODO
        $article = $daoarticle->save($commentaire);
        header('Location: /blog/article/' . $id);
    }

    public function partagereseaux()
    {
    }


    // -----PARTIE FONCTION COLLABORATEUR--------------------------------------------------------------------------
    public function creerarticleCollaborateur()
    {
        $nomArticle = htmlspecialchars(isset($_POST["nomArticle"]) ? $_POST["nomArticle"] : NULL);
        $article = new Article();
        $article->getNom($nomArticle);
        $article->setDate(date('d-m-y h:i:s'));
        $daoarticle = new DAOArticle();
        $daoarticle->create($article);


    }

    public function editionArticleCollaborateur()
    {
        $page = Renderer::render('blogEdition.php');
        echo $page;
    }

    public function importPhotoArticleCollaborateur()
    {
    }
}
