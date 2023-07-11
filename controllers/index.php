<?php

use Core\App;
use Core\Database;
use Core\Pagination;
use Core\Validator;

// to call the database
//$db = App::resolve(Database::class);

view("index.view.php", [
    'heading' => 'Welcome',
]);
