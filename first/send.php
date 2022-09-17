<?php
if($_POST["names"] != null && $_POST["surname"] != null ) {
    if($_POST["email"] != null && $_POST["area"] != null ) {
           $target = "assets/img/";
        $targetFile = $target . basename($_FILES["image"]["name"]);
        $uploadOK = 1;
        echo $image = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check){
            echo "it's good".$check["mime"].".";
            $uploadOK = 0 ;
        }
        else{
            echo "c'est d'la merde";
            $uploadOK = 1;
        }
        $name = $_POST["names"];
        $surname = $_POST["surname"];
        $img = $_POST['image'];
        $description = $_POST["area"];
        $email = $_POST["email"];
        if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=complaint;charset=utf8', 'melonde', 'Dev-1234');
                $sendValue = $bdd->prepare("insert into form (name,surname, email,file,description) values(?,?,?,?,?) ");
                $sendValue->execute([$name, $surname, $email, $img, $description]);
                header("location: index.php");
            } catch (Exception $e) {
                die('erreur :' . $e->getMessage());
            }
        }
        else{
            echo "not valid email
                  <button><a href='index.php'>retun form</a></button>  
            ";

        }
    }
    else{
        echo " not description or not email enter
         <button><a href='index.php'>retun form</a></button>
         ";
    }
}
else{
    echo "not name or surmane
        <button><a href='index.php'>retun form</a></button>
    ";
}
?>

