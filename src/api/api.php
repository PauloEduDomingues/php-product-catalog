<?php

function fetchProductsFromApi() {
    $apiUrl = 'https://fakestoreapi.com/products';
    $json = @file_get_contents($apiUrl);
    if ($json === false) {
        return false;
    }
    //transformar em um a string em um array associativo do PHP
    return json_decode($json, true);
}
