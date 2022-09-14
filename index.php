<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="accets/script/showDialog.js"></script>
    <link rel="stylesheet" href="accets/style/style.css">
    <title>Complaint From</title>
</head>
<body>
<header>
    <div>
        <dialog id="login">
            <form action="user.php" method="post">
                <p>Name <input type="text" name="names"></p>
                <p>Password <input type="text" name="password"></p>
                <button type="submit">login</button>

            </form>
            <button><a href="newUser.php">Sign up</a></button>
            <button id="hide">Close</button>
        </dialog>
        <button id="showDialog">login</button>
    </div>
</header>
    <main>
        <form action="send.php" method="post">
            <p>Name <input type="text" name="names" required></p>
            <p>Surname <input type="text" name="surname" required></p>
            <p>Email <input type="text" name="email" required></p>
            <p>Image <input type="file" name="image"></p>
            <div id="divDescript">
                <label for="area">Description</label>
                <textarea name="area" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </main>
</body>
</html>
