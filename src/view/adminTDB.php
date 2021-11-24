<!-- Admin tbd 
PanelAdmin.png à inclure (crée lors du chargement de la page)

Liste $mesLogs -->
<?php 
include "header.php";
include "User.php";
include "DAOUser.php"?>
<body>
   
<?php

 $users = (User);
// echo $obj->getMail();  // Affiche : 'ciao'
var_dump($userT->User->getMail());

foreach ($user as $users){
    $user = array( array($user->User->getId(), $user->User->getMail() , $user->User->getMdp(),
    $user->User->getDroit())); 
}

?>
    <table>
      <thead>
        <tr>
          <th><?php echo implode('</th><th>', array_keys(current($user))); ?></th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($user as $row): array_map('htmlentities', $row); ?>
        <tr>
          <td><?php echo implode('</td><td>', $row); ?></td>
        </tr>
    <?php endforeach; ?>
      </tbody>
    </table>
</body>

<?php include "footer.php";?>