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
echo '<pre class="pt-5">' . print_r($_SESSION, true) . '</pre>';
echo '<pre class="pt-5">' . print_r($_SESSION['form_data'], true) . '</pre>';

wp_footer();

?>

</body>

</html>