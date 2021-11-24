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
    public function displayArticles() // OK
    {
        $daoarticle = new DAOArticle();
        $articles = $daoarticle->findAll();
        $page = Renderer::render('blogAccueil.php', compact('articles'));
        echo $page;
    }

    public function displayArticle($id) //OK
    {
        $daoarticle = new DAOArticle();
        $article = $daoarticle->find($id);
        $page = Renderer::render('blogArticle.php', compact('article'));
        echo $page;
    }

    public function articleAime() //OK
    {
        Session::initialiserSessionGlobale(1,"", "",1);
        $daoarticle = new DAOArticle();
        $daofavori = new DAOFavori();
        $favoris = $daofavori->findById($_SESSION["id"]);
        $articlesfavori =[];
        foreach($favoris as $favori){
            $article=$daoarticle->find($favori->getIdArticleFavori());
            array_push($articlesfavori,$article);
        }
        $page = Renderer::render('blogAccueil.php', compact('articlesfavori'));
        echo $page;
    }

    // -----PARTIE FONCTION CLIENTS CONENCTES--------------------------------------------------------------------------
    public function aimerArticle($id) {//ok
        $daofavori = new DAOFavori();
        $favoris=$daofavori->findById($_SESSION["id"]);
        $flag=false;
        foreach($favoris as $favori){
            if ($favori->getIdArticleFavori()==$id){
                $flag=true;
            }
        }
        if ($flag==true){
            $daofavori->remove($_SESSION["id"],$id);
            echo ("Article retiré des Favoris");
        }else{
            $favori = new Favori();
            $favori->setIdUserFavori($_SESSION["id"]);
            $favori->setIdArticleFavori($id);
            $daofavori->saveFavori($favori);
            echo ("Article ajouté aux Favoris");
        }
    }

    // public function commenter($id)
    // {
    //     $content = htmlspecialchars(isset($_POST["commentaire"]) ? $_POST["commentaire"] : NULL);
    //     $daoarticle = new DAOArticle();
    //     $commentaire = new Commentaire();
    //     $commentaire->setContenu($content);
    //     $commentaire->setIdArticleCommentaire($id);
    //     $commentaire->setIdUserCommentaire($_SESSION["id"]);
    //     //DAO COMMENTAIRE TODO
    //     $article = $daoarticle->save($commentaire);
    //     header('Location: /blog/article/' . $id);
    // }

    // public function partagereseaux()
    // {
    // }

}
