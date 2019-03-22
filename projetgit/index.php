<?php 

$pdo = new PDO('mysql:host=localhost;dbname=abonnes', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

    //Connection au site
if(isset($_POST["login"])){

    $log = $_POST["login"];
    $password = $_POST["password"];

    //Query pour trouver le mail et le MDP dans la base de donnée
    $result = $pdo -> query("SELECT id_identification FROM identification WHERE '$log'=mail AND '$password'=password");
    echo "Nombre résultat   :".$result->rowCount();
    $validation = $result -> rowCount();
    $getIdentifiant=$result -> fetch(); //Prend les données de la requete
    $id_identification = $getIdentifiant['id_identification'];

        if($validation == 1){
            header ('location: articles.php?id_identification='.$id_identification); //Envoie vers la page article une fois la connection faite
            exit;            
        }
}


?>

!<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> index </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <form method=POST action="index.php">
        <input class="form-control col-lg-6 offset-lg-3" type="email" name="login" placeholder="Entrez votre adresse e-mail">
        </br>
        <input type="password" class="form-control col-lg-6 offset-lg-3" id="inputPassword" placeholder="Password" name='password'>
        </br>
        <input type="submit" class="col-lg-6 offset-lg-3" placeholder="Connexion">
    </form>

</body>
</html>