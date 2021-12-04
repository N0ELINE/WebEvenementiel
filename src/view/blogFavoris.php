<?php include "header.php";?>
<body>

<?php foreach($articlesfavori as $fav) {
    $name=$fav->getNom();
    $text=$fav->getContenu();
    $description=$fav->getDescription();
    $contenu=$fav->getContenu();
    //$id=$article->getId();?>
 
<p id="info_cours"> <br> <b><?php echo($name)?> </b><br><img src="../image/gateau.jpg" alt="img_article" id="img_article"> 
    <br><br><?php echo($description)?><br> <br> <?php echo($contenu)?>  </a> 
<?php } ?>

<?php include "footer.php";?>