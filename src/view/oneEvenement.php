<?php include "header.php";?>
<body> 

    <div class="event_head">
        <p class="event"><a href="/evenement/all" id="linkEvent">Tous les events !</a></p>
        <h1 id="title_event">Mes Events !</h1>
    </div> <br>

        <div class="event_Atelier">
        <img src="/image/event.jpg" alt="img_event" id="img_eventOne"> 
        <p id="info_eventOne"><br><?php echo($event->getNom())?> </b> <br><?php echo($event->getDescription())?><br><br>      
        <div id="poste">
        <form method="POST" action="../../avis/add/<?php print($event->getId()) ?>" id="form_edit_event">
            <input type="text" id="avisPoste" name="avis" class="avis"required> 
            <button class="btn-hover color-4" id="poster">Poster</button> 
        </form> </div>


    </p>
    </div>
    <?php if ($_SESSION["role"] ==3){ ?>
    <div class="buttons">
        <a href="/evenement/edition/<?php print($event->getId()) ?>" ><button class="btn-hover color-1" id="edit">Edit</button></a>
        <a href="/evenement/suppr/<?php print($event->getId()) ?>" ><button class="btn-hover color-2" id="suppr">Supprimer</button></a>
</div>
<?php } ?>
    
     <br><br>
<?php include "footer.php";?>


