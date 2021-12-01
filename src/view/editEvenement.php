<?php include "header.php";?>
<body>
    <br> 
<form action="../evenement/save" id="form_edit_event">
    
        <div class="event_form">
            <input type="text" id="nom" name="nom" value="nom event" class="event_f" required>
            <input type="text" id="description" name="description" value="description event" class="event_f" required>
            <input type="text" id="duree" name="duree" value="duree" class="event_f" required>
            <input type="text" id="effectif" name="effectif" value="effectif" class="event_f" required> 
            <input type="text" id="localisation" name="localisation" value="localisation" class="event_f" required><br><br><br>

        </div> <br>
    
        <div> 
        </div>  

       <div class="buttons">
            <button class="btn-hover color-3">Edit</button>
      </div>          
</form> 




<?php include "footer.php";?>