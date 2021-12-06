<?php include "header.php";?>
<body>
    <br> 
<form  method="POST" action="../../site/sendContact" id="form_contact">
    
        
    <h1 id="title_contact">Nous contacter !</h1> <br><br><br><br> <br> <br> <br> <br> <br> 
        <div class="contact1">
            <input type="text" id="name" name="name" value="name" class="contact"required>
            <input type="text" id="societe" name="societe" value="société" class="contact"required> <br> <br> <br>
        </div> <br> <br>

        <div>
            <input type="email" id="email" name="email" value="email" class="contact" required> 
            <input type="tel" id="tel" name="tel" value="telephone" class="contact" required> <br> <br> <br>
        </div> <br>
        <br> <br>

        <div> 
        <input type="text" id="sujet" name="sujet" value="sujet" class="contact_suj" required> <br><br> 
        </div>  <br><br>  <br><br> 
        
        <div><textarea id="contact" name="corp" rows="5" cols="33" class="contact_corp"></textarea></div><br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
        <div class="buttons">
        <button class="btn-hover color-3">Envoyer</button>
        </div>          
</form> <br><br><br>


<div class="info_trajet">
        <div class="bus">
            <div id="img_bus"><img src="../image/bus.png" alt="bus" id="bus"> 
            </div>
            <div id="text_bus">
                <li> Bus C42 (Arrêt Les Poulette)</li>
                <li>Bus C567 (Arrêt des Omelette</li>
                <li>Proximité métro A & Bus 12 -S12 -S4</li>
            </div> 
        </div>
        <div class="car">
            <div id="img_car">
                <img src="../image/car.png" alt="car" id="car"> </div>
                <div id="text_car">
                    <li> Periphérique TutTut</li>
                    <li>Porte Narnia</li>
                    <li>Parking gratuit</li>
                </div>
            </p>
        </div>
        <div class="map"> 
            <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5565.713114463407!2d4.87747257644109!3d45.77406489968856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1634105316874!5m2!1sfr!2sfr"  loading="lazy"></iframe>          
        </div>
</div>

<?php include "footer.php";?>