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
                <label for="names">Name </label><input type="text" name="names">
                <label for="password">Password</label> <input type="password" name="password">
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
            <label for="name">Name</label> <input type="text" name="names" required>
            <label for="surname">Surname </label><input type="text" name="surname" required>
            <label for="email">Email</label> <input type="email" name="email" required>
            <label for="image">Image</label>Image <input type="file" name="image">
            <div id="divDescript">
                <label for="area">Description</label>
                <textarea name="area" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </main>
</body>
</html>
