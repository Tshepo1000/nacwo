<?php include 'server.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NACWO | Member Onboarding</title>
    <link rel="stylesheet" href="frontend/css/style.css"> <!-- links to style.css -->
    <link rel="stylesheet" href="frontend/css/animations.css"> <!-- links to animation.css -->
    <link rel="stylesheet" href="frontend/css/responsive.css"> <!-- links to responsive.css -->
    <script src="frontend/js/script.js" defer></script> <!-- links to script.js -->
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo_nav">
            <!-- logo -->
            <img src="images/NACWO-New-Logo-245x66.png" alt="nacwo logo" id="logo">
            
            <!-- navigation -->
            <nav class="navigation" id="navigation">
                <a href="adminportal.php" class="back-link">MEMBERS</a>
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
        <div class="container">
            <h1>NACWO Member Onboarding Form</h1>
            <form action="submit_form.php" method="post" id="nacwoForm" class="form-grid">
                <!-- Step 1: Car Wash & Business Info -->
                <div class="car_wash_business_info active" id="carWashBusInfo">
                    <fieldset>
                        <legend>Car Wash & Business Info</legend>

                        <label for="nm_number">NACWO Membership Number (NM#):</label>
                        <input type="number" id="nm_number" name="nm_number" pattern="[0-9]+" required>

                        <label for="car_wash_name">Car Wash Name:</label>
                        <input type="text" id="car_wash_name" name="car_wash_name" required>

                        <label for="registered_business_name">Registered Business Name:</label>
                        <input type="text" id="registered_business_name" name="registered_business_name" required>

                        <label for="registration_no">Registration Number:</label>
                        <input type="number" id="registration_no" name="registration_no" required>

                        <label for="cipc">CIPC Registered:</label>
                        <select id="cipc" name="cipc" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>

                        <label for="business_bank_account">Business Bank Account:</label>
                        <select id="business_bank_account" name="business_bank_account" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>

                        <label for="sars_pin">SARS PIN:</label>
                        <select id="sars_pin" name="sars_pin" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>

                        <label for="ownership">Ownership Type:</label>
                        <select id="ownership" name="ownership" required>
                            <option value="private">Private</option>
                            <option value="franchise">Franchise</option>
                        </select>
                    </fieldset>
                </div> 
                <div class="next_" id="next">
                    <button id="showsSecondForm" onclick="showSecondForm();">Next</button>
                </div>  
                
                    <!-- Step 2: Owner Info -->
                    <div class="owner_info" id="ownerInfo">
                        <fieldset>
                            <legend>Owner Info</legend>

                            <label for="owner_name">Owner's Name & Surname:</label>
                            <input type="text" id="owner_name" name="owner_name" required>

                            <label for="owner_id">Owner's ID Number:</label>
                            <input type="number" id="owner_id" name="owner_id" minlength="13" maxlength="13" required>

                            <label for="contact_number">Contact Number:</label>
                            <input type="tel" id="contact_number" name="contact_number" required>

                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" required>

                            <label for="joining_date">Joining Date:</label>
                            <input type="date" id="joining_date" name="joining_date" required>
                        </fieldset>
                    </div>
                    <div class="next_prev" id="nextPrev">
                        <button id="backToFirstForm" onclick="showFirstForm();">Previous</button> 
                        <button id="showsThirdForm" onclick="showThirdForm();">Next</button>
                    </div>
                    
                    

                <!-- Step 3: Location Info -->
                <div class="location_info" id="locationInfo">
                    <fieldset>
                        <legend>Location Info</legend>

                        <label for="physical_address">Physical Address:</label>
                        <input type="text" id="physical_address" name="physical_address" required>

                        <label for="gps_coordinates">GPS Coordinates:</label>
                        <input type="text" id="gps_coordinates" name="gps_coordinates">

                        <label for="city_township">City / Township:</label>
                        <input type="text" id="city_township" name="city_township" required>

                        <label for="province">Province:</label>
                        <select id="province" name="province" required>
                            <option value="">--Select Province--</option>
                            <option value="Eastern Cape">Eastern Cape</option>
                            <option value="Free State">Free State</option>
                            <option value="Gauteng">Gauteng</option>
                            <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                            <option value="Limpopo">Limpopo</option>
                            <option value="Mpumalanga">Mpumalanga</option>
                            <option value="Northern Cape">Northern Cape</option>
                            <option value="North West">North West</option>
                            <option value="Western Cape">Western Cape</option>
                        </select>
                    </fieldset>
                </div>
                <div class="prev_submit" id="prevSub">
                    <button id="backToSecondForm" onclick="showSecondForm();">Previous</button> 
                    <button type="submit" id="submitsTheForm">Submit</button>
                </div>

                <!-- Submit Button -->
                <!-- <button type="submit">Submit</button> -->
            </form>
        </div>
    </section>

    <script>
        var submitBtn = document.getElementById('submitsTheForm');
        submitBtn.addEventListener('click', function(){
            document.location.href = "adminportal.php";
        })

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
