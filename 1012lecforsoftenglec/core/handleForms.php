<?php
require_once 'dbConfig.php';
require_once 'models.php';

// CAFE FORMS
if (isset($_POST['insertCafeBtn'])) {
    insertCafe($pdo, $_POST['cafe_name'], $_POST['address']);
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['editCafeBtn'])) {
    updateCafe($pdo, $_POST['cafe_id'], $_POST['cafe_name'], $_POST['address']);
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['deleteCafeBtn'])) {
    deleteCafe($pdo, $_POST['cafe_id']);
    header("Location: ../index.php");
    exit;
}

// ORDER FORMS
if (isset($_POST['insertOrderBtn'])) {
    insertOrder($pdo, $_POST['menu_item'], $_POST['customer_name'], $_POST['total_amount'], $_POST['cafe_id']);
    header("Location: ../vieworders.php?cafe_id=" . $_POST['cafe_id']);
    exit;
}

if (isset($_POST['editOrderBtn'])) {
    updateOrder($pdo, $_POST['order_id'], $_POST['menu_item'], $_POST['customer_name'], $_POST['total_amount']);
    header("Location: ../vieworders.php?cafe_id=" . $_POST['cafe_id']);
    exit;
}

if (isset($_POST['deleteOrderBtn'])) {
    deleteOrder($pdo, $_POST['order_id']);
    header("Location: ../vieworders.php?cafe_id=" . $_POST['cafe_id']);
    exit;
}
?>
