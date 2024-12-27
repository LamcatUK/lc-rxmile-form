// Step 2 Form
const step2Form = document.getElementById("step2form");
const selectAllButtons = document.querySelectorAll('.select-all');
const optionCheckboxes = document.querySelectorAll('input[type="checkbox"].form-check');
const backButton = document.getElementById("back-to-step1");

if (step2Form) {


    step2Form.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(step2Form);
        
        // Add the step identifier to the form data
        formData.append('step', 'step2');

        // Send the form data using fetch
        fetch("save_form_data.php", {
            method: "POST",
            body: formData, // Use FormData directly, no conversion to URLSearchParams needed
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to step 3
                window.location.href = "/?step=step3";
            } else {
                console.error("Error saving options data:", data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    });
    
    // Handle 'Select All' buttons for step 2
    selectAllButtons.forEach((button) => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            optionCheckboxes.forEach((checkbox) => {
                checkbox.checked = true;
            });
            checkSelectAllStatus();
        });
    });


    // Function to check if all checkboxes are checked
    function checkSelectAllStatus() {
        const allChecked = Array.from(optionCheckboxes).every(checkbox => checkbox.checked);
        selectAllButtons.forEach(button => {
            button.disabled = allChecked;
        });
    }

    // Add event listener to each checkbox to check the status
    optionCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            checkSelectAllStatus();
        });
    });

    if (backButton) {
        backButton.addEventListener("click", function (event) {
            event.preventDefault();
            console.log("Back button clicked, redirecting to step 1");
            window.location.href = "/?step=step1";
        });
    }
}
