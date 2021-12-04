<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarEvent</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="http://fonts.cdnfonts.com/css/blacker-papua" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
                
</head>
<header>


<!--Navabare menu-->
<div class="navbar">
        <div class="titre_head">
            <img src="/image/logo.png" alt="logo" id="logo_head">
            <h1 id="titre_head">Star Event</h1>
        </div>

        <div class="icon"> 
 
            <?php if ($_SESSION["role"] == 4) { 
                ?><p id="mail"> <?php echo($_SESSION["mail"]) ?></p>
                <a href="/connexion/sedeconnecter"><img src="/image/connection.png" alt="ecrou" id="icon"></a>
                
                
                <a href="/admin/tab"><img src="/image/ecrou.png" alt="ecrou" id="icon"></a>

                <?php 
                } else {
                    ?><p id="mail"> <?php echo($_SESSION["mail"]) ?>
                        <a href="/blog/favori"><img src="/image/heart.png" alt="ecrou" id="icon"></a>
                        <a href="/connexion/accueil"><img src="/image/connection.png" alt="ecrou" id="icon"></a>
            <?php  } ?>
            
        </div>
        <div class="bleu">
            <img src="/image/bleu.png" alt="ecrou" id="bleu">
        </div>
        <div class="menu">
            <nav class="nav">
                <a href="/site/accueil" class="nav-item is-active" active-color="orange">Accueil</a>
                <a href="/evenement/all" class="nav-item" active-color="green">Event</a>
                <a href="/formation/all" class="nav-item" active-color="blue">Formation</a>
                <a href="/site/contact" class="nav-item" active-color="rebeccapurple">Contact</a>
                <a href="/blog/all" class="nav-item" active-color="red">Blog</a>
                <span class="nav-indicator"></span>
            </nav>

            <img src="/image/etoile.gif" alt="ecrou" id="etoile">
            <img src="/image/etoile2.gif" alt="ecrou" id="etoile2">
        </div>
       
    </div> <br> <br>

</header>
