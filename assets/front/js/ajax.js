jQuery(function($){

    $(document).ready(function () {

        //product adding ajax request
        $(document).on('click', '.cbs-single-room', function(){
            let productId = $(this).attr('product-id');
            
            //ajax request
            $.post(CBS_ajax.url, {
                action: 'cbs_add_product_into_cart',
                _nonce: CBS_ajax.nonce,
                productId: productId,
            }, function(response) {
                if(response.success) {
                    // $(this).addClass('habib');
                    console.log( "product added success" );
                }
            });
        });
    });
});

jQuery(document).ready(function ($) {
    // Wait for the checkout page to load
    if ($('body').is('.woocommerce-checkout')) {

        // Replace 'billing_' with 'shipping_' if you want to fill shipping address
        var billingAddress = {
            'billing_first_name': 'John',
            'billing_last_name': 'Doe',
            'billing_address_1': '123 Main St',
            'billing_city': 'Dhaka',
            'billing_state': 'BD-13',
            'billing_postcode': '1340',
            'billing_country': 'BD',
            'billing_email': 'john@example.com',
            'billing_phone': '555-555-5555'
        };

        // Loop through billingAddress object and fill in the form fields
        $.each(billingAddress, function (key, value) {
            $('#' + key).val(value);
        });
    }
});