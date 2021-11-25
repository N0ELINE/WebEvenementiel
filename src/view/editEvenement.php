<?php include "header.php";?>
<body>
    <br> 
<form action="" id="form_edit_event">
    
        <div class="event_form">
            <input type="text" id="nom" name="name" value="nom event" class="event_f" required>
            <input type="text" id="date" name="date" value="date" class="event_f" required> 
            <input type="text" id="heure" name="heure" value="heure" class="event_f" required>
            <input type="text" id="dureeMinute" name="dureeMinute" value="dureeMinute" class="event_f" required>
            <input type="text" id="effectifMax" name="effectifMax" value="effectifMax" class="event_f" required> 
            <input type="text" id="localisation" name="localisation" value="localisation" class="event_f" required><br><br><br>

        </div> <br>
    
        <div> 
        <input type="text" id="description" name="description" value="description" class="event_f_desc" required> <br><br> 
        </div>  <br><br>  <br><br> 

       <div class="buttons">
            <button class="btn-hover color-3">Edit</button>
      </div>          
</form> <




<?php include "footer.php";?>