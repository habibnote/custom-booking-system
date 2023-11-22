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
                    console.log( "product added success" );
                }
            });
        });
    });
});