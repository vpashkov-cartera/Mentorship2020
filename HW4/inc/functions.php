<?php
session_start();

require_once('bootstrap.php');

$pagesInputValue = isset($_SESSION['books_per_page']) ? $_SESSION['books_per_page'] : 6;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

$qb = $entityManager->createQueryBuilder()
    ->select('b')
    ->from('books', 'b');

/** Books search */
if (isset($_SESSION['books_search'])) {
    $qb->where('b.name LIKE ?1')
        ->setParameter(1, $_SESSION['books_search'] . '%');
}

/** Order BY */
if (isset($_COOKIE['price_name'])) {
    $criteria = \Doctrine\Common\Collections\Criteria::create()
        ->orderBy(['b' . $_COOKIE['price_name'], 'ASC']);

    $qb->addCriteria($criteria);
}

$booksToDisplay = paginate(
    $qb->getQuery()->setHydrationMode(\Doctrine\ORM\Query::HYDRATE_ARRAY),
    $currentPage,
    $pagesInputValue
);

/** PAGES FOR PAGINATION */
$pageCount = ceil($booksToDisplay->count() / $pagesInputValue);

/**
 * @param $dql
 * @param int $page
 * @param int $limit
 * @return \Doctrine\ORM\Tools\Pagination\Paginator
 */
function paginate($dql, $page = 1, $limit = 5)
{
    $paginator = new \Doctrine\ORM\Tools\Pagination\Paginator($dql);

    $paginator->getQuery()
        ->setFirstResult($limit * ($page - 1)) // Offset
        ->setMaxResults($limit); // Limit

    return $paginator;
}
