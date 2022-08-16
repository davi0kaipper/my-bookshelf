<?php

function connect()
{
    $hostname = "localhost";
    $username = "root";
    $password = "password";
    $database = "mybookshelf";

    return mysqli_connect($hostname, $username, $password, $database);
}

function verifyLogin(string $email, string $password): array
{
    $conn = connect();
    $sql = "SELECT * FROM users WHERE email='{$email}' AND password = MD5('$password');";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row == null) {
        return [];
    }

    return [
        'id' => $row['id_user'],
        'name' => $row['name'],
        'email' => $row['email']
    ];
}

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
