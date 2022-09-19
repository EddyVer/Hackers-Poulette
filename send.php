<?php

include 'assets/utils/database.php';
include 'assets/utils/file_utils.php';

/**
 * @throws Exception
 */
function get_post($name) {
    if(!array_key_exists($name, $_POST)) {
        throw new Exception(POST_PARAMETER_RENAMED);
    }
    return $_POST[$name];
}

/**
 * @throws Exception
 */
function post_exist($name): bool {
    return get_post($name) != null;
}

function return_popup() {
    echo get_error() . "<button><a href='index.php'>" . RETURN_POPUP_MESSAGE . "</a></button>";
}

/**
 * @throws Exception
 */
function get_error(): ?string
{
    if(!post_exist("names")) {
        return "name field is not valid";
    }
    if(!post_exist("surname")) {
        return "surname field is not valid";
    }
    if(!post_exist("email")) {
        return "invalid email";
    }
    if(!post_exist("area")) {
        return "invalid area";
    }
    return null;
}

/**
 * @throws Exception
 */
function should_pop_return(): bool {
    return !post_exist("names") || !post_exist("surname")
        || !post_exist("email") || !post_exist("area");
}


/**
 * @throws Exception
 */
function insert_values() {
    $bdd = init_connection();

    $name = get_post("names");
    $surname = get_post("surname");
    $img = get_image_from_post("image")["name"];
    $description = get_post("area");
    $email = get_post("email");

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        close_connection($bdd);
        return_popup();
        throw new Exception(INVALID_EMAIL);
    }

    $sendValue = prepare_command($bdd, "insert into form (name,surname, email,file,description) values(?,?,?,?,?)");

    if(!$sendValue->bind_param('sssss', $name, $surname, $email, $img, $description)) {
        close_connection($bdd);
        throw new Exception(MYSQL_PARAMS_ERROR_ON_BOUND);
    }

    if(!$sendValue->execute() || !$bdd->commit()) {
        close_connection($bdd);
        throw new Exception(MYSQL_TRANSACTION_UNCOMMITED);
    }
    close_connection($bdd);
}


/**
 * @throws Exception
 */
function create_new_file() {
    $img = get_image_from_post("image");
    upload_image($img);
}

if(should_pop_return()) {
    echo '<script>
        alert(' . '"' . INVALID_SEND_ACCESS .'");
        window.location.href="index.php";
        </script>';
}


try {
    create_new_file();
    insert_values();
    header("location:index.php");
} catch (Exception $e) {
    die('erreur, ' . $e->getMessage());
}


?>

