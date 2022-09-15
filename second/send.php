<?php

include 'accets/utils/database.php';
include 'accets/utils/file_utils.php';

function get_post($name) {
    return $_POST[$name];
}

function post_exist($name): bool {
    return get_post($name) != null;
}

function return_popup() {
    echo get_error() . "<button><a href='index.php'>return form</a></button>";
}

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

function should_pop_return(): bool {
    return !post_exist("names") || !post_exist("surname")
        || !post_exist("email") || !post_exist("area");
}


/**
 * @throws Exception
 */
function insert_values() {
    $bdd = init_connection();

    $name = get_post("name");
    $surname = get_post("surname");
    $description = get_post("area");
    $email = get_post("email");

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        close_connection($bdd);
        return_popup();
        throw new Exception("email not valid");
    }

    $sendValue = prepare_command($bdd, "insert into form (name,surname, email,file,description) values(?,?,?,?,?)");

    if(!$sendValue->bind_param('sssss', $name, $surname, $email, $img, $description)) {
        close_connection($bdd);
        throw new Exception("SQL Params could not be bounds");
    }

    if(!$sendValue->execute() || !$bdd->commit()) {
        close_connection($bdd);
        throw new Exception("A problem has occured during executing this request.");
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
    echo "<script>alert('Veuillez remplir le formulaire.');</script>";
    header("location: index.php");
}


try {
    create_new_file();
    insert_values();
    header("location: index.php");
} catch (Exception $e) {
    die('error, ' . $e->getMessage());
}


?>

