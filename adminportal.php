<?php
include 'server.php';

// Fetch all records from the database
$sql = "SELECT * FROM nacwo_members";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NACWO | Admin Portal</title>
    <link rel="stylesheet" href="frontend/css/style.css">

    <style>
        /* default layout */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Roboto", sans-serif;
}

/* Table styling */
/* Table container */
.table-container {
    overflow-x: auto; 
    overflow-y: auto; 
    height: 400px; 
    margin: 20px 0; 
    border: 2px solid white; 
    padding: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 14px;
    text-align: left;
    background-color: white;
}

th, td {
    padding: 15px;
    border-bottom: 1px solid #ddd;
    font-size: 0.9rem;
}

th {
    background-color: #f4f4f4;
    color: #333;
    text-align: center;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

/* Header styling */
h1 {
    font-size: 24px;
    color: white;
    margin: 20px 0;
    text-align: center;
}

/* Form styling */
form {
    margin: 20px 0;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="date"] {
    width: calc(100% - 22px);
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.buttons {
    margin-top: 20px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.buttons button {
    width: 120px;
    height: 40px;
    cursor: pointer;
    font-size: 17px;
    border-radius: 10px;
    color: white;
    border: none;
}

#add {
    background-color: green;
}

#delete {
    background-color: red;
}

#update {
    background-color: blue;
}

#add:hover {
    background-color: transparent;
    border: 2px solid green;
}

#delete:hover {
    background-color: transparent;
    border: 2px solid red;
}

#update:hover {
    background-color: transparent;
    border: 2px solid blue;
}

.container {
    overflow-y: hidden;
    position: relative;
    margin: 0 auto;
    max-width: 90%;
}

/* Popup styles */
.popup {
    display: none; /* Hidden by default */
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4); /* Black background with opacity */
    z-index: 1000; /* Sit on top */
}

