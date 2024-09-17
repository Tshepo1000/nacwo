<?php
include 'server.php'; 

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form input values
    $nm_number = $_POST['nm_number']; 
    $car_wash_name = $_POST['car_wash_name'];
    $registered_business_name = $_POST['registered_business_name'];
    $registration_no = $_POST['registration_no'];
    $cipc = $_POST['cipc'];
    $business_bank_account = $_POST['business_bank_account'];
    $sars_pin = $_POST['sars_pin'];
    $ownership = $_POST['ownership'];
    $owner_name = $_POST['owner_name'];
    $owner_id = $_POST['owner_id'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $joining_date = $_POST['joining_date'];
    $physical_address = $_POST['physical_address'];
    $gps_coordinates = $_POST['gps_coordinates'];
    $city_township = $_POST['city_township'];
    $province = $_POST['province'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO nacwo_members (nm_number, car_wash_name, registered_business_name, registration_no, cipc, business_bank_account, sars_pin, ownership_type, owner_name, owner_id, contact_number, email, joining_date, physical_address, gps_coordinates, city_township, province) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssss", $nm_number, $car_wash_name, $registered_business_name, $registration_no, $cipc, $business_bank_account, $sars_pin, $ownership, $owner_name, $owner_id, $contact_number, $email, $joining_date, $physical_address, $gps_coordinates, $city_township, $province);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: Something went wrong";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

     // Redirect to admin portal
     header("Location: adminportal.php");
}
?>
