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
    <div class="alert alert-primary" role="alert">
        This is a primary alert—check it out!
    </div>
    <div class="card-wrapper"></div>

    <div class="form-group">
        <input type="text" name="number" placeholder="Card number"/>
        <small id="numberHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <input type="text" name="name" placeholder="Cardholder name"/>
    <input type="text" name="expiry" placeholder="MM / YY"/>
    <input type="text" name="cvc" placeholder="CVC"/>

    <input type="submit" value="Donate" name="submit" />
</form>