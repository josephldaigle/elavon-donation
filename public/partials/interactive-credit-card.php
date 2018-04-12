<?php
/**
 * Created by Joseph Daigle.
 * Date: 4/7/18
 * Time: 9:05 PM
 */

?>

<div class="card-wrap">

    <!-- CARD FRONT -->
	<div class="card-front">
        <img id="card-front-bg" src="<?php print(plugin_dir_url( dirname( dirname( __FILE__ ) ) ) . 'img/beach-with-chairs-and-palm-trees.png'); ?>" alt="tropical beach overlooking ocean" />
        <div class="card-smartchip"><img id="card-smartchip-img" src="<?php print(plugin_dir_url(dirname( dirname( __FILE__) ) ). 'img/credit-card-smart-chip.png'); ?>" alt="credit card smartchip" /></div>
        <div class="card-logo hidden"></div>
        <div class="card-number"><div class="card-number-placeholder" >**** **** **** ****</div></div>
        <div class="cardholder-name"><div class="cardholder-name-placeholder" >JOHN M DOE</div></div>
        <div class="card-expiry"><div class="card-expiry-placeholder" >MM / YY</div></div>
	</div>

    <!-- CARD BACK -->
	<div class="card-back"></div>

</div>