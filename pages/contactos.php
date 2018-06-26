<!DOCTYPE html>
<html>
<head>

	<title>Contactos</title>
	<meta charset="UTF-8">
</head>
<body>



<?php

$username="root";
$password="";


try {
    $conn = new PDO('mysql:host=localhost;dbname=hisdb', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //buscando na bd
    /* $stmt = $conn->prepare('SELECT * FROM users');
    $stmt->execute(array());
  
    while($row = $stmt->fetch()) {
        print_r($row['last_name']);
    }*/

    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $descricao=$_POST["descricao"];

//inserir na bd
$STH=$conn->prepare("INSERT INTO contactos(nome_empresa,email_empresa,descricao) values ( '$nome','$email','$descricao')");
$STH->execute();
echo "Sucess";

header("Location: ../index.html");

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


?>

</body>
</html>