document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("rxmile-form");

    if (form) {
        form.addEventListener("submit", async (event) => {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(form);
            formData.append("action", "rxmile_save_form"); // Add AJAX action
            formData.append("nonce", rxmileData.nonce);    // Add nonce for security

            try {
                const response = await fetch(rxmileData.ajax_url, {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json();

                // Debugging: Log server response
                console.log("Response from server:", result);

                if (result.success) {
                    window.location.href = result.data.redirect_url;
                } else {
                    alert(result.message || "An error occurred.");
                }
            } catch (error) {
                console.error("AJAX error:", error);
                alert("There was a problem submitting the form.");
            }
        });
    }
});
