<?php

function findUserDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id ?? '');

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit('SQL error');
    }

    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    
    // Não fechar a conexão aqui, para não causar problemas de reutilização
    return $user;
}

function createUserDb($conn, $name, $email, $phone) {
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);

    if ($name && $email && $phone) {
        $sql = "INSERT INTO users (name, email, phone) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit('SQL error');
        }

        mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $phone);
        mysqli_stmt_execute($stmt);
        
        return true;  // Sucesso
    }

    return false;  // Falha
}

function readUserDb($conn) {
    $users = [];

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Não fechar a conexão aqui, para não causar problemas de reutilização
    return $users;
}

function updateUserDb($conn, $id, $name, $email, $phone) {
    if ($id && $name && $email && $phone) {
        $sql = "UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit('SQL error');
        }

        mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $phone, $id);
        mysqli_stmt_execute($stmt);

        return true;  // Sucesso
    }

    return false;  // Falha
}

function deleteUserDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

    if ($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit('SQL error');
        }

        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);

        return true;  // Sucesso
    }

    return false;  // Falha
}
