<?php
/**
 * Payment form template.
 *
 * Created by Joseph Daigle.
 * Date: 4/2/18
 * Time: 9:20 PM
 */
?>

<div class="container-fluid">

    <div class="alert alert-primary row" role="alert">
        This is a primary alert—check it out!
    </div>

    <form name="edp-donation" action="" method="POST">

        <div class="row">
            <?php include_once plugin_dir_path(__FILE__ ) . 'interactive-credit-card.php'; ?>
        </div>

        <div class="card-inputs">

            <div class="form-group row">
                <label for="card-number" class="sr-only">Card Number</label>
                <input type="tel" class="form-control" name="card-number" placeholder="Card Number" autocomplete="cc-number" />
            </div>

            <div class="form-group row">
                <label for="cardholder-name" class="sr-only">Card Number</label>
                <input type="text" class="form-control" name="cardholder-name" placeholder="Cardholder Name"/>
            </div>

            <div class="form-group row">
                <div class="input-group">
                    <label for="card-expiration" class="sr-only">Card Expiration Date</label>
                    <input type="number" class="form-control" name="card-expiration" placeholder="MM / YY"/>

                    <label for="card-cvv" class="sr-only">Card Security Code</label>
                    <input type="number" class="form-control" name="card-cvv" placeholder="CVV"/>
                </div>
            </div>

            <div class="form-group row">
                <input type="submit" class="btn btn-default col-12" value="Donate" name="submit" />
            </div>

        </div>

    </form>

</div>

