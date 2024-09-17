<?php
include 'server.php';

// Check if the request is a POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Validate the input
    if (empty($id) || empty($field) || empty($value)) {
        echo 'All fields are required.';
        exit;
    }

    // Prepare the SQL statement
    $sql = "UPDATE nacwo_members SET $field = ? WHERE member_id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('si', $value, $id);
        
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo 'Record updated successfully.';
            } else {
                echo 'No record found with that ID or no changes were made.';
            }
        } else {
            echo 'Error executing query.';
        }

        $stmt->close();
    } else {
        echo 'Error preparing statement.';
    }

    $conn->close();
}
?>
