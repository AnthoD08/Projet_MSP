<?php
session_start(); 
include 'db.php'; 
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'inactive']);
    exit();
}

$sql = "SELECT * FROM utilisateurs"; 
$result = $conn->query($sql); 

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row; 
    }
} 

$conn->close(); 

header('Content-Type: application/json'); 
echo json_encode($data); 
?>
?>