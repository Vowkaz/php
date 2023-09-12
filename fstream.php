<?php

function read(string $path): string
{
    return file_get_contents($path);
}

function write(?string $path, string $content): bool
{
    return file_put_contents($path, $content);
}