console.log("DOM fully loaded and parsed");
const paymentForm = document.getElementById("payment-form");
const paymentSubmitButton = document.getElementById("payment-submit");
const backButton = document.getElementById("back-to-step2");
const cardNumber = document.getElementById("card-number");
const cardLogo = document.getElementById("card-logo"); // Assuming you have added an img element for the card logo
const sameAsCompanyCheckbox = document.getElementById("same-as-company");

if (paymentForm && paymentSubmitButton) {
    console.log("Form and submit button found");
    paymentSubmitButton.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("Submit button clicked");
        let isValid = true;

        // Clear previous error messages and reset validity classes
        const errorElements = document.querySelectorAll(".error-message");
        errorElements.forEach(el => el.remove());

        const inputs = paymentForm.querySelectorAll("input");
        inputs.forEach(input => {
            input.classList.remove("is-invalid", "is-valid");
        });

        // Cardholder Name Validation
        const cardholderName = document.getElementById("cardholder-name");
        if (cardholderName.value.trim() === "") {
            showError(cardholderName, "Cardholder Name is required");
            markFieldValidity(cardholderName, false);
            isValid = false;
        } else {
            markFieldValidity(cardholderName, true);
        }

        // Card Number Validation using Luhn Algorithm
        if (cardNumber.value.trim() === "" || !luhnCheck(cardNumber.value.replace(/\s+/g, ''))) {
            showError(cardNumber, "Invalid card number");
            markFieldValidity(cardNumber, false);
            isValid = false;
        } else {
            markFieldValidity(cardNumber, true);
        }

        // Expiry Date Validation
        const cardExpiry = document.getElementById("card-expiry");
        const cardExpiryPattern = /^(0[1-9]|1[0-2])\/(\d{2})$/;
        if (!cardExpiryPattern.test(cardExpiry.value)) {
            showError(cardExpiry, "Expiry Date must be in the format MM/YY");
            markFieldValidity(cardExpiry, false);
            isValid = false;
        } else {
            markFieldValidity(cardExpiry, true);
        }

        // CVC Validation
        const cardCvc = document.getElementById("card-cvc");
        const cardCvcPattern = /^\d{3,4}$/;
        if (!cardCvcPattern.test(cardCvc.value)) {
            showError(cardCvc, "CVC must be 3 or 4 digits");
            markFieldValidity(cardCvc, false);
            isValid = false;
        } else {
            markFieldValidity(cardCvc, true);
        }

        // If form is valid, proceed with AJAX submission
        if (isValid) {
            console.log("Form is valid, proceeding with submission");
            const formData = new FormData(paymentForm);

            fetch("save_form_data.php", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    step: 'step3',
                    ...Object.fromEntries(formData)
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Data saved successfully, redirecting...");
                    window.location.href = "/?step=thank-you";
                } else {
                    console.error("Error saving payment data");
                }
            })
            .catch(error => console.error("Error:", error));
        }
    });
} else {
    console.error("Form or submit button not found");
}

if (backButton) {
    backButton.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("Back button clicked, redirecting to step 2");
        window.location.href = "/?step=step2";
    });
}

// Card Type Detection
cardNumber.addEventListener("input", function (event) {
    const cardNumberValue = event.target.value.replace(/\s+/g, ''); // Remove any spaces
    const cardType = getCardType(cardNumberValue);

    if (cardType) {
        cardLogo.src = `img/${cardType}.png`; // Update path based on your structure
        cardLogo.style.display = "block";
    } else {
        cardLogo.style.display = "none";
    }
});

// Fill Billing Address if "Same as Company Address" is Checked
if (sameAsCompanyCheckbox) {
    sameAsCompanyCheckbox.addEventListener("change", function (event) {
        console.log("Checkbox changed:", event.target.checked);

        // Define the company address fields (hidden fields that store company address)
        const companyAddress = {
            line1: document.getElementById("company-address-line1-value")?.value || "",
            line2: document.getElementById("company-address-line2-value")?.value || "",
            city: document.getElementById("company-city-value")?.value || "",
            state: document.getElementById("company-state-value")?.value || "",
            zip: document.getElementById("company-zip-value")?.value || "",
            country: document.getElementById("company-country-value")?.value || ""
        };

        console.log("Company address values retrieved:", companyAddress);

        // Define the billing address fields (the ones users interact with)
        const billingFields = {
            line1: document.getElementById("billingAddressLine1"),
            line2: document.getElementById("billingAddressLine2"),
            city: document.getElementById("billingCity"),
            state: document.getElementById("billingState"),
            zip: document.getElementById("billingZip"),
            country: document.getElementById("billingCountry")
        };

        // Fill in or clear billing address fields based on the checkbox state
        if (event.target.checked) {
            console.log("Same as company address selected: Populating billing fields");

            for (let key in billingFields) {
                if (billingFields[key]) {
                    billingFields[key].value = companyAddress[key];
                    console.log(`Setting ${key}:`, billingFields[key].value);
                } else {
                    console.error(`Billing field ${key} not found`);
                }
            }
        } else {
            console.log("Same as company address unchecked: Clearing billing fields");

            for (let key in billingFields) {
                if (billingFields[key]) {
                    billingFields[key].value = "";
                    console.log(`Clearing ${key}`);
                } else {
                    console.error(`Billing field ${key} not found`);
                }
            }
        }
    });
}



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

// Luhn Algorithm for Card Validation
function luhnCheck(value) {
    let sum = 0;
    let shouldDouble = false;

    for (let i = value.length - 1; i >= 0; i--) {
        let digit = parseInt(value.charAt(i), 10);

        if (shouldDouble) {
            if ((digit *= 2) > 9) digit -= 9;
        }

        sum += digit;
        shouldDouble = !shouldDouble;
    }

    return (sum % 10) === 0;
}

// Function to detect card type based on number
function getCardType(number) {
    const patterns = {
        visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
        mastercard: /^(5[1-5][0-9]{14}|2[2-7][0-9]{14})$/,
        amex: /^3[47][0-9]{13}$/,
        discover: /^6(?:011|5[0-9]{2})[0-9]{12}$/
    };

    for (const card in patterns) {
        if (patterns[card].test(number)) {
            return card;
        }
    }
    return null;
}
