<?php

function find_distinct(array $intMap1, array $intMap2): string
{
    $result = [];

    foreach ($intMap1 as $number)
    {
        if (!in_array($number, $intMap2))
        {
            $result[] = $number;
        }
    }

    return implode(" ", array_unique($result));
}

function sum_array_like(array $intMap, int $target): int
{
    $answer = array_fill(0, $target + 1, 0);
    $answer[0] = 1;

    for ($i = 0; $i <= $target; $i ++ )
    {
        foreach ($intMap as $integer) {
            if ($integer <= $i)
            {
                $answer[$i] += $answer[$i - $integer];
            }
        }
    }

    return $answer[$target];
}

function order_permutation(int $orders): int
{
    $MOD = 1000000007;  // Same as gmp_pow(10, 9) + 7
    $slots = 2 * $orders;
    $answer = 1;

    while ($slots > 0) {
        $validSlots = ($slots * ($slots - 1)) / 2;
        $answer = ($answer * $validSlots) % $MOD;
        $slots -= 2;
    }

    return $answer;
}

function order_permutation_with_gmp(int $orders): int
{
    $MOD = gmp_pow(10, 9) + 7;
    $slots = 2 * $orders;
    $answer = 1;

    while ($slots > 0)
    {
        $validSlots = gmp_div(gmp_mul($slots, gmp_sub($slots, 1)), 2);
        $answer = gmp_mul($answer, $validSlots);
        $slots -= 2;
    }

    return gmp_intval(gmp_mod($answer, $MOD));
}

function group_the_peolpe(array $groupSizes): array
{
    $groups = $answer = [];

    foreach ($groupSizes as $people => $group) {
        if (!isset($groups[$group])) {
            $groups[$group] = [$people];
        } else {
            $groups[$group][] = $people;
        }

        if (count($groups[$group]) === $group)
        {
            $answer[] = $groups[$group];
            $groups[$group] = [];
        }

    }
    usort($answer, function($a, $b) {
        return count($b) < count($a);
    });
    return $answer;
}

function min_delete(string $s): int
{
    $answer = 0;
    $count = [];
    for ($i = 0; $i < strlen($s); $i++) {
        if (!isset($count[$s[$i]])) {
            $count[$s[$i]] = 0;
        }
        $count[$s[$i]]++;
    }

    $used = [];

    foreach ($count as $freq) {
        while ($freq > 0 && isset($used[$freq])) {
            $freq--;
            $answer++;
        }

        if ($freq > 0) {
            $used[$freq] = true;
        }
    }

    return $answer;
}
