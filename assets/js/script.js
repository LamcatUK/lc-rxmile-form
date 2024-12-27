document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("rxmile-form");

    if (form) {
        form.addEventListener("submit", async (event) => {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(form); // Serialize form data
            const requestData = new URLSearchParams();

            formData.forEach((value, key) => {
                requestData.append(key, value);
            });

            try {
                if (typeof rxmileData === "undefined") {
                    console.error("rxmileData is not defined. Ensure wp_localize_script is working correctly.");
                    return;
                }

                const response = await fetch(rxmileData.ajax_url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: requestData.toString() + `&action=rxmile_save_form&nonce=${rxmileData.nonce}`,
                });

                const result = await response.json();

                if (result.success) {
                    window.location.href = result.data.redirect_url; // Redirect to the next step
                } else {
                    alert(result.data.message || "An error occurred.");
                }
            } catch (error) {
                console.error("Error:", error);
                alert("There was a problem submitting the form.");
            }
        });
    }
});
