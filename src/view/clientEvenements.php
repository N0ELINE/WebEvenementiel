<?php include "header.php";?>
<body> 


    <div class="event_head">
        <h1 id="title_event">Toutes les events !</h1>
    </div>  <br>

    <?php foreach ($events as $ev) {
        $id=$ev->getId();
        $name=$ev->getNom();
        $description=$ev->getDescription();
        $id=$ev->getId();
        ?>
<form method="POST" action="../../evenement/subscribe/<?php echo($id) ?>" id="btn-sub">

    <div class="event_Atelier">

    <img src="/image/event.jpg" alt="img_event" id="img_event">
    <p id="info_event">
    <?php echo '<a href="' . htmlspecialchars("/evenement/one/" .urlencode($id)),'">';
        $idUrl=JSON_encode ($id);?>

    <?php echo($name)?> <br><b><?php echo($description)?> </b>  </a> </p>
    </div> 
        <button class="btn-hover color-1" id="inscrire">Inscrire</button> 
    </form>  <br><br>
<?php } include "footer.php";?>


