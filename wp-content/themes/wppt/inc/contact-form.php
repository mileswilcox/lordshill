<?php

	$multiFormName = 'contact-form';

	require '/var/www/shared/formincludes/signupFormHeader.php';
	$fh = $multiForms[$multiFormName];

	$siteId = PM::get_option( 'site', 'id' );

	$forenameRequired = true;
	$surnameRequired = false;
	$companyRequired = false;
	$dobRequired = true;
	$dobYearRequired = false;
	$emailRequired = false;
	$phoneRequired = false;
	$addressRequired = false;   // Set to 'postcode' (with quotes) to just make postcode required
	$additionalInfoRequired = false;
	$cvRequired = false;
	$commentsRequired = false;
	$reservationDateRequired = false;
	$reservationYearRequired = false;
	$reservationDepartureRequired = false;
	$reservationTimeRequired = false;
	$reservationGuestsRequired = false;

	$mailingListRequired = false;

	$sendEmail = true;

	$email->setSubject(PM::get_option( 'site', 'name' ));

	$email->setFromEmail(PM::get_option( 'site', 'email' ));
	$email->setFromName('Contact from '.PM::get_option( 'site', 'name' ));

	$email->addRecipient(PM::get_option( 'site', 'email' ));

	$addToDatabase = false;

	$sendWelcomeMailer = false;

	$group1 = false;
	$group2 = false;
	$group3 = false;
	$group4 = false;
	$group5 = false;

	//$listIDs[] = 0000;
	//$listIDs[] = 0000;

	// $fh->addField(new FormFieldText('example', $exampleRequired));

	/* Leave this line as is */

	require '/var/www/shared/formincludes/signupFormFooter.php';

?>

<div id="<?= $multiFormName; ?>-wrapper">

	<? // Success Text  ?>
	<? if ($fh->showSuccessText): ?>

		<p class="successText">Thank you.<br />We will be in touch soon.</p>

	<? endif; ?>

	<? // To be displayed at page load ?>
	<? if ($fh->showForm): ?>

		<? // To be displayed if the repsonse comes back with errors ?>
		<? if ($fh->showErrorText): ?>

			<p class="errorText">You have not filled in all required fields correctly, please check the form and try again.</p>

		<? else: ?>

			<p class="welcomeText">Enter your name and email address below to hear the latest news from us.</p>

		<? endif; ?>

		<form action="" method="post" enctype="multipart/form-data" id="<?= $multiFormName; ?>" classs="form  <?= $fh->showErrorText ? 'form--error' : ''?>">

			<div class="form__field<?php if ($fh->fields['forename']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-forename">First Name</label>
				<input type="text" name="forename" id="<?= $multiFormName ?>-forename" value="<?php echo $fh->fields['forename']->value ?>" <?= $forenameRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['surname']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-surname">Surname</label>
				<input type="text" name="surname" id="<?= $multiFormName ?>-surname" value="<?php echo $fh->fields['surname']->value ?>" <?= $surnameRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['company']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-company">Company</label>
				<input type="text" name="company" id="<?= $multiFormName ?>-company" value="<?php echo $fh->fields['company']->value ?>" <?= $companyRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['email']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-email">E-Mail</label>
				<input type="email" name="email" id="<?= $multiFormName ?>-email" value="<?php echo $fh->fields['email']->value ?>" <?= $emailRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['phone']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-phone">Phone</label>
				<input type="tel" name="phone" id="<?= $multiFormName ?>-phone" value="<?php echo $fh->fields['phone']->value ?>" <?= $phoneRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['address']->fields['address1']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-address-address1">Address 1</label>
				<input type="text" name="address-address1" id="<?= $multiFormName ?>-address-address1" value="<?php echo $fh->fields['address']->fields['address1']->value ?>" <?= $addressRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['address']->fields['address2']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-address-address1">Address 2</label>
				<input type="text" name="address-address2" id="<?= $multiFormName ?>-address-address2" value="<?php echo $fh->fields['address']->fields['address2']->value ?>" />
			</div>

			<div class="form__field<?php if ($fh->fields['address']->fields['town']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-address-town">Town/City</label>
				<input type="text" name="address-town" id="<?= $multiFormName ?>-address-town" value="<?php echo $fh->fields['address']->fields['town']->value ?>" <?= $addressRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['address']->fields['county']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-address-county">County</label>
				<input type="text" name="address-county" id="<?= $multiFormName ?>-address-county" value="<?php echo $fh->fields['address']->fields['county']->value ?>" />
			</div>

			<div class="form__field<?php if ($fh->fields['address']->fields['postcode']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-address-postcode">Postcode</label>
				<input type="text" name="address-postcode" id="<?= $multiFormName ?>-address-postcode" value="<?php echo $fh->fields['address']->fields['postcode']->value ?>" <?= $addressRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['address']->fields['country']->isError) { ?>error<? } ?>">
				<label for="<?= $multiFormName ?>-address-country">Country</label>
				<input type="text" name="address-country" id="<?= $multiFormName ?>-address-country" value="<?php echo $fh->fields['address']->fields['country']->value ?>" />
			</div>

			<div class="form__field<?php if ($fh->fields['additional-info']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-additional-info">Additional Info</label>
				<input type="text" name="additional-info" id="<?= $multiFormName ?>-additional-info" value="<?php echo $fh->fields['additional-info']->value ?>" <?= $additionalInfoRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['comments']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-comments">Comments</label>
				<textarea name="comments" cols="" rows="5" id="<?= $multiFormName ?>-comments" <?= $commentsRequired ? 'required' : ''; ?>><?php echo $fh->fields['comments']->value ?></textarea>
			</div>

			<div class="form__field<?php if (@$fh->fields['mailing-list']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-mailinglist">Join Mailing List?</label>
				<input name="mailing-list" id="<?= $multiFormName ?>-mailinglist" type="checkbox" value=""<?php echo @$fh->fields['mailing-list']->checked ? 'checked="checked" ' : '' ?> />
			</div>

			<div style="display:none !important;">
				<textarea name="textboxfilter" rows="" cols=""></textarea>
				<input type="hidden" name="multiFormName" value="<?= $multiFormName ?>" />
			</div>

			<input type="submit" name="submitted" value="Send" class="submit" />

		</form>

	<? endif; ?>

</div>