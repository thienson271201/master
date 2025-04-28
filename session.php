<?php

$_SESSION['cart'] = '';
$_SESSION['cart'] = [];
$_SESSION['cart'] = 0;


$cart = [
    0 => [
        'id' => 1,
        'name' => 'asus'
    ],
    1 => [
        'id' => 2,
        'name' => 'apple'
    ],
];

$_SESSION['cart'] = $cart;

echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';



$_SESSION['cart'] = [];

empty($_SESSION['cart']);

if (!empty($_SESSION['cart']))
{
}
;



if (isset($_SESSION['cart']))
{
}
;
