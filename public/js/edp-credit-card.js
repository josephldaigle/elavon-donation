/**
 * Created by Joe Daigle on 4/3/18.
 */

jQuery('form[name="edp-donation"]').card({
    container: '.card-wrapper', // *required*
    formSelectors: {
        numberInput: 'input[name="number"]', // optional — default input[name="number"]
        expiryInput: 'input[name="expiry"]', // optional — default input[name="expiry"]
        cvcInput: 'input[name="cvc"]', // optional — default input[name="cvc"]
        nameInput: 'input[name="name"]' // optional - defaults input[name="name"]
    },
    placeholders: {
        number: '**** **** **** ****',
        name: 'Fred L Thompson',
        expiry: '**/**',
        cvc: '***'
    },
    messages: {
        monthYear: ''
    },
    debug: true
});




/**
 * Add styles to credit card form.
 * @type {Element}
 */


// var edp_js_style_script = document.createElement('script');
// edp_js_style_script.setAttribute('src', window.location.href + );
// document.head.appendChild(edp_js_style_script);