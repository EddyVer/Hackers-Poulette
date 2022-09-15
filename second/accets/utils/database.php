<?php

const HOST = "localhost";
const USERNAME = "melonde";
const PASSWORD = "Dev-1234";
const DATABASE = "complaint";
const PORT = 3306;

/**
 * @throws Exception
 */
function init_connection(): mysqli {
    $bdd = mysqli_init();
    if(!$bdd) {
        $bdd->close();
        throw new Exception("Mysql Connection could not init.");
    }

    connect($bdd);
    init_transaction($bdd);

    return $bdd;
}

/**
 * @throws Exception
 */
function prepare_command(mysqli $bdd, string $sql): mysqli_stmt {
    $result = $bdd->prepare($sql);
    if(!$result) {
        close_connection($bdd);
        throw new Exception("Command cannot be prepared");
    }
    return $result;
}

function connect(mysqli $bdd){
    $bdd->connect(HOST, USERNAME, PASSWORD, DATABASE, PORT);
}

/**
 * @throws Exception
 */
function init_transaction(mysqli $bdd): bool {
    $result = $bdd->begin_transaction();
    if(!$result) {
        close_connection($bdd);
        throw new Exception("A problem has occured during the begining of a transaction.");
    }
    return $result;
}

function close_connection(mysqli $bdd): bool {
    return $bdd->close();
}