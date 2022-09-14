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
                <p>Name <input type="text" name="name"></p>
                <p>Password <input type="text" name="password"></p>
                <button type="submit">login</button>
                <button><a href="newUser.php"></a>Sign up</button>
            </form>
            <button id="hide">Close</button>
        </dialog>
        <button id="showDialog">login</button>
    </div>
</header>
    <main>
        <form action="send.php" method="post">
            <p>Name <input type="text" name="name"></p>
            <p>Surname <input type="text" name="surname"></p>
            <p>Email <input type="text" name="email"></p>
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
