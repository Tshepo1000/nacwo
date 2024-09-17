<?php
include 'server.php';

// Check if the request is a POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Prepare the SQL statement
    $sql = "DELETE FROM nacwo_members WHERE member_id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('i', $id);
        
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo 'Record deleted successfully.';
            } else {
                echo 'No record found with that ID.';
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
