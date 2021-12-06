<!-- Admin tbd 
PanelAdmin.png à inclure (crée lors du chargement de la page)

Liste $mesLogs -->
<?php 
include "header.php";
?>
<body>
  <div id="tableau">
  <?php

echo "<table border='1'>
<tr>
<th>Id User</th>
<th>Date</th>
<th>Heure</th>
</tr>";

foreach ($mesLogs as $element) 
{
echo "<tr>";
echo "<td>" . $element->getIdUser() . "</td>";
echo "<td>" . $element->getDate(). "</td>";
echo "<td>" . $element->getHeure(). "</td>";
echo "</tr>";
}
echo "</table>"; ?>
</div> </br></br></br>
<?php include "footer.php"; ?>

