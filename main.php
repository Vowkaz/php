<?php
include 'fstream.php';
include 'solutions.php';

function main(): void
{
//    $input = read("input.txt");

    $input = "aabcc";
    print_r(min_delete($input));
//    write("answer.text", solution($input));
}

main();