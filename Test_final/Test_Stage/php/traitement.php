<?php
$nom = $metier = $q1 = $q2 = $q3 = $q4 = $q5 ="";

$nom = $_POST["username"];
$metier = $_POST["ChoixMetier"];
$q1 = $_POST["question1"];
$q2 = $_POST["question2"];
$q3 = $_POST["question3"];
$q4 = $_POST["question4"];
$q5 = $_POST["question5"];
if ($nom && $metier && $q1 && $q2 && $q3 && $q4 && $q5 == "") {
  echo "l'envoie des informations a échoué";
  header ("Location: $_SERVER[HTTP_REFERER]" );
} else {

 try {
   $bdd = new PDO('mysql:host=localhost;dbname=test_stage', 'root', 'root');
   $query = "INSERT INTO utilisateurs (UserName,Metier,Voiture,TransportCommun,TravailVoiture,TravailVelo,TravailTransportCommun)
   VALUES ('$nom','$metier','$q1','$q2','$q3','$q4','$q5') ";

   $data = $bdd->query($query);
   $query = "SELECT UserName,Metier,Voiture,TransportCommun,TravailVoiture,TravailVelo,TravailTransportCommun 
   FROM utilisateurs
   ORDER BY id DESC LIMIT 0,1";
   $data = $bdd->query($query);
   echo "<h1>Récapitulatif :</h1><br>";
   echo '<table width="70%" border="1" cellpadding="5" cellspacing="5">
   <tr>
   <th>Nom utilisateur</th>
   <th>Metier</th>
   <th>Voiture</th>
   <th>Transport en commun</th>
   <th>Travail en voiture</th>
   <th>Travail en velo</th>
   <th>Travail en transport</th>
   </tr>';
   foreach ($data as $row) {

     echo   '<tr>
     <td>'.$row["UserName"].'</td>
     <td>'.$row["Metier"].'</td>
     <td>'.$row["Voiture"].'</td>
     <td>'.$row["TransportCommun"].'</td>
     <td>'.$row["TravailVoiture"].'</td>
     <td>'.$row["TravailVelo"].'</td>
     <td>'.$row["TravailTransportCommun"].'</td>
     </tr>';
   }
   echo '</table>';
   echo "Vos informations ont bien été envoyés.";
 } catch (PDOException $e) {
   print "Erreur !: " . $e->getMessage() . "<br/>";
   die();
 }
 echo "<br> Vous serez redirigé dans quelques instants...";
 header ("refresh:20;url=http://localhost/Test_Stage/" );
}
  //echo "= $nom =  $metier = $q1 = $q2 = $q3 = $q4 = $q5";






?>