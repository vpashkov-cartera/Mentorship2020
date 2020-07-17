<?php

require_once('inc/bootstrap.php');
require_once('twig.php');

if (!isset($_GET['id'])) {
    header("Location: index.php");
}

try {
    $id = $_POST['id'];

    /** @var \src\Book $book */
    $book = $entityManager->find('Book', $id);

    if ($book === null) {
        echo "Book $id does not exist.\n";
    }

} catch (Throwable $exception) {
    echo "Error occurs:" . $exception->getMessage();
}

echo $twig->render('edit.html.twig', [
    'bookName' => $book->getName(),
    'bookId' => $book->getName(),
    'bookIsbn' => $book->getIsbn(),
    'bookUrl' => $book->getUrl(),
    'bookPoster' => $book->getPoster(),
    'bookPrice' => $book->getPrice()
]);
