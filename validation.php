<?php

function validateCreate(array $data): array
{
    $output = [];
    $MEGABYTE = 1024 * 1024;

    if (! isInList($data['cover']['type'], ['image/png', 'image/jpeg', 'image/jpg'])) {
        $output[] = 'O arquivo deve ser uma imagem.';
    }

    if ($data['cover']['error'] != 0) {
        $output[] = 'O upload da imagem não foi bem sucedido, tente novamente.';
    }

    if (! isSizeWithinLimits($data['cover']['size'], 0, 2 * $MEGABYTE)) {
        $output[] = 'Selecione uma imagem com até 2MB.';
    }

    if (! greaterThan($data['name'], 5)) {
        $output[] = 'O título deve ter pelo menos 5 caracteres.';
    }

    if (! greaterThan($data['author'], 5)) {
        $output[] = 'O nome do(s) autore(s) deve ter pelo menos 5 caracteres.';
    }

    if (! isSizeWithinLimits((int) $data['number_of_pages'], 0, 4000)) {
        $output[] = 'O número de páginas de deve ser positivo.';
    }

    if (! sizeGreaterThan($data['genre'] ?? [], 0)) {
        $output[] = 'Selecione pelo menos um gênero.';
    }

    if (! greaterThan($data['publisher'], 5)) {
        $output[] = 'A editora deve ter pelo menos 5 caracteres.';
    }

    if (! greaterThan($data['description'], 10)) {
        $output[] = 'A descrição deve ter pelo menos 10 caracteres.';
    }

    return $output;
}

function validateEdit(array $data): array
{
    $output = [];
    $MEGABYTE = 1024 * 1024;

    if (! greaterThan($data['name'], 5)) {
        $output[] = 'O título deve ter pelo menos 5 caracteres.';
    }

    if (! greaterThan($data['author'], 5)) {
        $output[] = 'O nome do(s) autore(s) deve ter pelo menos 5 caracteres.';
    }

    if (! isSizeWithinLimits((int) $data['number_of_pages'], 0, 4000)) {
        $output[] = 'O número de páginas de deve ser positivo.';
    }

    if (! sizeGreaterThan($data['genre'] ?? [], 0)) {
        $output[] = 'Selecione pelo menos um gênero.';
    }

    if (! greaterThan($data['publisher'], 5)) {
        $output[] = 'A editora deve ter pelo menos 5 caracteres.';
    }

    if (! greaterThan($data['description'], 10)) {
        $output[] = 'A descrição deve ter pelo menos 10 caracteres.';
    }

    return $output;
}

function sizeGreaterThan(array $list, int $size): bool
{
    return count($list) > $size;
}

function isSizeWithinLimits(int $element, int $infLimit, int $supLimit): bool
{
    return $element > $infLimit && $element <= $supLimit;
}

function isInList(string $item, array $list): bool
{
    return in_array($item, $list);
}

function greaterThan(string $value, int $length): bool
{
    return (strlen($value) >= $length);
}