<?php

$pdo = new PDO('mysql:host=localhost;dbname=abonnes', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

//Pour que le prénom et le nom de la personne qui se connectent s'affichent
$id_identification = $_GET["id_identification"];

$bonjour = $pdo -> query("SELECT prenom, nom FROM identification WHERE id_identification=$id_identification");
        $personne = $bonjour -> fetch();
        echo "Bonjour :".' '.$personne['prenom']." ".$personne['nom'];
// Fin identification

//Pour enregistrer des articles dans la base de donnée
if(isset($_POST["titre"])){
    $titre = $_POST["titre"];
    $art = $_POST["art"];

    $pdo -> query("INSERT INTO article(id_identification,titre, date_parution, art) VALUES ('$id_identification','$titre', CURDATE(), '$art')");
echo " Vos données $titre - CURDATE() - $art  ont bien été enregistrées!";}

else{echo '</br>Il manque des données';}
//Fin enregistrer

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 class="col-lg-2 offset-lg-5">Articles</h1>
    <form method="POST" action=articles.php class="was-validated">
        <input class="form-control is-invalid col-lg-6 offset-lg-3" type="text" name="titre" placeholder="Titre" required>
        </br>
        <textarea class="form-control is-invalid col-lg-6 offset-lg-3" type="textarea" name="art" placeholder="Art" required></textarea>
        </br>
        <select class="custom-select col-lg-6 offset-lg-3" id="inlineFormCustomSelect" required>
            <option selected value="">Rubrique</option>
            <option value="1">Culture POP</option>
            <option value="2">Sport</option>
            <option value="3">Cuisine</option>
            <option value="4">Actualité</option>
            <option value="5">Mode</option>
            <option value="6">Tunning</option>
        </select> 
        </br>
        </br>
        <input type="submit" class="btn btn-primary col-lg-6 offset-lg-3">
    </form>
</body>
</html>