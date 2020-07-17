<?php
require_once('../../inc/bootstrap.php');

if (!isset($_POST['id'])) {
    return;
}

try {
    $id = $_POST['id'];

    /** @var \src\Book $book */
    $book = $entityManager->find('Book', $id);

    if ($book === null) {
        echo "Book $id does not exist.\n";
        exit(1);
    }

    $book->setName($_POST['name'] ?? '')
        ->setIsbn($_POST['isbn'] ?? 0)
        ->setUrl($_POST['url'] ?? '')
        ->setPoster($_POST['poster'] ?? '')
        ->setPrice($_POST['price'] ?? 0);

    $entityManager->flush();
} catch (Throwable $exception) {
    echo "Error occurs:" . $exception->getMessage();
}
