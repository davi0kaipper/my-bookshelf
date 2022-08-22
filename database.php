<?php

function connection()
{
    $hostname = 'localhost';
    $username = 'root';
    $password = 'password';
    $database = 'mybookshelf';

    return new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
}

function verifyLogin(string $email, string $password): array
{
    $conn = connection();
    $sql = $conn->prepare('SELECT * FROM users WHERE email = ? AND password = MD5(?);');
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
    $sql = $conn->prepare('SELECT * FROM books WHERE id = :id;');
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($data == null) {
        return [];
    }

    $book = $data[0];
    $book['genre'] = explode('|', $book['genre']);

    return $book;
}

function getBooks(int $offset, int $limit): array
{
    $offset = ($offset - 1) * $limit;
    $conn = connection();

    $sql = $conn->prepare('SELECT * FROM books ORDER BY id LIMIT :offset,:limit;');
    $sql->bindValue(':offset', $offset, PDO::PARAM_INT);
    $sql->bindValue(':limit', $limit, PDO::PARAM_INT);
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function getTotal(): int
{
    $conn = connection();

    $sql = $conn->prepare('SELECT COUNT(*) AS total FROM books;');
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $data[0]['total'];
}

function removeBook(string $id): void
{
    $conn = connection();
    $sql = $conn->prepare('DELETE FROM books WHERE id = :id;');
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
}

function removeAll(array $ids): void
{
    $conn = connection();
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $sql = $conn->prepare("DELETE FROM books WHERE id IN ($placeholders);");
    $sql->execute($ids);
}

function createBook(array $data): void
{
        $conn = connection();
    $statement = 'INSERT INTO books (name, author, number_of_pages, genre, is_national, publisher, description, cover) ';
    $statement .= 'VALUES (:name, :author, :number_of_pages, :genre, :is_national, :publisher, :description, :cover);';
    $sql = $conn->prepare($statement);
    $sql->bindValue(':name', $data['name'], PDO::PARAM_STR);
    $sql->bindValue(':author', $data['author'], PDO::PARAM_STR);
    $sql->bindValue(':number_of_pages', $data['number_of_pages'], PDO::PARAM_INT);
    $sql->bindValue(':genre', $data['genre'], PDO::PARAM_STR);
    $sql->bindValue(':is_national', $data['is_national'], PDO::PARAM_INT);
    $sql->bindValue(':publisher', $data['publisher'], PDO::PARAM_STR);
    $sql->bindValue(':description', $data['description'], PDO::PARAM_STR);
    $sql->bindValue(':cover', $data['filename'], PDO::PARAM_STR);
    $sql->execute();
}

function editBook(array $data): void
{
    $conn = connection();
    $statement = 'UPDATE books SET ';
    $statement .= 'name = :name, author = :author, number_of_pages = :number_of_pages, genre = :genre, is_national = :is_national, publisher = :publisher, description = :description ';
    $statement .= 'WHERE id = :id;';
    $sql = $conn->prepare($statement);
    $sql->bindValue(':name', $data['name'], PDO::PARAM_STR);
    $sql->bindValue(':author', $data['author'], PDO::PARAM_STR);
    $sql->bindValue(':number_of_pages', $data['number_of_pages'], PDO::PARAM_INT);
    $sql->bindValue(':genre', $data['genre'], PDO::PARAM_STR);
    $sql->bindValue(':is_national', $data['is_national'], PDO::PARAM_INT);
    $sql->bindValue(':publisher', $data['publisher'], PDO::PARAM_STR);
    $sql->bindValue(':description', $data['description'], PDO::PARAM_STR);
    $sql->bindValue(':id', $data['id'], PDO::PARAM_INT);
    $sql->execute();
}
