<?php

require_once('inc/bootstrap.php');

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
