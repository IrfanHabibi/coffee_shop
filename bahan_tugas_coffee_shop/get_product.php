<?php
// get_product.php
header("Content-Type: application/json");
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        // Mengambil ulasan terkait
        $reviewStmt = $conn->prepare("SELECT * FROM reviews WHERE product_id = :id");
        $reviewStmt->bindParam(':id', $id);
        $reviewStmt->execute();
        $reviews = $reviewStmt->fetchAll(PDO::FETCH_ASSOC);

        if ($product) {
            $product['reviews'] = $reviews;
            echo json_encode($product);
        } else {
            echo json_encode(["error" => "Product not found"]);
        }
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "ID parameter is required"]);
}
?>
