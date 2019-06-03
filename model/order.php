<?php
function add_transaction($transaction_id, $customer_id, $email_phone, $first_name, $last_name, $company, $address, $apt, $city, $country, $state, $zip, $phone, $mirror, $brush, $shipping_method, $subtotal, $shipping, $total){
    global $db;
    $query = '
    INSERT INTO transactions (transaction_id, customer_id, email_phone, first_name, last_name, company, address, apt, city, country, state, zip, phone, mirror, brush, shipping_method, subtotal, shipping, total)
    
    VALUES (:transaction_id, :customer_id, :email_phone, :first_name, :last_name, :company, :address, :apt, :city, :country, :state, :zip, :phone, :mirror, :brush, :shipping_method, :subtotal, :shipping, :total)';
    $statement = $db->prepare($query);
    $statement->bindValue(':transaction_id', $transaction_id);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':email_phone', $email_phone);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':company', $company);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':apt', $apt);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':country', $country);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':mirror', $mirror);
    $statement->bindValue(':brush', $brush);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':shipping_method', $shipping_method);
    $statement->bindValue(':subtotal', $subtotal);
    $statement->bindValue(':shipping', $shipping);
    $statement->bindValue(':total', $total);
    $statement->execute();
    $statement->closeCursor();
}

function add_customer($customer_id, $first_name, $last_name, $email, $phone_number){
    global $db;
    $query = '
    INSERT INTO customers (customer_id, first_name, last_name, email, phone_number)
    VALUES (:customer_id, :first_name, :last_name, :email, :phone_number)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone_number', $phone_number);
    $statement->execute();
    $statement->closeCursor();
}
?>
