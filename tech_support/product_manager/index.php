<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Products</title>
        <link rel="stylesheet" type="text/css"
            href="/Rus_PHP_2/tech_support/main.css">
    </head>
    <body>
        <?php include 'view/header.php'; ?>
        <main>
            <?php
                require('../model/database.php');
                // require('../model/product_db.php');

                $action = filter_input(INPUT_POST, 'action');
                if ($action === NULL) {
                    $action = filter_input(INPUT_GET, 'action');
                    if ($action === NULL) {
                        $action = 'under_construction';
                    }
                }

                if ($action == 'under_construction') {
                    include('../under_construction.php');
                }
            ?>
        </main>   
    </body>
</html>