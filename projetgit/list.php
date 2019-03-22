<?php
$pdo = new PDO('mysql:host=localhost;dbname=abonnes','root','',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));
$result = $pdo -> query("SELECT * FROM identification ");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<?php

while ($utilisateurs = $result -> fetch(PDO::FETCH_ASSOC)){
    print_r($utilisateurs);
    echo"<li>".$utilisateurs['id_identification']."</li>";
     echo "<br>";
}
 
?>
</body>
</html>