.popup-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px; /* Optional: maximum width */
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.close-button {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close-button:hover,
.close-button:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.popup-content h2 {
    margin-top: 0;
    color: #333;
}

.popup-content label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

.popup-content input[type="text"] {
    width: calc(100% - 22px);
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 10px;
}

.popup-content button {
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

.popup-content button:hover {
    background-color: #0056b3;
}

.popup-content p {
    margin-top: 10px;
    color: #d9534f; /* Error color */
    font-weight: bold;
}

/* Media Queries */

/* Mobile Styles */
@media (max-width: 600px) {
    table {
        font-size: 12px;
    }

    th, td {
        padding: 10px;
    }

    .buttons {
        flex-direction: column;
        gap: 5px;
    }

    .buttons button {
        width: 70%;
    }

    .container {
        max-width: 100%;
    }

    .popup-content {
        width: 90%;
    }
}

/* Tablet Styles */
@media (min-width: 601px) and (max-width: 768px) {
    table {
        font-size: 14px;
    }

    th, td {
        padding: 15px;
    }

    .buttons {
        flex-direction: row;
        gap: 10px;
    }

    .buttons button {
        width: 100px;
    }

    .container {
        max-width: 100%;
    }

    .popup-content {
        width: 80%;
    }
}

/* Desktop Styles */
@media (min-width: 769px) {
    table {
        width: 80%;
    }

    th, td {
        padding: 20px;
        font-size: 0.9rem;
    }

    .container {
        max-width: 80%;
    }
}


    </style>

</head>
<body>
<header>
        <div class="logo_nav">
            <!-- logo -->
            <img src="images/NACWO-New-Logo-245x66.png" alt="nacwo logo" id="logo">
            <!-- navigation -->
            <nav class="navigation" id="navigation">
                <a href="index.php" class="back-link">HOME</a>
                <a href="#about">ABOUT</a>
                <a href="contact">CONTACT US</a>
            </nav>
        </div>

        <div id="slogan">
            <p>IMPROVING THE LIVELYHOOD OF OTHERS ONE WASH AT A TIME</p>
        </div>
    </header>
    <section class="main-container">
    <h1>NACWO | Memebership Details</h1>
    <div class = "container">
        <div class="buttons">
            <button id="update">Update</button>
            <button id="delete">Delete</button>
            <button id="add">Add Member</button>
        </div>

        <div class="table-container">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NACWO Membership Number</th>
                    <th>Car Wash Name</th>
                    <th>Registered Business Name</th>
                    <th>Registration Number</th>
                    <th>CIPC</th>
                    <th>Business Bank Account</th>
                    <th>SARS PIN</th>
                    <th>Ownership</th>
                    <th>Owner's Name</th>
                    <th>Owner's ID</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Joining Date</th>
                    <th>Physical Address</th>
                    <th>GPS Coordinates</th>
                    <th>City/Township</th>
                    <th>Province</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['member_id']; ?></td>
                            <td><?php echo $row['nm_number']; ?></td>
                            <td><?php echo $row['car_wash_name']; ?></td>
                            <td><?php echo $row['registered_business_name']; ?></td>
                            <td><?php echo $row['registration_no']; ?></td>
                            <td><?php echo $row['cipc']; ?></td>
                            <td><?php echo $row['business_bank_account']; ?></td>
                            <td><?php echo $row['sars_pin']; ?></td>
                            <td><?php echo $row['ownership_type']; ?></td>
                            <td><?php echo $row['owner_name']; ?></td>
                            <td><?php echo $row['owner_id']; ?></td>
                            <td><?php echo $row['contact_number']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['joining_date']; ?></td>
                            <td><?php echo $row['physical_address']; ?></td>
                            <td><?php echo $row['gps_coordinates']; ?></td>
                            <td><?php echo $row['city_township']; ?></td>
                            <td><?php echo $row['province']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="17">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        </div>

        <!-- Delete Popup -->
        <div id="deletePopup" class="popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup()">&times;</span>
                <h2>Delete Record</h2>
                <label for="deleteId">Enter Record ID:</label>
                <input type="text" id="deleteId" name="deleteId">
                <button onclick="deleteRecord()" style="width: 80px; color: white; font-size: 18px; background-color: red; border:none; cursor: pointer; border-radius: 10px;">Delete</button>
                <p id="deleteMessage"></p>
            </div>
        </div>

        <!-- Update Popup -->
        <div id="updatePopup" class="popup">
            <div class="popup-content">
                <span class="close-button" onclick="closeUpdatePopup()">&times;</span>
                <h2>Update Record</h2>
                <label for="updateId">Enter Record ID:</label>
                <input type="text" id="updateId" name="updateId">
                <label for="updateField">Update Field:</label>
                <input type="text" id="updateField" name="updateField">
                <label for="updateValue">New Value:</label>
                <input type="text" id="updateValue" name="updateValue">
                <button onclick="updateRecord()">Update</button>
                <p id="updateMessage"></p>
            </div>
        </div>


    </div>
    </section>

    <script>
        //redirect
        var addMemberBtn = document.getElementById("add");
        addMemberBtn.addEventListener('click', function(){
            document.location.href = "index.php";
        })

    // Show the popup
    document.getElementById('delete').addEventListener('click', function() {
        document.getElementById('deletePopup').style.display = 'block';
    });

    // Close the popup
    function closePopup() {
        document.getElementById('deletePopup').style.display = 'none';
    }

    // Handle delete request
    function deleteRecord() {
        var deleteId = document.getElementById('deleteId').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_record.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update message
                    document.getElementById('deleteMessage').textContent = xhr.responseText;
                } else {
                    document.getElementById('deleteMessage').textContent = 'Error deleting record.';
                }
            }
        };
        xhr.send('id=' + encodeURIComponent(deleteId));
    }

    // Show the update popup
    document.getElementById('update').addEventListener('click', function() {
        document.getElementById('updatePopup').style.display = 'block';
    });

    // Close the update popup
    function closeUpdatePopup() {
        document.getElementById('updatePopup').style.display = 'none';
    }

    // Handle update request
    function updateRecord() {
        var updateId = document.getElementById('updateId').value;
        var updateField = document.getElementById('updateField').value;
        var updateValue = document.getElementById('updateValue').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_record.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update message
                    document.getElementById('updateMessage').textContent = xhr.responseText;
                } else {
                    document.getElementById('updateMessage').textContent = 'Error updating record.';
                }
            }
        };
        xhr.send('id=' + encodeURIComponent(updateId) + '&field=' + encodeURIComponent(updateField) + '&value=' + encodeURIComponent(updateValue));
    }

</script>


</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
