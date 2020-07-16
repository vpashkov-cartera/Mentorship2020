<?php

require_once("vendor/autoload.php");
require_once("inc/functions.php");

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

$checkCurrentPage = new Twig\TwigFunction('checkCurrentPage', function ($value, $current) {
    if ((isset($current) && ($current == $value)) || (!isset($current) && $value === 1)) {
        return 'selected';
    }

    return '';
});

$twig->addFunction($checkCurrentPage);

$checkOrderCookies = new Twig\TwigFunction('checkOrderCookies', function ($value) {
    if (isset($_COOKIE["price_name"]) && $_COOKIE["price_name"] === $value) {
        return 'checked = "checked"';
    }

    return '';
});

$twig->addFunction($checkOrderCookies);

echo $twig->render('main.html.twig', [
    'booksToDisplay' => $booksToDisplay,
    'pagesInputValue' => $pagesInputValue,
    'searchResults' => $searchResults,
    'currentPage' => $currentPage,
    'bookTags' => $bookTags,
    'pageCount' => $pageCount
]);
