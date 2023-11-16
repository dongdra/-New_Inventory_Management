<?php
header('Content-Type: application/json');

// 데이터베이스 연결 설정
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_management";

// 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die(json_encode(array("success" => false, "error" => $conn->connect_error)));
}

// 삭제할 ID 가져오기
$id = $_GET['id'];

// SQL 쿼리 실행
$sql = "DELETE FROM management WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => "No rows affected"));
    }

    $stmt->close();
} else {
    echo json_encode(array("success" => false, "error" => "SQL query failed"));
}

// 연결 종료
$conn->close();
?>
