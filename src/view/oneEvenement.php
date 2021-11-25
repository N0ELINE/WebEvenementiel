<?php include "header.php";?>
<body> 
    <div class="event_head">
        <div class="img_event">
        <img src="/image/cadre.png" alt="cadre" id="cadre"> </div>
        <p class="event"><a href="/evenement/all" id="linkEvent">Tous les events !</a></p>
        <h1 id="title_event">Mes Events !</h1>
    </div> <br>

    <div class="event_Atelier">
        <img src="/image/event.jpg" alt="img_event" id="img_event"> 
        <p id="info_event">Titre Event <br><b>Nom event</b> <br>Description<br><br>      
    </p>
    </div>
    <div class="buttons">
            <button class="btn-hover color-1" id="edit">Edit</button>
            <button class="btn-hover color-2" onclick="remove()"id="suppr">Supprimer</button>  
    </div>
     <br><br>
<?php include "footer.php";?>


