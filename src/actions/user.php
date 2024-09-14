<?php
ob_start(); // Inicia o buffer de saída
require_once '../../database/user.php'; 

function findUserAction($conn, $id) {
    if (empty($id)) {
        return null;
    }
    return findUserDb($conn, $id);
}

function readUserAction($conn) {
    return readUserDb($conn);
}

function createUserAction($conn, $name, $email, $phone) {
    $createUserDb = createUserDb($conn, $name, $email, $phone);
    $message = $createUserDb == 1 ? 'success-create' : 'error-create';
    header("Location: ./read.php?message=$message"); 
    exit(); 
}

function updateUserAction($conn, $id, $name, $email, $phone) {
    $updateUserDb = updateUserDb($conn, $id, $name, $email, $phone);
    $message = $updateUserDb == 1 ? 'success-update' : 'error-update';
    header("Location: ./read.php?message=$message");
    exit(); 
}

function deleteUserAction($conn, $id) {
    $deleteUserDb = deleteUserDb($conn, $id);
    $message = $deleteUserDb == 1 ? 'success-remove' : 'error-remove';
    header("Location: ./read.php?message=$message"); 
    exit(); 
}

ob_end_flush();