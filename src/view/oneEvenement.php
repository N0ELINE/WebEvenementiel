<?php include "header.php";?>
<body> 

    <div class="event_head">
        <p class="event"><a href="/evenement/all" id="linkEvent">Tous les events !</a></p>
        <h1 id="title_event">Mes Events !</h1>
    </div> <br>

        <div class="event_Atelier">
        <img src="/image/event.jpg" alt="img_event" id="img_event"> 
        <p id="info_event"><br><?php echo($event->getNom())?> </b> <br><?php echo($event->getDescription())?><br><br>      
        <form method="POST" action="../../avis/add/<?php print($event->getId()) ?>" id="form_edit_event">
            <input type="text" id="avis" name="avis" class="avis"required> 
            <button class="btn-hover color-2" id="poster">Poster</button> 
        </form> 


    </p>
    </div>
    <?php if ($_SESSION["role"] ==3){ ?>
    <div class="buttons">
        <a href="/evenement/edition/<?php print($event->getId()) ?>" ><button class="btn-hover color-1" id="edit">Edit</button></a>
        <button class="btn-hover color-2" onclick="remove()"id="suppr">Supprimer</button>  
</div>
<?php } ?>
    
     <br><br>
<?php include "footer.php";?>


