<?php

function pagination(int $page, int $size, int $total): array
{
    if ($total === 0) {
        return [];
    }

    $pages = ceil($total / $size);

    $previous = ($page > 1) ? $page - 1 : null;
    $next = ($page < $pages) ? $page + 1 : null;

    return [
        'previous' => $previous,
        'current' => $page,
        'pages' => range(1, $pages),
        'next' => $next,
        'size' => $size
    ];
}