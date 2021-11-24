<?php include "header.php";?>  <!---erreur 404-->
<body> 
<h1 id="title_formation">Toutes les formations !</h1>



    <div class="filter">
        <select name="filter" id="filtre">
            <option value="Filter1">Filter1</option>
            <option value="Filter2">Filter2</option>
            <option value="Filter3">Filter3</option>
            <option value="Filter4">Filter4</option>
        </select>
    </div><br><br><br>

    <div class="cours">
        <img src="../image/cour1.jpg" alt="img_cours" id="img_cours"> 
        <p id="info_cours">Titre Formation <br><b>Nom Cours </b> <br>Description
        
        <!-- <a href="../formation/quizz/?id= <?php //+$id?>"> allez au quizz</a>   -->

        <?php echo '<a href="' . htmlspecialchars("../formation/quizz/" .urlencode($id)),'">';
        $idUrl=JSON_encode ($id);
        ?> quizz</a>
    </p>
    </div> <br><br>
<?php include "footer.php";?>


