<?php
session_start();

require_once('bootstrap.php');

$pagesInputValue = isset($_SESSION['books_per_page']) ? $_SESSION['books_per_page'] : 6;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $pagesInputValue;
$booksToDisplay = [];

$qb = $entityManager->createQueryBuilder()
    ->select('b')
    ->from('books', 'b');

/** Books search */
if (isset($_SESSION['books_search'])) {
    $qb->where('b.name = ?1')
        ->setParameter(1, $_SESSION['books_search']);
}

/** Order BY */
if (isset($_COOKIE['price_name'])) {
    $criteria = \Doctrine\Common\Collections\Criteria::create()
        ->orderBy(['b' . $_COOKIE['price_name'], 'ASC']);

    $qb->addCriteria($criteria);
}

$booksToDisplay = $qb->getQuery()->getArrayResult();

/** PAGES FOR PAGINATION */
$pageCount = ceil(count($booksToDisplay) / $pagesInputValue);

/** BOOKS ARRAY FOR CURRENT PAGE */
$booksToDisplay = array_slice($booksToDisplay, $offset, $pagesInputValue);
