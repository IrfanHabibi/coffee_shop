<?php
// get_reviews.php
header("Content-Type: application/json");
include 'config.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    try {
        $stmt = $conn->prepare("SELECT * FROM reviews WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($reviews);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Parameter product_id diperlukan"]);
}
?>
