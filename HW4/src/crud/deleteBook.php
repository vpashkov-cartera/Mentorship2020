<?php
require_once('../../inc/bootstrap.php');

if (!isset($_POST['id'])) {
    header("Location: ../../index.php");
}

try {
    $id = $_POST['id'];

    /** @var \src\Book $book */
    $book = $entityManager->find('Book', $id);

    if ($book === null) {
        echo "Book $id does not exist.\n";
        exit(1);
    }

    $entityManager->remove($book);
    $entityManager->flush();

    header("Location: ../../index.php");
} catch (Throwable $exception) {
    echo "Error occurs:" . $exception->getMessage();
}
