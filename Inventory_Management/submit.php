<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_management";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $product = $_POST['product'];
    $number = $_POST['number'];
    $price = $_POST['price'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $warehousing = $_POST['warehousing'];
    $outhousing = $_POST['outhousing'];

    $stmt = $conn->prepare("INSERT INTO management (name, product, number, price, phone, address, warehousing, outhousing) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $product, $number, $price, $phone, $address, $warehousing, $outhousing]);

    // 성공 메시지 설정 및 원래 페이지로 리다이렉트
    echo "<script>alert('제출 성공');</script>";
    echo "<script>window.location.href='Write_Page.html';</script>";
    
} catch(PDOException $e) {
    echo "<script>alert('데이터 저장에 실패했습니다: " . $e->getMessage() . "');</script>";
    echo "<script>window.location.href='Write_Page.html';</script>";
}
?>
