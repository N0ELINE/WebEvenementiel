<?php include "header.php";?>
<body>
   
<h1 > Toutes les Article !</h1>
<?php foreach ($articles as $art) {
        $name=$art->getNom();
        $text=$art->getContenu();
        $description=$art->getDescription();
        //echo(var_dump($articles));
        ?>
<img src="../image/gateau.jpg" alt="img_cours" id="img_cours"> 

<?php echo($name)?> <br><b><?php echo($description)?> </b>  </a> </p>

<?php }?>
    <div class="event_Atelier">

<?php include "footer.php";?>


