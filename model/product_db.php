<?php

function get_product($product_id) {
    global $db;
    $query = '
        SELECT *
        FROM products 
        WHERE productID = :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
}

?>