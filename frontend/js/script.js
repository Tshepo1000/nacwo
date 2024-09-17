// shows next form on click
// forms
const firstForm = document.getElementById("carWashBusInfo");
const secondForm = document.getElementById("ownerInfo");
const thirdForm = document.getElementById("locationInfo");

// buttons
const firstBtnNext = document.getElementById("showsSecondForm");
const secondBtnNext = document.getElementById("showsThirdForm");
const thirdBtn = document.getElementById("submitsTheForm")

const firstBtnPrev = document.getElementById("backToFirstForm");
const secondBtnPrev = document.getElementById("backToSecondForm");

// divs
const firstDiv = document.getElementById("next");
const secondDiv = document.getElementById("nextPrev");
const thirdDiv = document.getElementById("prevSub");

// forms validation
function validateStep(formId) {
    const form = document.getElementById(formId);
    const inputs = form.querySelectorAll('input, select');
    let valid = true;

    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.classList.add('invalid'); 
            valid = false;
        } else {
            input.classList.remove('invalid'); 
        }
    });

    return valid;
}

// Owners_ID validation
function validateIDLength(id) {
    const field = document.getElementById(id);
    const value = field.value.trim();

    if (value.length !== 13) {
        field.style.border = "2px solid red"; // Highlight if invalid
        alert("Owner's ID must be exactly 13 digits.");
        return false;
    } else {
        field.style.border = ""; // Remove highlight if valid
        return true;
    }
}


// first form - business information
function showFirstForm(){
    firstForm.classList.add('active');
    // Remove active class from other forms
    secondForm.classList.remove('active');
    thirdForm.classList.remove('active');
    
    // Add active class to the first form
    firstForm.classList.add('active');

    //changes forms
    firstForm.style.display = "block";
    secondForm.style.display = "none";
    thirdForm.style.display = "none";

    firstDiv.style.display = "flex";
    secondDiv.style.display = "none";
    thirdDiv.style.display = "none";
}

// second form - owners information
function showSecondForm(){
     // Validates the first form to move to second form
     if (!validateStep('carWashBusInfo')) {
        alert("Please complete all required fields.");
        return; // Stop function if form is invalid
    }

     // Remove active class from other forms
     firstForm.classList.remove('active');
     thirdForm.classList.remove('active');
     
     // Add active class to the second form
     secondForm.classList.add('active');

    // changes forms
    firstForm.style.display = "none";
    secondForm.style.display = "block";
    thirdForm.style.display = "none";

    // hides buttons
    firstDiv.style.display = "none";
    secondDiv.style.display = "flex";
    thirdDiv.style.display = "none";
}

// third form - location information
function showThirdForm(){
     // Validates the second form
     if (!validateStep('ownerInfo')) {
        alert("Please complete all required fields.");
        return; // Stop function if form is invalid
    }

    if (validateIDLength("owner_id")){
        // Remove active class from other forms
        firstForm.classList.remove('active');
        secondForm.classList.remove('active');
        
        // Add active class to the third form
        thirdForm.classList.add('active');

        firstForm.style.display = "none";
        secondForm.style.display = "none";
        thirdForm.style.display = "block";

        firstDiv.style.display = "none";
        secondDiv.style.display = "none";
        thirdDiv.style.display = "flex";
    }
    
}