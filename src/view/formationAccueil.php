<?php include "header.php";?>  
<body> 

<div id="title_formation" >
    <h1 >Toutes les formations !</h1>
</div> <br>
<?php foreach ($type as $t) {
    $ty[]=$t->getlibelleFormation();
    //echo(var_dump($t->getlibelleFormation()));
} ?>  
    <div class="filter">
        <select name="filter" id="filtre">
            <option value="Filter"><?php echo($ty[0]); ?></option>
            <option value="Filter"><?php echo($ty[1]); ?></option>
            <option value="Filter"><?php echo($ty[2]); ?></option>

        </select>
    </div><br><br><br>
 
    <div class="cours">
    <?php foreach($mesFormation as $formation){
               $nom=$formation->getNom(); 
               $description=$formation->getDescription();
            $duree=$formation->getDureeHeure();

            
                ?>
        <p id="info_cours"><?php echo($nom) ?> <br><b><?php echo($description) ?></b> <br> Durée <?php echo($duree) ?> H <br>
        <?php echo '<a href="' . htmlspecialchars("../formation/quizz/" .urlencode($id)),'">';
        $idUrl=JSON_encode ($id);
        ?> quizz</a> <br><br>
        <img src="../image/cour1.jpg" alt="img_cours" id="img_cours"> 
    <?php } ?> 
   

        
    </p>
    </div> <br><br>
<?php include "footer.php";?>
