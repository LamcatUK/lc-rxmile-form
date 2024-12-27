<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
</div>
</main>
<footer>
    <div class="container-xl py-5 d-flex justify-content-between">
        <div class="footer__left">
            <div class="mb-4">
                320 W Sabal Palm Ste 300,<br>
                Longwood, Orlando,<br>
                FL 32779
            </div>
            <div class="d-flex align-items-center"><i class="icon-phone"></i> <a href="tel:+12704796453">(270) 479 6453</a></div>
        </div>
        <div class="footer__right">
            <div class="mb-2 text-center">Stay Connected</div>
            <div class="d-flex gap-2 mb-3 justify-content-center">
                <a href="https://www.facebook.com/"><i class="icon-facebook"></i></a>
                <a href="https://www.linkedin.com/"><i class="icon-linkedin"></i></a>
            </div>
            <a href="https://www.rxmile.com/" target="_blank">www.rxmile.com</a>
        </div>
    </div>
</footer>
<?php
if (current_user_can('administrator')) {
    $form_data = get_transient('rxmile_form_data');
    if ($form_data) {
        echo '<pre id="debug-info" style="display:none;">';
        print_r($form_data);
        echo '</pre>';
?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const debugInfo = document.getElementById("debug-info");
                if (debugInfo) {
                    const toggleButton = document.createElement("button");
                    toggleButton.textContent = "Toggle Debug Info";
                    toggleButton.style.position = "fixed";
                    toggleButton.style.bottom = "10px";
                    toggleButton.style.right = "10px";
                    toggleButton.style.zIndex = "1000";
                    toggleButton.addEventListener("click", function() {
                        if (debugInfo.style.display === "none") {
                            debugInfo.style.display = "block";
                        } else {
                            debugInfo.style.display = "none";
                        }
                    });
                    document.body.appendChild(toggleButton);
                }
            });
        </script>
<?php
    } else {
        echo '<p>No form data found in transient.</p>';
    }
}
wp_footer();

?>

</body>

</html>