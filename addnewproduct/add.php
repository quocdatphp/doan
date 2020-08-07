<?php 
require("inc/db.php");

if ($_POST) {
    $barcode = trim($_POST['barcode']);
    $name    = trim($_POST['name']);
    $price   = (float) $_POST['price'];
    $qty     = (int) $_POST['qty'];
    $image   = trim($_POST['image']);
    $description = trim($_POST['description']);

    try {
        $sql = 'INSERT INTO products(barcode, name, price, qty, image, description) 
                VALUES(:barcode, :name, :price, :qty, :image, :description)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":barcode", $barcode);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":qty", $qty);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":description", $description);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: create.php?status=created");
            exit();
        }
        header("Location: create.php?status=fail_create");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: create.php?status=fail_create");
    exit();
}
?>