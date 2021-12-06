<?php include "header.php";?>
<body>
   
<h1 id="title_article"> Toutes les Article !</h1>

<?php foreach ($articles as $art) { ?>

<?php   $name=$art->getNom();
        $text=$art->getContenu();
        $description=$art->getDescription();
        $id=$art->getId();
        ?>
        
<form method="POST" action="../../blog/like/<?php echo($id) ?>" id="form_edit_event">

<p id="info_cours"> <br> <b><?php echo($name)?> </b><img src="../image/gateau.jpg" alt="img_article" id="img_article"> 
<br><?php echo($description)?>  </a> 
 <div class="buttons">
    <button class="btn-hover color-3" id="fav">Favoris</button><br><br><br></p>
</div> 
</form>
<?php }?> 

<?php include "footer.php";?>


