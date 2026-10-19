<?php
require_once 'dbConfig.php';

// CAFE FUNCTIONS (Parent)
function insertCafe($pdo, $cafe_name, $address) {
    $sql = "INSERT INTO cafe (cafe_name, address) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$cafe_name, $address]);
}

function getAllCafes($pdo) {
    $sql = "SELECT * FROM cafe";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getCafeByID($pdo, $cafe_id) {
    $sql = "SELECT * FROM cafe WHERE cafe_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cafe_id]);
    return $stmt->fetch();
}

function updateCafe($pdo, $cafe_id, $cafe_name, $address) {
    $sql = "UPDATE cafe SET cafe_name = ?, address = ? WHERE cafe_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$cafe_name, $address, $cafe_id]);
}

function deleteCafe($pdo, $cafe_id) {
    $sql = "DELETE FROM cafe WHERE cafe_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$cafe_id]);
}

// ORDER FUNCTIONS (Child)
function getOrdersByCafe($pdo, $cafe_id) {
    $sql = "SELECT * FROM orders WHERE cafe_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cafe_id]);
    return $stmt->fetchAll();
}

function insertOrder($pdo, $menu_item, $customer_name, $total_amount, $cafe_id) {
    $sql = "INSERT INTO orders (menu_item, customer_name, total_amount, cafe_id) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$menu_item, $customer_name, $total_amount, $cafe_id]);
}

function getOrderByID($pdo, $order_id) {
    $sql = "SELECT * FROM orders WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$order_id]);
    return $stmt->fetch();
}

function updateOrder($pdo, $order_id, $menu_item, $customer_name, $total_amount) {
    $sql = "UPDATE orders SET menu_item = ?, customer_name = ?, total_amount = ? WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$menu_item, $customer_name, $total_amount, $order_id]);
}

function deleteOrder($pdo, $order_id) {
    $sql = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$order_id]);
}
?>
