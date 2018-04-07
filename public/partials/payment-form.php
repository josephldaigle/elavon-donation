<?php
/**
 * Payment form template.
 *
 * Created by Joseph Daigle.
 * Date: 4/2/18
 * Time: 9:20 PM
 */
?>

    <div class="alert alert-primary" role="alert">
        This is a primary alert—check it out!
    </div>

    <div class="container-fluid">
        <div class="row">&nbsp;</div>

        <form name="edp-donation" action="" method="POST">

            <div class="row">

                <div id="<?php print($atts['id']); ?>" class="card-wrapper"></div><!-- card image container -->
            </div>


            <div class="form-group row">
                    <input type="text" class="form-control" name="number" placeholder="Card number" autocomplete="cc-number" inputmode="numeric"/>
                    <small id="numberHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group row">
                    <input type="text" class="form-control" name="name" placeholder="Cardholder name"/>
            </div>

            <div class="form-group row">
                <div class="">
                    <input type="text" class="form-control" name="expiry" placeholder="MM / YY"/>
                </div>
            </div>

            <div class="form-group row">
                <div class="">
                    <input type="text" class="form-control" name="cvc" placeholder="CVC"/>
                </div>
            </div>

            <div class="form-group row">
                <div class="">
                    <input type="submit" value="Donate" name="submit" />
                </div>
            </div>

        </form>

    </div>

