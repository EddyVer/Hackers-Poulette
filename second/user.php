<?php


$names = $_POST["names"];
$mdp = $_POST["password"];

try{

   $prepa = new PDO('mysql:host=localhost;dbname=complaint;charset=utf8', 'melonde', 'Dev-1234');
   $rep = $prepa->prepare("select * from user;");
   $rep->execute();
}
catch (Exception $e) {
    die('erreur, ' . $e->getMessage());
}



foreach ($rep as $item){
    if($item["name"] === $names && $item["password"] === $mdp){
        header("location:showTicket.php");
        session_start();
        $_SESSION["name"] = $item["name"];
        $_SESSION["level"] = $item["level"];

    }
    else{
        header("location:index.php");
    }

 }
?>
