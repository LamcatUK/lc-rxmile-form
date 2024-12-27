// Step 1 Form
const step1Form = document.getElementById("step1form");

if (step1Form) {
    step1Form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission for validation
        let isValid = true;

        // Clear previous error messages and reset validity classes
        const errorElements = document.querySelectorAll(".error-message");
        errorElements.forEach(el => el.remove());

        const inputs = step1Form.querySelectorAll("input, select");
        inputs.forEach(input => {
            input.classList.remove("is-invalid", "is-valid");
        });

        // First Name Validation
        const firstName = document.getElementById("firstName");
        if (firstName.value.trim() === "") {
            showError(firstName, "First Name is required");
            markFieldValidity(firstName, false);
            isValid = false;
        } else {
            markFieldValidity(firstName, true);
        }

        // Last Name Validation
        const lastName = document.getElementById("lastName");
        if (lastName.value.trim() === "") {
            showError(lastName, "Last Name is required");
            markFieldValidity(lastName, false);
            isValid = false;
        } else {
            markFieldValidity(lastName, true);
        }

        // Company Name Validation
        const companyName = document.getElementById("companyName");
        if (companyName.value.trim() === "") {
            showError(companyName, "Company Name is required");
            markFieldValidity(companyName, false);
            isValid = false;
        } else {
            markFieldValidity(companyName, true);
        }

        // NPI Number Validation
        const npiNumber = document.getElementById("npiNumber");
        const npiPattern = /^\d{10}$/;
        if (!npiPattern.test(npiNumber.value)) {
            showError(npiNumber, "NPI Number must be exactly 10 digits");
            markFieldValidity(npiNumber, false);
            isValid = false;
        } else {
            markFieldValidity(npiNumber, true);
        }

        // Contact Email Validation
        const contactEmail = document.getElementById("contactEmail");
        if (!validateEmail(contactEmail.value)) {
            showError(contactEmail, "Please enter a valid email address");
            markFieldValidity(contactEmail, false);
            isValid = false;
        } else {
            markFieldValidity(contactEmail, true);
        }

        // Company Address Line 1 Validation
        const companyAddressLine1 = document.getElementById("companyAddressLine1");
        if (companyAddressLine1.value.trim() === "") {
            showError(companyAddressLine1, "Address 1 is required");
            markFieldValidity(companyAddressLine1, false);
            isValid = false;
        } else {
            markFieldValidity(companyAddressLine1, true);
        }

        // City Validation
        const companyCity = document.getElementById("companyCity");
        if (companyCity.value.trim() === "") {
            showError(companyCity, "City is required");
            markFieldValidity(companyCity, false);
            isValid = false;
        } else {
            markFieldValidity(companyCity, true);
        }

        // State Validation
        const companyState = document.getElementById("companyState");
        if (companyState.value === "") {
            showError(companyState, "Please select a state");
            markFieldValidity(companyState, false);
            isValid = false;
        } else {
            markFieldValidity(companyState, true);
        }

        // ZIP Code Validation
        const companyZip = document.getElementById("companyZip");
        const zipPattern = /^\d{5}(-\d{4})?$/;
        if (!zipPattern.test(companyZip.value)) {
            showError(companyZip, "ZIP code must be in the format 12345 or 12345-6789");
            markFieldValidity(companyZip, false);
            isValid = false;
        } else {
            markFieldValidity(companyZip, true);
        }

        // Delivery Preference Validation
        const preference = document.getElementById("preference");
        if (preference.value === "") {
            showError(preference, "Please select a delivery preference");
            markFieldValidity(preference, false);
            isValid = false;
        } else {
            markFieldValidity(preference, true);
        }

        // If form is valid, proceed with AJAX submission
        if (isValid) {
            const formData = new FormData(step1Form);

            fetch(rxmileData.ajax_url, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'rxmile_save_form',
                    nonce: rxmileData.nonce,
                    step: 'step1',
                    ...Object.fromEntries(formData),
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "/?step=step2";
                } else {
                    console.error("Error saving form data");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    });

    // Function to mark the field as valid or invalid
    function markFieldValidity(input, isValid) {
        if (isValid) {
            input.classList.add("is-valid");
            input.classList.remove("is-invalid");
        } else {
            input.classList.add("is-invalid");
            input.classList.remove("is-valid");
        }
        // Force reflow to ensure styles are properly applied
        void input.offsetHeight;
    }

    // Function to display error messages
    function showError(input, message) {
        const errorElement = document.createElement("div");
        errorElement.className = "error-message text-danger mt-1";
        errorElement.innerText = message;

        // Check if the input already has an error message
        if (!input.parentElement.querySelector('.error-message')) {
            input.parentElement.appendChild(errorElement);
        }
    }

    // Function to validate email format
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
}
