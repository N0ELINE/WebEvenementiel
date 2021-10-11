<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Contact</title>
</head>

<body>
     <br> 
    <form action="" id="form_contact">
        
            
        <h1 id="title_contact">Nous contacter !</h1> <br>
            <div class="contact1">
                <input type="text" id="name" name="name" value="Name" class="contact"required>
                <input type="text" id="societe" name="societe" value="société" class="contact"required>
            </div> <br>

            <div>
                <input type="email" id="email" name="email" value="email" class="contact" required>
                <input type="tel" id="tel" name="tel" value="telephone" class="contact" required>
            </div> <br>
            <br>

            <input type="text" id="contact" name="sujet" value="sujet" class="contact" required> <br><br><br>
            <textarea id="contact" name="corp" rows="5" cols="33" class="contact"></textarea><br>
            <button id="envoyer_btn">Envoyer</button>      

        
    </form>



</body>

</html>