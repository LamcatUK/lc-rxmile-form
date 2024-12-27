document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("rxmile-form");

    if (form) {
        form.addEventListener("submit", async (event) => {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(form);
            formData.append("action", "rxmile_save_form"); // Add action for AJAX
            formData.append("nonce", rxmileData.nonce);    // Add nonce for security
            formData.append("step", rxmileData.step);      // Add the current step

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
                    alert(result.message || "An error occurred.");
                }
            } catch (error) {
                console.error("AJAX error:", error);
                alert("There was a problem submitting the form.");
            }
        });
    }
});
