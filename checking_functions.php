<?php

function checked(string $value, array $list): string
{
    return in_array($value, $list) ? "checked" : "";
}

function checked2($data): string
{
    return isset($data) ? "checked" : "";
}