<?php
include 'fstream.php';
include 'solutions.php';

function main(): void
{
    $input = read("input.txt");

    $input = [3,3,3,3,3,1,3];
    print_r(group_the_peolpe($input));
//    write("answer.text", solution($input));
}

main();