<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$sessionData = $_SESSION['form_data'] ?? [];
?>
<div class="row pb-5">
    <div class="col-md-8 form-column pe-md-5">
        <h1 class="mb-3"><?= get_field('step1_title') ?></h1>
        <div class="intro-text mb-5"><?= get_field('step1_intro') ?></div>
        <h2 class="boxed mb-5">Registration Form</h2>

        <form id="step1form" method="post" novalidate>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= htmlspecialchars($sessionData['first_name'] ?? '') ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?= htmlspecialchars($sessionData['last_name'] ?? '') ?>" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="companyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" name="companyName" id="companyName" value="<?= htmlspecialchars($sessionData['company_name'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="npiNumber" class="form-label">NPI Number</label>
                <input type="text" class="form-control" name="npiNumber" id="npiNumber" value="<?= htmlspecialchars($sessionData['npi_number'] ?? '') ?>" minlength="10" maxlength="10" required pattern="\d{10}" placeholder="10-digit NPI number">
            </div>
            <div class="mb-3">
                <label for="contactEmail" class="form-label">Contact Email</label>
                <input type="email" class="form-control" name="contactEmail" id="contactEmail" value="<?= htmlspecialchars($sessionData['contact_email'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="companyAddressLine1" class="form-label">Address 1</label>
                <input type="text" class="form-control" name="companyAddressLine1" id="companyAddressLine1" value="<?= htmlspecialchars($sessionData['company_address_line1'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label for="companyAddressLine2" class="form-label">Address 2</label>
                <input type="text" class="form-control" name="companyAddressLine2" id="companyAddressLine2" value="<?= htmlspecialchars($sessionData['company_address_line2'] ?? '') ?>">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="companyCity" class="form-label">City</label>
                        <input type="text" class="form-control" name="companyCity" id="companyCity" value="<?= htmlspecialchars($sessionData['company_city'] ?? '') ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="companyState" class="form-label">State</label>
                        <select id="companyState" name="companyState" required class="form-select">
                            <option value="" disabled <?= empty($sessionData['company_state']) ? 'selected' : '' ?>>Select your state</option>
                            <option value="AL" <?= ($sessionData['company_state'] ?? '') === 'AL' ? 'selected' : '' ?>>Alabama</option>
                            <option value="AK" <?= ($sessionData['company_state'] ?? '') === 'AK' ? 'selected' : '' ?>>Alaska</option>
                            <option value="AZ" <?= ($sessionData['company_state'] ?? '') === 'AZ' ? 'selected' : '' ?>>Arizona</option>
                            <option value="AR" <?= ($sessionData['company_state'] ?? '') === 'AR' ? 'selected' : '' ?>>Arkansas</option>
                            <option value="CA" <?= ($sessionData['company_state'] ?? '') === 'CA' ? 'selected' : '' ?>>California</option>
                            <option value="CO" <?= ($sessionData['company_state'] ?? '') === 'CO' ? 'selected' : '' ?>>Colorado</option>
                            <option value="CT" <?= ($sessionData['company_state'] ?? '') === 'CT' ? 'selected' : '' ?>>Connecticut</option>
                            <option value="DE" <?= ($sessionData['company_state'] ?? '') === 'DE' ? 'selected' : '' ?>>Delaware</option>
                            <option value="FL" <?= ($sessionData['company_state'] ?? '') === 'FL' ? 'selected' : '' ?>>Florida</option>
                            <option value="GA" <?= ($sessionData['company_state'] ?? '') === 'GA' ? 'selected' : '' ?>>Georgia</option>
                            <option value="HI" <?= ($sessionData['company_state'] ?? '') === 'HI' ? 'selected' : '' ?>>Hawaii</option>
                            <option value="ID" <?= ($sessionData['company_state'] ?? '') === 'ID' ? 'selected' : '' ?>>Idaho</option>
                            <option value="IL" <?= ($sessionData['company_state'] ?? '') === 'IL' ? 'selected' : '' ?>>Illinois</option>
                            <option value="IN" <?= ($sessionData['company_state'] ?? '') === 'IN' ? 'selected' : '' ?>>Indiana</option>
                            <option value="IA" <?= ($sessionData['company_state'] ?? '') === 'IA' ? 'selected' : '' ?>>Iowa</option>
                            <option value="KS" <?= ($sessionData['company_state'] ?? '') === 'KS' ? 'selected' : '' ?>>Kansas</option>
                            <option value="KY" <?= ($sessionData['company_state'] ?? '') === 'KY' ? 'selected' : '' ?>>Kentucky</option>
                            <option value="LA" <?= ($sessionData['company_state'] ?? '') === 'LA' ? 'selected' : '' ?>>Louisiana</option>
                            <option value="ME" <?= ($sessionData['company_state'] ?? '') === 'ME' ? 'selected' : '' ?>>Maine</option>
                            <option value="MD" <?= ($sessionData['company_state'] ?? '') === 'MD' ? 'selected' : '' ?>>Maryland</option>
                            <option value="MA" <?= ($sessionData['company_state'] ?? '') === 'MA' ? 'selected' : '' ?>>Massachusetts</option>
                            <option value="MI" <?= ($sessionData['company_state'] ?? '') === 'MI' ? 'selected' : '' ?>>Michigan</option>
                            <option value="MN" <?= ($sessionData['company_state'] ?? '') === 'MN' ? 'selected' : '' ?>>Minnesota</option>
                            <option value="MS" <?= ($sessionData['company_state'] ?? '') === 'MS' ? 'selected' : '' ?>>Mississippi</option>
                            <option value="MO" <?= ($sessionData['company_state'] ?? '') === 'MO' ? 'selected' : '' ?>>Missouri</option>
                            <option value="MT" <?= ($sessionData['company_state'] ?? '') === 'MT' ? 'selected' : '' ?>>Montana</option>
                            <option value="NE" <?= ($sessionData['company_state'] ?? '') === 'NE' ? 'selected' : '' ?>>Nebraska</option>
                            <option value="NV" <?= ($sessionData['company_state'] ?? '') === 'NV' ? 'selected' : '' ?>>Nevada</option>
                            <option value="NH" <?= ($sessionData['company_state'] ?? '') === 'NH' ? 'selected' : '' ?>>New Hampshire</option>
                            <option value="NJ" <?= ($sessionData['company_state'] ?? '') === 'NJ' ? 'selected' : '' ?>>New Jersey</option>
                            <option value="NM" <?= ($sessionData['company_state'] ?? '') === 'NM' ? 'selected' : '' ?>>New Mexico</option>
                            <option value="NY" <?= ($sessionData['company_state'] ?? '') === 'NY' ? 'selected' : '' ?>>New York</option>
                            <option value="NC" <?= ($sessionData['company_state'] ?? '') === 'NC' ? 'selected' : '' ?>>North Carolina</option>
                            <option value="ND" <?= ($sessionData['company_state'] ?? '') === 'ND' ? 'selected' : '' ?>>North Dakota</option>
                            <option value="OH" <?= ($sessionData['company_state'] ?? '') === 'OH' ? 'selected' : '' ?>>Ohio</option>
                            <option value="OK" <?= ($sessionData['company_state'] ?? '') === 'OK' ? 'selected' : '' ?>>Oklahoma</option>
                            <option value="OR" <?= ($sessionData['company_state'] ?? '') === 'OR' ? 'selected' : '' ?>>Oregon</option>
                            <option value="PA" <?= ($sessionData['company_state'] ?? '') === 'PA' ? 'selected' : '' ?>>Pennsylvania</option>
                            <option value="RI" <?= ($sessionData['company_state'] ?? '') === 'RI' ? 'selected' : '' ?>>Rhode Island</option>
                            <option value="SC" <?= ($sessionData['company_state'] ?? '') === 'SC' ? 'selected' : '' ?>>South Carolina</option>
                            <option value="SD" <?= ($sessionData['company_state'] ?? '') === 'SD' ? 'selected' : '' ?>>South Dakota</option>
                            <option value="TN" <?= ($sessionData['company_state'] ?? '') === 'TN' ? 'selected' : '' ?>>Tennessee</option>
                            <option value="TX" <?= ($sessionData['company_state'] ?? '') === 'TX' ? 'selected' : '' ?>>Texas</option>
                            <option value="UT" <?= ($sessionData['company_state'] ?? '') === 'UT' ? 'selected' : '' ?>>Utah</option>
                            <option value="VT" <?= ($sessionData['company_state'] ?? '') === 'VT' ? 'selected' : '' ?>>Vermont</option>
                            <option value="VA" <?= ($sessionData['company_state'] ?? '') === 'VA' ? 'selected' : '' ?>>Virginia</option>
                            <option value="WA" <?= ($sessionData['company_state'] ?? '') === 'WA' ? 'selected' : '' ?>>Washington</option>
                            <option value="WV" <?= ($sessionData['company_state'] ?? '') === 'WV' ? 'selected' : '' ?>>West Virginia</option>
                            <option value="WI" <?= ($sessionData['company_state'] ?? '') === 'WI' ? 'selected' : '' ?>>Wisconsin</option>
                            <option value="WY" <?= ($sessionData['company_state'] ?? '') === 'WY' ? 'selected' : '' ?>>Wyoming</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="companyZip" class="form-label">ZIP</label>
                        <input type="text" class="form-control" id="companyZip" name="companyZip" value="<?= htmlspecialchars($sessionData['company_zip'] ?? '') ?>" pattern="\d{5}(-\d{4})?" maxlength="10" required placeholder="12345 or 12345-6789" aria-describedby="companyZipHelp">
                        <span class="note" id="companyZipHelp">Format: 5 digits or 5+4 digits (e.g., 12345 or 12345-6789)</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="companyCountry" class="form-label">Country</label>
                        <input type="text" value="United States of America" readonly class="form-control" id="companyCountry" name="companyCountry" value="<?= htmlspecialchars($sessionData['company_country'] ?? '') ?>">
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <label for="preference" class="form-label">Delivery Preference</label>
                <select id="preference" name="preference" class="form-select" required>
                    <option value="" disabled <?= empty($sessionData['preference']) ? 'selected' : '' ?>>Select your preference</option>
                    <option value="inhouse" <?= ($sessionData['preference'] ?? '') === 'inhouse' ? 'selected' : '' ?>>In-House</option>
                    <option value="outsourced" <?= ($sessionData['preference'] ?? '') === 'outsourced' ? 'selected' : '' ?>>Outsourced</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="pharmcount" class="form-label">How many pharmacy locations does your organization operate?</label>
                <input type="number" name="pharmcount" id="pharmcount" value="1" class="form-control" min="0" value="<?= htmlspecialchars($sessionData['pharmcount'] ?? '') ?>">
            </div>
            <button id="next" type="submit" class="button-primary">Next</button>
        </form>
    </div>
    <div class="col-md-4 ps-md-5 pt-5">
        <?php
        $hasVimeo = false;
        while (have_rows('step1_videos')) {
            the_row();
        ?>
            <h3><?= htmlspecialchars(get_sub_field('video_title')) ?></h3>
            <div class="ratio ratio-16x9 mb-5">
                <?php
                $video_title = get_sub_field('video_title');
                $video_url = get_sub_field('video_url');
                if ($video_url && strpos($video_url, 'vimeo.com') !== false) {
                    if (preg_match('/vimeo\.com\/(\d+)$/', $video_url, $matches)) {
                        $vimeoId = $matches[1];
                ?>
                        <iframe src="https://player.vimeo.com/video/<?= $vimeoId ?>?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                            allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                            title="<?= htmlspecialchars($video_title) ?>"></iframe>
                    <?php
                        $hasVimeo = true;
                    }
                } else { // assume youtube
                    ?>
                    <iframe src="<?= htmlspecialchars($video_url) ?>"
                        title="<?= htmlspecialchars($video_title) ?>"
                        allowfullscreen></iframe>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
if ($hasVimeo) {
    echo '<script src="https://player.vimeo.com/api/player.js"></script>';
}
