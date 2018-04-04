/**
 * Created by joe on 4/3/18.
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
        expiry: '**/****',
        cvc: '***'
    },
    debug: true
});