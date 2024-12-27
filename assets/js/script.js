document.addEventListener("DOMContentLoaded", () => {
    // Get the form element
    const form = document.getElementById("rxmile-form");

    if (form) {
        form.addEventListener("submit", async (event) => {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(form); // Gather form data
            formData.append("action", "rxmile_save_form"); // Add the action for AJAX
            formData.append("nonce", rxmileData.nonce); // Add the nonce for security

            try {
                // Send the form data via AJAX to the server
                const response = await fetch(rxmileData.ajax_url, {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json(); // Parse the JSON response

                if (result.success) {
                    // Redirect to the next step if the request is successful
                    window.location.href = result.data.redirect_url;
                } else {
                    // Show an error message if something went wrong
                    alert(result.data.message || "An error occurred while processing the form.");
                }
            } catch (error) {
                // Handle any unexpected errors
                console.error("An error occurred:", error);
                alert("There was a problem submitting the form. Please try again.");
            }
        });
    }
});
