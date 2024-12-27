<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="row pb-5 gy-5">
    <div class="col-md-7 form-column">
        <h1 class="mb-3"><?= $config['step3']['title'] ?></h1>
        <div class="intro-text mb-5">
            <?= $config['step3']['intro'] ?>
        </div>
        <h2 class="boxed mb-5">Payment Details</h2>
        <h3>Card Details</h3>
        <form id="payment-form" class="checkout-container mb-4">
            <div class="form-group mb-3">
                <label for="cardholder-name" class="form-label">Cardholder Name</label>
                <input type="text" id="cardholder-name" name="cardholder_name" class="form-control" required>
            </div>
            <div class="input-group mb-3 card-input">
                <label for="card-number" class="form-label">Card Number</label>
                <div class="input-group">
                    <input type="text" id="card-number" name="card_number" class="form-control" placeholder="1234 5678 9012 3456" required>
                    <span class="input-group-text bg-white border-left-0" id="card-logo-wrapper">
                        <img id="card-logo" src="" alt="Card Logo" style="display: none; width: 24px;">
                    </span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="form-group col-md-6 mb-3">
                    <label for="card-expiry" class="form-label">Expiry Date</label>
                    <input type="text" id="card-expiry" name="card_expiry" class="form-control" required placeholder="MM/YY">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="card-cvc" class="form-label">CVC</label>
                    <input type="text" id="card-cvc" name="card_cvc" class="form-control" required placeholder="123">
                </div>
            </div>
            <h3>Billing Address</h3>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="same-as-company">
                <label class="form-check-label" for="same-as-company">Same as company address</label>
            </div>
            <div class="mb-3">
                <label for="billingAddressLine1" class="form-label">Address 1</label>
                <input type="text" class="form-control" name="billingAddressLine1" id="billingAddressLine1" required>
            </div>
            <div class="mb-3">
                <label for="billingAddressLine2" class="form-label">Address 2</label>
                <input type="text" class="form-control" name="billingAddressLine2" id="billingAddressLine2">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="billingCity" class="form-label">City</label>
                        <input type="text" class="form-control" name="billingCity" id="billingCity" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="billingState" class="form-label">State</label>
                        <select id="billingState" name="billingState" required class="form-select">
                            <option value="" disabled selected>Select your state</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                        <input type="hidden" id="billingStateHidden" name="billingStateHidden">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="billingZip" class="form-label">ZIP</label>
                        <input type="text" class="form-control" id="billingZip" name="billingZip" pattern="\d{5}(-\d{4})?" maxlength="10" required placeholder="12345 or 12345-6789" aria-describedby="billingZipHelp">
                        <span class="note" id="billingZipHelp">Format: 5 digits or 5+4 digits (e.g., 12345 or 12345-6789)</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="billingCountry" class="form-label">Country</label>
                        <input type="text" value="Unites States of America" readonly class="form-control" id="billingCountry" name="billingCountry">
                    </div>
                </div>
            </div>

            <input type="hidden" id="company-address-line1-value" value="<?php echo $_SESSION['form_data']['company_address_line1']; ?>">
            <input type="hidden" id="company-address-line2-value" value="<?php echo $_SESSION['form_data']['company_address_line2']; ?>">
            <input type="hidden" id="company-city-value" value="<?php echo $_SESSION['form_data']['company_city']; ?>">
            <input type="hidden" id="company-state-value" value="<?php echo $_SESSION['form_data']['company_state']; ?>">
            <input type="hidden" id="company-zip-value" value="<?php echo $_SESSION['form_data']['company_zip']; ?>">
            <input type="hidden" id="company-country-value" value="<?php echo $_SESSION['form_data']['company_country']; ?>">

            <button type="button" id="back-to-step2" class="button-secondary">Back to Step 2</button>
            <button type="button" id="payment-submit" class="button-primary">Submit Payment</button>
        </form>


    </div>
    <div class="col-md-5 ps-md-5">
        <h2 class="filled mb-5"><?= $config['step3']['sidebar_title'] ?></h2>
        <table class="mb-4">
            <?php
            // Read the CSV file
            $file = fopen('pricingdata', 'r');

            // Read and output the CSV data
            $firstRow = true;
            while (($data = fgetcsv($file)) !== FALSE) {
                echo '<tr>';
                foreach ($data as $index => $cell) {
                    if ($firstRow) {
                        // Output header row with <th>
                        echo '<th class="text-center">' . htmlspecialchars($cell) . '</th>';
                    } else {
                        // Output data rows with <td>
                        if ($index == 2) {
                            echo '<td class="text-end">' . htmlspecialchars($cell) . '</td>';
                        } else {
                            echo '<td class="text-center">' . htmlspecialchars($cell) . '</td>';
                        }
                    }
                }
                echo '</tr>';
                $firstRow = false;
            }


            // Close the file
            fclose($file);
            ?>
        </table>
        <div class="boxed mb-4">
            <h3><?= $config['step3']['sidebar_features'] ?></h3>
            <ul>
                <?php
                foreach ($config['step3']['sidebar_list'] as $l) {
                ?>
                    <li><?= $l ?></li>
                <?php
                }
                ?>
            </ul>
        </div>

        <div class="boxed--red">
            <?= $config['step3']['sidebar_footer'] ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/imask"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Format card number with space between every four digits
        var cardNumberInput = document.getElementById("card-number");
        IMask(cardNumberInput, {
            mask: '0000 0000 0000 0000'
        });

        // Format expiry date as MM/YY
        var cardExpiryInput = document.getElementById("card-expiry");
        IMask(cardExpiryInput, {
            mask: '00/00'
        });
    });
</script>