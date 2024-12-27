document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("rxmile-form");

    if (form) {
        form.addEventListener("submit", async (event) => {
            event.preventDefault();

            const formData = new FormData(form);
            formData.append("action", "rxmile_save_form");
            formData.append("nonce", rxmileData.nonce);

            try {
                const response = await fetch(rxmileData.ajax_url, {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json();

                console.log("Server response:", result); // Check this in the console

                if (result.success) {
                    window.location.href = result.data.redirect_url;
                } else {
                    console.error("Server error:", result.message);
                    alert(result.message || "An error occurred.");
                }
            } catch (error) {
                console.error("AJAX error:", error);
                alert("There was a problem submitting the form.");
            }
        });
    } else {
        console.error("Form not found on the page.");
    }
});
