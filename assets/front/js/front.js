jQuery(function($){

    $(document).ready(function () {

        console.log( CBS_ajax );
        
        //toggle room
        function cbs_room_toggle() {
            $(".cbs-room").hide();
            $('.cbs-hour p').on('click', function () {
                $(this).next('.cbs-room').slideToggle();
            });
        }
        cbs_room_toggle();

        //calender ajax
        $('#calendar').datepicker({
            inline:true,
            firstDay: 1,
            showOtherMonths:true,
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            dateFormat: 'yymmdd',
            minDate: new Date(CBS_ajax.user_start), maxDate: new Date(CBS_ajax.user_end),
            onSelect: function(date) {

                //ajax request
                $.post(CBS_ajax.url, {
                    action: 'cbs_get_posts_by_date',
                    _nonce: CBS_ajax.nonce,
                    cbs_date: date,
                }, function(response) {

                    if(response) {
                        $('.hour-picker').empty().append(response);
                        cbs_room_toggle();
                    }
                });
            }
        });
    });
});

//Remove cart product form button ajax
jQuery(function($){
    $(document).ready(function () {
        $('.cbs-btn').on('click', function(){
            
            let productId = $(this).attr('id');

            $.post(CBS_ajax.url, {
                action: 'cbs_remove_product_from_cart',
                _nonce: CBS_ajax.nonce,
                product_ID_r: productId,
            }, function(response) {

                if(response.success) {
                    $('#'+productId).closest('.cbs-single-slot').hide();

                    //append all price
                    $('.cbs-subtotal-cost').empty().append(response.data.subtotal);
                    $('.cbs-total-cost').empty().append(response.data.total);
                    
                }
            });
        });
    });
});

//Apply coupon code
jQuery(function($){
    $(document).ready(function () {
        
        $('#cbs-apply-copuon-apply').on( 'click', function(){
            let copouonCode = $('#cbs-apply-copuon').val();
            

            $.post(CBS_ajax.url, {
                action: 'cbs_apply_oupon_code',
                _nonce: CBS_ajax.nonce,
                copouon_code: copouonCode,
            }, function(response) {
                if(response.success){
                    console.log(response.data.amount);
                    $('.cbs-co-message').append(response.data.message);
                    if(response.data.amount){
                        $('.cbs-discount-price').append(response.data.amount);
                    }
                }
                // console.log(response);
            });

        });
    });
});