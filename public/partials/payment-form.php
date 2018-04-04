<?php
/**
 * Payment form template.
 *
 * Created by Joseph Daigle.
 * Date: 4/2/18
 * Time: 9:20 PM
 */

?>

<form name="edp-donation" action="" method="POST">
	
	<div class="form-row">
		<label for="first_name" class="hide_mobile">
			<?php echo ( isset( $first_name_label ) ) ? $first_name_label : 'First name:'; ?>
        </label>
		<input type="text" id="first_name" name="first_name" value="<?php echo ( isset( $first_name ) ) ? $first_name : ''; ?>" required />
	</div>

	<div class="form-row">
		<label for="last_name" class="hide_mobile">
			<?php echo ( isset( $last_name_label ) ) ? $last_name_label : 'Last name:'; ?>
        </label>
		<input type="text" id="last_name" name="last_name" value="<?php echo ( isset( $last_name ) ) ? $last_name : ''; ?>" required />
	</div>
	
	<div class="form-row">
		<label for="card_number" class="hide_mobile">
            <?php echo ( isset( $card_number_label ) ) ? $card_number_label : 'Card number:'; ?>
        </label>
    <input type="text" id="card_number" name="card_number" value="<?php echo ( isset( $card_number ) ) ? $card_number : ''; ?>" placeholder="Card Number" required />
    </div>

	<div class="form-row">
		<label for="card_expiration" class="hide_mobile">
            <?php echo ( isset( $card_number_label ) ) ? $card_number_label : 'Card number:'; ?>
        </label>
    <input type="text" id="card_number" name="card_number" value="<?php echo ( isset( $card_number ) ) ? $card_number : ''; ?>" placeholder="Card Expiration" required />
    </div>

	<div class="form-row">
        <input type="submit" name="submit" value="<?php echo ( isset($submit_value) ) ? $submit_value : 'Donate'; ?>" />
    </div>



</form>