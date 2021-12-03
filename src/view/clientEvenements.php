<?php include "header.php";?>
<body> 


    <div class="event_head">
        <h1 id="title_event">Toutes les events !</h1>
    </div>  <br>

    <?php foreach ($events as $event) {
        $id=$event->getId();
        $name=$event->getNom();
        $description=$event->getDescription();
        ?>
    <div class="event_Atelier">

    <img src="/image/event.jpg" alt="img_event" id="img_event">
    <p id="info_event"><?php echo '<a href="' . htmlspecialchars("/evenement/one/" .urlencode($id)),'">';
        $idUrl=JSON_encode ($id);?>
    <?php echo($name)?> <br><b><?php echo($description)?> </b>  </a> </p>
    </div> 
    <form method="POST" action="../../evenement/subscribe<?php print($event->getId()) ?>" id="btn-sub">
        <button class="btn-hover color-2" id="inscrire">Inscrire</button> 
    </form> 
<?php } include "footer.php";?>


