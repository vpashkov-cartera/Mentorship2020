<?php
session_start();

$booksPerPage = $_POST['books_per_page'];
$search = $_POST['search'];
$resetSearch = $_POST['reset_search'];
$filterByNamePrice = $_POST['price_name'];

if (!empty($search)) {
    $_SESSION["books_search"] = $search;
}

if (isset($resetSearch)) {
    unset($_SESSION["books_search"]);
}

if (isset($booksPerPage)) {
    $_SESSION["books_per_page"] = $booksPerPage;
}

if (isset($filterByNamePrice)) {
    setcookie('price_name', $filterByNamePrice, time() + 3600, '/');
}

header("Location: ../index.php");
