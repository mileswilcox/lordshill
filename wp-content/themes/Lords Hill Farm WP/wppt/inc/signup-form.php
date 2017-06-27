 <?php

	$multiFormName = 'signup-form';

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

	$addToDatabase = true;

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

	<? if ($fh->showSuccessText): ?>

		<p class="successText">Thank you.<br />We will be in touch soon.</p>

	<? endif; ?>

	<? if ($fh->showForm): ?>

		<? if ($fh->showErrorText): ?>

			<p class="errorText">You have not filled in all required fields correctly, please check the form and try again.</p>

		<? else: ?>

			<p class="welcomeText">Enter your name and email address below to hear the latest news from us.</p>

		<? endif; ?>

		<form action="" method="post" enctype="multipart/form-data" id="<?= $multiFormName; ?>" class="form  <?= $fh->showErrorText ? 'form--error' : ''?>">

			<div class="form__field<?php if ($fh->fields['forename']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-forename">First Name</label>
				<input type="text" name="forename" id="<?= $multiFormName ?>-forename" value="<?php echo $fh->fields['forename']->value ?>" <?= $forenameRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['surname']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-surname">Surname</label>
				<input type="text" name="surname" id="<?= $multiFormName ?>-surname" value="<?php echo $fh->fields['surname']->value ?>" <?= $surnameRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['dob']->isError) { ?> form__field--error<? } ?>">
				<label for="dob">Birthday</label>
				<select name="dob-day" id="dob-day" <?= $dobRequired ? 'required' : ''; ?>>
					<option value="">Day</option>
					<?php for ($i = 1; $i <= 31; $i++) { ?>
						<option value="<?php echo $i ?>"<?php echo $fh->fields['dob']->day == $i ? ' selected="selected"' : '' ?>><?php echo $i ?></option>
					<? } ?>
				</select>

				<select name="dob-month" id="dob-month" <?= $dobRequired ? 'required' : ''; ?>>
					<option value="">Month</option>
					<?php for ($i = 1; $i <= 12; $i++) { ?>
						<option value="<?php echo $i ?>"<?php echo $fh->fields['dob']->month == $i ? ' selected="selected"' : '' ?>><?php echo date('M', mktime(0, 0, 0, $i, 1)) ?></option>
					<? } ?>
				</select>

				<select name="dob-year" id="dob-year" <?= $dobYearRequired ? 'required' : ''; ?>>
					<option value="">Year</option>
					<?php for ($i = date('Y') - 102; $i <= date('Y'); $i++) { ?>
						<option value="<?php echo $i ?>"<?php echo $fh->fields['dob']->year == $i ? ' selected="selected"' : '' ?>><?php echo $i ?></option>
					<? } ?>
				</select>
			</div>

			<div class="form__field<?php if ($fh->fields['email']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-email">E-Mail</label>
				<input type="email" name="email" id="<?= $multiFormName ?>-email" value="<?php echo $fh->fields['email']->value ?>" <?= $emailRequired ? 'required' : ''; ?> />
			</div>

			<div class="form__field<?php if ($fh->fields['phone']->isError) { ?> form__field--error<? } ?>">
				<label for="<?= $multiFormName ?>-phone">Phone</label>
				<input type="tel" name="phone" id="<?= $multiFormName ?>-phone" value="<?php echo $fh->fields['phone']->value ?>" <?= $phoneRequired ? 'required' : ''; ?> />
			</div>

			<div style="display:none !important;">
				<textarea name="textboxfilter" rows="" cols=""></textarea>
				<input type="hidden" name="multiFormName" value="<?= $multiFormName ?>" />
			</div>

			<input type="submit" name="submitted" value="Send" class="submit" />

		</form>

	<? endif; ?>

</div>