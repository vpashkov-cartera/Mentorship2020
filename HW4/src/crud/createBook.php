<?php
require_once('../../inc/bootstrap.php');

try {
    $book = (new \src\Book())
        ->setName($_POST['name'] ?? '')
        ->setIsbn($_POST['isbn'] ?? 0)
        ->setUrl($_POST['url'] ?? '')
        ->setPoster($_POST['poster'] ?? '')
        ->setPrice($_POST['price'] ?? 0);

    $entityManager->persist($book);
    $entityManager->flush();

    header("Location: ../../index.php");
} catch (Throwable $exception) {
    echo "Error occurs:" . $exception->getMessage() . "\n";
}
