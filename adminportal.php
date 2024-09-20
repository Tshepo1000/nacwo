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
    <link rel="stylesheet" href="frontend/css/responsive.css">
</head>
<body>
<header>
        <div class="logo_nav">
            <!-- logo -->
            <img src="images/NACWO-New-Logo-245x66.png" alt="nacwo logo" id="logo">
            <!-- navigation -->
            <nav class="navigation" id="navigation">
                <a href="index.php" class="back-link">HOME</a>
                <a href="https://nacwo.org.za/about-us/" target="_blank">ABOUT</a>
                <a href="https://nacwo.org.za/contact-us/" target="_blank">CONTACT US</a>
            </nav>

            <div class="menu">
                <img src="images/menu.png" alt="menu" id="menu">
                <img src="images/close.png" alt="close" id="close">
            </div>
        </div>

        <div id="slogan">
            <p>IMPROVING THE LIVELYHOOD OF OTHERS ONE WASH AT A TIME</p>
        </div>
    </header>
    <section class="main-container" id="main-container">
    <div class="background-overlay"></div>
    
    <div class = "container">
    <h1>NACWO | Memebership Details</h1>
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
                            <td><?php echo $row['ownership']; ?></td>
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
                        <td colspan="18">No records found</td>
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

        var menuIcon = document.getElementById("menu");
        var closeIcon = document.getElementById("close");
        var navigationBar = document.getElementById("navigation");
        var sectionBody = document.getElementById("main-container");
        
        
        menuIcon.addEventListener('click', function(){
            navigationBar.style.display = "flex";
            menuIcon.style.display = "none";
            closeIcon.style.display = "block";
            document.body.style.overflow = 'hidden';
        });
           
        closeIcon.addEventListener('click', function(){
            navigationBar.style.display = "none";
            closeIcon.style.display = "none";
            menuIcon.style.display = "block";
            document.body.style.overflow = '';
        });

</script>


</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
