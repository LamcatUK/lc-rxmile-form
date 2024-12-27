document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("rxmile-form");

    if (form) {
        form.addEventListener("submit", async (event) => {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(form);
            formData.append("action", "rxmile_save_form"); // Add action for AJAX
            formData.append("nonce", rxmileData.nonce);    // Add nonce for security

            try {
                const response = await fetch(rxmileData.ajax_url, {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json();

                if (result.success) {
                    // Redirect to the next step
                    window.location.href = result.data.redirect_url;
                } else {
                    // Enhanced error message
                    const errorMessage = result.message
                        ? `Server error: ${result.message}`
                        : `Unknown error occurred. Status: ${response.status} (${response.statusText})`;
                    alert(errorMessage);
                }
            } catch (error) {
                console.error("AJAX error:", error);
                alert("There was a problem submitting the form.");
            }
        });
    }
});
