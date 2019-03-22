<?php
/* echo "la fleur en bouquet fâne, et jamais ne renaît";
echo "</br><h1> Arthouuuur </h1>";

$Nom="bonjour";
echo $Nom;

$a=4.5;
echo gettype($a);

$b=true;
$prenom="bob";
$nom="</br>Sponge";
echo $nom." ".$prenom;
*/
/*
$mysqli = new mysqli("localhost","root","","entreprise"); //Connection à notre base de donnée mySQL "entreprise", l'espace est le mdp
*/
/*
$resultat = $mysqli -> query( " SELECT * FROM employes WHERE salaire>4900 " );
$employe = $resultat -> fetch_assoc();
print_r($employe);
echo "prenom : ".$employe['prenom'];

$mysqli -> query("INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (394, 'Severus', 'Rogue', 'm', 'maître des potions', '2000-01-15', 3500)");
*/

$pdo = new PDO('mysql:host=localhost;dbname=abonnes', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));
/*
$pdo -> query("DELETE FROM employes WHERE prenom = 'severus'");
$resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = 780");
var_dump($resultat);
//$resultat est un objet issu de la classe PDOStatement, INEXPLOITABLE en l'état. 

$employe = $resultat -> fetch();
echo '<pre>'; 
print_r($employe);
echo '</pre>';
*/


//Enregistrement d'un nouvel abonné dans la base de donnée
if(isset($_POST["nom"])&& isset($_POST["prenom"])&& isset($_POST["mail"])&& isset($_POST["password"])){
$nom = $_POST["nom"];

$prenom = $_POST["prenom"]; 
echo "prenom : ".$prenom;

$mail = $_POST["mail"];
echo "mail : ".$mail;

$password = $_POST["password"];
echo "password :".$password;

$pdo -> query("INSERT INTO identification(nom, prenom, mail, password) VALUES ('$nom', '$prenom', '$mail', '$password')");
echo " Vos données $nom - $prenom - $mail - $password ont bien été enregistrées!";} //affichage des données enregistrer

else{echo 'Il manque des données';} //Si un input n'a pas été remplI



?>

<html>
</<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
</head>
<body>
            <form method="POST" action="inscription.php">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name" name='prenom'>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name" name='nom'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name='mail'>                                     
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name='password'>
                    </div>
                    <input type="submit" class="col-4 offset-4">
                </div>
            </form>
</body>
</html>