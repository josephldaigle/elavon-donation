/**
 * Created by Joe Daigle on 4/3/18.
 */


/**
 * Add card number text to credit card graphic.
 */
jQuery('form[name="edp-donation"]').find('input[name="card-number"]').on('change paste keyup select', function(e) {

    var logo = jQuery('div.card-logo');
    jQuery(logo).removeClass();
    jQuery(logo).addClass('card-logo');

    switch (jQuery(this).val().charAt(0)) {
        case '2':
            jQuery(logo).addClass('card-logo-hiper');
            break;
        case '3':
            jQuery(logo).addClass('card-logo-amex');
            break;
        case '4':
            jQuery(logo).addClass('card-logo-visa');
            break;
        case '5':
            jQuery(logo).addClass('card-logo-discover');
            break;
        case '6':
            jQuery(logo).addClass('card-logo-master');
            break;
        case '7':
            jQuery(logo).addClass('card-logo-diner');
            break;
        default:
            jQuery(logo).addClass('hidden');
            break;
    }

    // set placeholder text
    jQuery('div.card-number-placeholder').text( (jQuery(this).val() == '') ? '**** **** **** ****' : jQuery(this).val() );
    jQuery('.card-number-placeholder').fitText(1.5);

});

/**
 * Add cardholder name to credit card graphic.
 */
jQuery('form[name="edp-donation"]').find('input[name="cardholder-name"]').on('change paste keyup select', function(e){
    var nameArr = jQuery(this).val().split(' ');

    var newNameParts = [];

    for(var i = 0; i < nameArr.length; i++) {
        newNameParts.push(nameArr[i].trim());
    }
    var newName = newNameParts.join(' ');

    jQuery('div.cardholder-name-placeholder').text( (newName == '') ? 'JOHN M DOE' : newName.toUpperCase());
    jQuery('.cardholder-name-placeholder').fitText(1.8);
});


/**
 * Add expiry to credit card graphic.
 */
jQuery('form[name="edp-donation"]').find('input[name="card-expiration"]').on('change paste keyup select', function(e) {

    if (jQuery(this).val().length > 2) {
        jQuery('.card-expiry-placeholder').text(jQuery(this).val().substr(0, 2) + ' / ' + jQuery(this).val().substr(2));
    } else if (jQuery(this).val().length > 0 && jQuery(this).val().length < 3) {
        jQuery('.card-expiry-placeholder').text(jQuery(this).val());
    } else {
        jQuery('.card-expiry-placeholder').text('MM / YY')
    }

    jQuery('.card-expiry-placeholder').fitText(1.8);

});

/**
 * Add CCV to credit card graphic
 */

function maskCreditCardInputs() {
    // mask inputs
    jQuery('form[name="edp-donation"]').find('input[name="card-number"]').mask('0000 0000 0000 0000');
    jQuery('form[name="edp-donation"]').find('input[name="card-expiration"]').mask('0000');
    jQuery('form[name="edp-donation"]').find('input[name="card-cvv"]').mask('000');


    // attach unmask before form submit
    jQuery('form[name="edp-donation"]').find('input:submit').on('click', function (e) {
        jQuery('form[name="edp-donation"]').find('input[name="card-number"]').val(jQuery('form[name="edp-donation"]').find('input[name="card-number"]').cleanVal());
        jQuery('form[name="edp-donation"]').find('input[name="card-number"]').unmask();
        jQuery('form[name="edp-donation"]').find('input[name="card-expiration"]').unmask();
        jQuery('form[name="edp-donation"]').find('input[name="card-cvv"]').unmask();
    });

}

/**
 * DOC READY
 */
jQuery('document').ready(function() {
    maskCreditCardInputs();
    // textFit(jQuery('.card-number-placeholder')[0], {minFontSize:15, maxFontSize: 24});
    jQuery('.card-number-placeholder').fitText(1.5);
    jQuery('.cardholder-name-placeholder').fitText(1.8);
    jQuery('.card-expiry-placeholder').fitText(1.8);
});