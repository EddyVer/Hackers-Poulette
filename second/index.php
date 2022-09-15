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
    <main class="contaire">
        <form class="form" enctype="multipart/form-data" action="send.php" method="post">
            <div class="form-control">
                <label for="name">Name</label>
                <input id="names" type="text" name="names" placeholder="Enter name" required>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label for="surname">Surname </label>
                <input id="surname" type="text" name="surname" placeholder="Enter Surname" required>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="Enter Email" required>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label for="image">Image</label>
                <input id="image" type="file" name="image">
                <small>Error Message</small>
            </div>
            <div id="divDescript" class="form-control">
                <label for="area">Description</label>
                <textarea name="area" id="description" cols="30" rows="10"></textarea>
                <small>Error Message</small>
            </div>
            <button type="submit">Send</button>
        </form>
    </main>
<!--    <div class="images">-->
<!--        --><?php
//            include 'accets/utils/file_utils.php';
//            list_images();
//        ?>
<!--    </div>-->
</body>
</html>


