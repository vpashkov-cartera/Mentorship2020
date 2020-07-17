<?php

require_once('inc/functions.php');
require_once('twig.php');

echo $twig->render('main.html.twig', [
    'booksToDisplay' => $booksToDisplay,
    'pagesInputValue' => $pagesInputValue,
    'currentPage' => $currentPage,
    'pageCount' => $pageCount
]);
