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

    <div class="card-wrapper"></div>

    <input type="text" name="number" placeholder="Card number"/>
    <input type="text" name="name" placeholder="Cardholder name"/>
    <input type="text" name="expiry" placeholder="MM / YY"/>
    <input type="text" name="cvc" placeholder="CVC"/>

    <input type="submit" value="Donate" name="submit" />
</form>