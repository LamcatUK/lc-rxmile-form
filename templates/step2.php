<?php
$options = isset($_SESSION['form_data']['options']) ? $_SESSION['form_data']['options'] : [];
?>
<h1 class="mb-3"><?= $config['step2']['title'] ?></h1>
<div class="intro-text mb-4"><?= $config['step2']['intro'] ?></div>
<form id="step2form" method="post">
    <div class="mb-5">
        <button type="button" class="select-all button-secondary">Select All</button>
        <button id="next" type="submit" class="button-primary">Next</button>
    </div>

    <div class="row g-5 mb-5">
        <!-- Co-Pay Collection - PayCollect -->
        <div class="col-md-6 col-lg-4">
            <div class="card-content d-flex flex-column w-100">
                <div class="option__label mb-2 d-flex justify-content-between">
                    <label for="option1" class="h3">PayCollect</label>
                    <input type="checkbox" id="option1" name="options[]" value="payCollect" class="form-check" <?php echo in_array('payCollect', $options) ? 'checked' : 'not'; ?>>
                </div>
                <div class="ratio ratio-16x9 mb-2">
                    <iframe id="youtube-player" width="640" height="360"
                        src="https://www.youtube.com/embed/l9iOsg3YQMc"
                        title="PayCollect"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="tiny">RxMile offers a flexible co-pay collection process, whether at the pharmacy counter or right at the patient's doorstep. With seamless payment integration, patients can pay securely with a credit card, making it easier for pharmacies to maintain efficient transactions. Streamline payments and make it simple for both pharmacies and patients.</div>
            </div>
        </div>
        <!-- Add-On Items During Delivery - EngageCart-->
        <div class="col-md-6 col-lg-4">
            <div class="card-content d-flex flex-column w-100">
                <div class="option__label mb-2 d-flex justify-content-between">
                    <label for="option2" class="h3">EngageCart</label>
                    <input type="checkbox" id="option2" name="options[]" value="custEng" class="form-check" <?php echo in_array('custEng', $options) ? 'checked' : 'not'; ?>>
                </div>
                <div class="ratio ratio-16x9 mb-2">
                    <iframe id="youtube-player" width="640" height="360"
                        src="https://www.youtube.com/embed/zw5ms9kkYu8"
                        title="Customer Engagement"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="tiny">Imagine getting a notification before your medication arrives, asking if you need any additional health products. With RxMile, patients can easily add over-the-counter items to their delivery at the touch of a button, all from the convenience of their home. It's an effortless way to enhance customer experience and boost pharmacy sales.</div>
            </div>
        </div>
        <!-- Drop Shipment for Non-Stock Items - Local Cart -->
        <div class="col-md-6 col-lg-4">
            <div class="card-content d-flex flex-column w-100">
                <div class="option__label mb-2 d-flex justify-content-between">
                    <label for="option3" class="h3">LocalCart</label>
                    <input type="checkbox" id="option3" name="options[]" value="localCart" class="form-check" <?php echo in_array('localCart', $options) ? 'checked' : 'not'; ?>>
                </div>
                <div class="ratio ratio-16x9 mb-2">
                    <iframe id="youtube-player" width="640" height="360"
                        src="https://www.youtube.com/embed/nwMaHB-KBzM"
                        title="LocalCart"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="tiny">With RxMile's drop shipment option, patients can order items not in stock at the pharmacy with just a few taps. Non-stock items ship directly to them within days, giving pharmacies the flexibility to offer a wider selection (pharmacies can add markup to increase revenue without having it in the front end; this will drive local communities to buy from their pharmacy) without the need for extra storage. It's a win-win for both convenience and cost savings.</div>
            </div>
        </div>
        <!-- Temperature-Controlled Deliveries - TempTrack -->
        <div class="col-md-6 col-lg-4">
            <div class="card-content d-flex flex-column w-100">
                <div class="option__label mb-2 d-flex justify-content-between">
                    <label for="option4" class="h3">TempTrack</label>
                    <input type="checkbox" id="option4" name="options[]" value="tempTrack" class="form-check" <?php echo in_array('tempTrack', $options) ? 'checked' : 'not'; ?>>
                </div>
                <div class="ratio ratio-16x9 mb-2">
                    <iframe id="youtube-player" width="640" height="360"
                        src="https://www.youtube.com/embed/_1UMFxQt0Ug"
                        title="TempTrack"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="tiny">Temperature-sensitive medications are in safe hands with RxMile's real-time tracking. From pharmacy to doorstep, pharmacists and patients can monitor delivery conditions with a live temperature readout, ensuring medications remain effective. RxMile takes temperature-sensitive care to a new level, maintaining safety every step of the way.</div>
            </div>
        </div>
        <!-- Driver Payroll Integration - PaySync -->
        <div class="col-md-6 col-lg-4">
            <div class="card-content d-flex flex-column w-100">
                <div class="option__label mb-2 d-flex justify-content-between">
                    <label for="option5" class="h3">PaySync</label>
                    <input type="checkbox" id="option5" name="options[]" value="paySync" class="form-check" <?php echo in_array('paySync', $options) ? 'checked' : 'not'; ?>>
                </div>
                <div class="ratio ratio-16x9 mb-2">
                    <iframe id="youtube-player" width="640" height="360"
                        src="https://www.youtube.com/embed/JDyZAD4u_Ew"
                        title="PaySync"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="tiny">Managing driver payroll has never been simpler. With RxMile, payroll data is integrated directly with QuickBooks, allowing for smooth data transfer and reducing manual entry errors. Pharmacy managers can handle payroll with just a click, saving time, reducing costs, and maintaining accuracy across the board.</div>
            </div>
        </div>
        <!-- Scheduled Delivery Zones - GeoLink -->
        <div class="col-md-6 col-lg-4">
            <div class="card-content d-flex flex-column w-100">
                <div class="option__label mb-2 d-flex justify-content-between">
                    <label for="option6" class="h3">GeoLink</label>
                    <input type="checkbox" id="option6" name="options[]" value="geoLink" class="form-check" <?php echo in_array('geoLink', $options) ? 'checked' : 'not'; ?>>
                </div>
                <div class="ratio ratio-16x9 mb-2">
                    <iframe id="youtube-player" width="640" height="360"
                        src="https://www.youtube.com/embed/Fbr4EmFM314"
                        title="GeoLink"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="tiny">RxMile allows pharmacy managers to create scheduled delivery zones, improving delivery efficiency and ensuring consistent service. By setting regular delivery days for specific areas, pharmacies can reduce travel time and fuel costs, enhancing overall route optimization and improving service reliability.</div>
            </div>
        </div>
        <!-- AI-Powered Driver Companion - RouteGuard -->
        <div class="col-md-6 col-lg-4">
            <div class="card-content d-flex flex-column w-100">
                <div class="option__label mb-2 d-flex justify-content-between">
                    <label for="option7" class="h3">RouteGuard</label>
                    <input type="checkbox" id="option7" name="options[]" value="routeGuard" class="form-check" <?php echo in_array('routeGuard', $options) ? 'checked' : 'not'; ?>>
                </div>
                <div class="ratio ratio-16x9 mb-2">
                    <iframe id="youtube-player" width="640" height="360"
                        src="https://www.youtube.com/embed/PqCkT2UkKBE"
                        title="RouteGuard"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="tiny">Accuracy matters in prescription deliveries. RxMile's AI-powered package verification ensures drivers are delivering the right package to the right person. An alert system instantly notifies drivers of potential errors, reducing human error and providing a dependable delivery experience. Every delivery is precise, keeping patient safety in focus along with PHI secured.</div>
            </div>
        </div>
        <!-- AI Customer Support for Delivery Tracking - TrackAssist -->
        <div class="col-md-6 col-lg-4">
            <div class="card-content d-flex flex-column w-100">
                <div class="option__label mb-2 d-flex justify-content-between">
                    <label for="option8" class="h3">TrackAssist</label>
                    <input type="checkbox" id="option8" name="options[]" value="trackAssist" class="form-check" <?php echo in_array('trackAssist', $options) ? 'checked' : 'not'; ?>>
                </div>
                <div class="ratio ratio-16x9 mb-2">
                    <iframe id="youtube-player" width="640" height="360"
                        src="https://www.youtube.com/embed/CvJLlQgmqls"
                        title="TrackAssist"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="tiny">Need to track your delivery? RxMile's AI-powered support makes it easy. Patients simply call in and, for just $1 per session, receive real-time delivery updates without extra staffing. It's a fast, reliable solution that keeps patients informed while reducing operational costs for the pharmacy.</div>
            </div>
        </div>
        <!-- Integration with Value-Added Platforms - Integrated PRM -->
        <div class="col-md-6 col-lg-4">
            <div class="card-content d-flex flex-column w-100">
                <div class="option__label mb-2 d-flex justify-content-between">
                    <label for="option9" class="h3">Integrated PRM</label>
                    <input type="checkbox" id="option9" name="options[]" value="intPRM" class="form-check" <?php echo in_array('intPRM', $options) ? 'checked' : 'not'; ?>>
                </div>
                <div class="ratio ratio-16x9 mb-2">
                    <iframe id="youtube-player" width="640" height="360"
                        src="https://www.youtube.com/embed/udwvN6gVAdE"
                        title="IntPRM"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="tiny">Elevate your pharmacy's services by connecting with leading platforms like HealNow and UGO through RxMile. Our seamless integration with these partners enables pharmacies to offer additional services and discounts to patients, creating a valuable network that enhances patient satisfaction and builds loyalty.</div>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <button type="button" id="back-to-step1" class="button-secondary">Back to Step 1</button>
        <button type="button" class="select-all button-secondary">Select All</button>
        <button id="next" type="submit" class="button-primary">Next</button>
    </div>

</form>