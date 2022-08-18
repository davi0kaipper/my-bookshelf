<?php

function connection()
{
    $hostname = "localhost";
    $username = "root";
    $password = "password";
    $database = "mybookshelf";

    return new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
}

function verifyLogin(string $email, string $password): array
{
    $conn = connection();
    $sql = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = MD5(?);");
    $sql->execute([$email, $password]);
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($data == null) {
        return [];
    }

    return [
        'id' => $data[0]['id_user'],
        'name' => $data[0]['name'],
        'email' => $data[0]['email']
    ];
}

function getBook(string $id): array
{
    $conn = connection();
    $sql = $conn->prepare("SELECT * FROM books WHERE id = :id;");
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data[0] ?? [];
}

function getBooks(int $offset, int $limit): array
{
    $offset = ($offset - 1) * $limit;
    $conn = connection();

    $sql = $conn->prepare("SELECT * FROM books ORDER BY id LIMIT :offset,:limit;");
    $sql->bindValue(':offset', $offset, PDO::PARAM_INT);
    $sql->bindValue(':limit', $limit, PDO::PARAM_INT);
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function getTotal(): int
{
    $conn = connection();

    $sql = $conn->prepare("SELECT COUNT(*) AS total FROM books;");
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data[0]['total'];
}

function removeBook(string $id): void
{
    $conn = connection();
    $sql = $conn->prepare("DELETE FROM books WHERE id = :id;");
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
}

function editBook(string $id): array
{
    $conn = connection();
    $sql = $conn->prepare("UPDATE books SET WHERE id = :id;");
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);
}
