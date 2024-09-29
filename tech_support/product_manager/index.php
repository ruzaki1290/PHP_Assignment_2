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
        <?php include '../view/header.php'; ?>
        <main>
            <?php
                require('../model/database.php');
                // require('../model/product_db.php');

                $query = 'SELECT * FROM products;';                
                // processes to the database
                $statement = $db->prepare($query);
                $statement->execute();
                $products = $statement->fetchAll();


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
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Version</th>
                    <th>Release Date</th>
                    <th></th>                                                             
                </tr>
                <?php
                    foreach($products as $product) {
                        echo '<tr>';
                        
                        echo '<td>'.$product['productCode'].'</td>';
                        echo '<td>'.$product['name'].'</td>';
                        echo '<td>'.$product['version'].'</td>';
                        echo '<td>'.$product['releaseDate'].'</td>';
                        echo '
                            <td>
                                <form method="post" action="delete_product.php">
                                    <input type="text" name="productCode" value="'.$product['productCode'].'">
                                    <button>Delete</button>
                                </form>
                            </td>';

                        echo '</tr>';
                    }
                ?>
            </table>
        </main>   
    </body>
</html>