<?php include "header.php";?>
<body>
    <br> 
<form method ="POST" action="../../evenement/save/<?php print($event->getId()) ?>" id="form_edit_event">
    
        <div class="event_form">
            <p><input type="text" name="nom" placeholder="Enter Name" required  class="event_f"/></p>
            <input type="text" id="description" name="description" placeholder="Enter description"  class="event_f" required>
            <input type="text" id="duree" name="duree" placeholder="Durée"  class="event_f" required>
            <input type="text" id="effectif" name="effectif" placeholder="Effectif"  class="event_f" required> 
            <input type="text" id="localisation" name="localisation" placeholder="Enter localisation"  class="event_f" required><br><br><br>

        </div> <br>
        <div> 
        </div>  

       <div class="buttons">
            <button class="btn-hover color-3">Edit</button>
      </div>          
</form> 




<?php include "footer.php";?>