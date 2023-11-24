jQuery(function($){

    $(document).ready(function () {
        // $(".cbs-room").hide();

        //calender ajax
        $('#calendar').datepicker({
            inline:true,
            firstDay: 1,
            showOtherMonths:true,
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            dateFormat: 'yymmdd',
            minDate: new Date("2023-11-21"), maxDate: new Date("2023-11-30"),
            onSelect: function(date) {

                //ajax request
                $.post(CBS_ajax.url, {
                    action: 'cbs_get_posts_by_date',
                    _nonce: CBS_ajax.nonce,
                    cbs_date: date,
                }, function(response) {

                    if(response) {

                        $('.hour-picker').empty().append(response);
                    }
                    console.log(response);
                });
            }
        });

        //This is for hour picker
        // var maxActiveCount = 4;
        // var activeCount = 0;

        // $(".hour-picker").on( "click", ".cbs-hour", function () {
        //     var room = $(this).find('.cbs-room');
        //     //exclude disable element I mean previes booked
        //     if (!$(this).hasClass("disable")) {
        //         //if click on the same hour
        //         if($(this).attr("data") === "true") {
        //             $(this).removeClass("active");
        //             $(this).removeAttr('data');
        //             activeCount--;
        //             room.hide();
        //         }else if(activeCount < maxActiveCount){
        //             $(this).attr("data", "true");
        //             activeCount++;
        //             $(this).addClass("active");
        //             room.toggle();
        //         }
        //     }
        // });

        // $('#btn').on('click', function() {

        //     let activeChildren = $(".cbs-hour[data='true']");
        //     if (activeChildren.length > 0) {
        //         activeChildren.each(function () {
        //             let value = $(this).text();
        //             console.log(value);
        //         });
        //     }else{
        //         console.log("Please select a hour");
        //     }

        //     let date = $('#calendar').val();
        //     console.log(date);
        // });

        // if ($(".cbs-form-area").is(":visible")) {
        //     $(".cbs-selected-tab").addClass("blue");
        // }
        // $(".btn-area").on("click", function () {
        //     // Check which area is currently visible
        //     if ($(".cbs-form-area").is(":visible")) {
        //         // Hide slot area and show review area  
        //         $(".cbs-form-area").hide();
        //         $(".confirm-area").hide();
        //         $(".review-area").show();
        //         $(".cbs-selected-tab").removeClass("blue");
        //         $(".cbs-review-tab").addClass("blue");
        //         $(".prev-area button").prop('disabled', false);
        //     } else if ($(".review-area").is(":visible")) {
        //         // Hide review area and show payment area
        //         $(".review-area").hide();
        //         $(".confirm-area").hide();
        //         $(".payment-area").show();
        //         $(".cbs-review-tab").removeClass("blue");
        //         $(".cbs-payment-tab").addClass("blue");
        //         $(".prev-area button").prop('disabled', false);
        //     } else if ($(".payment-area").is(":visible")) {
        //         // Hide review area and show payment area
        //         $(".review-area").hide();
        //         $(".payment-area").hide();
        //         $(".confirm-area").show();
        //         $(".prev-area button").prop('disabled', false);
        //         $(".cbs-payment-tab").removeClass("blue");
        //         $(".cbs-confirm-tab").addClass("blue");
        //     }
        // });

        // $(".prev-area").on("click", function () {
        //     // Check which area is currently visible
        //     if ($(".review-area").is(":visible")) {
        //         // Hide slot area and show review area
        //         $(".cbs-form-area").show();
        //         $(".payment-area").hide();
        //         $(".review-area").hide();
        //         $(".confirm-area").hide();
        //         $(".cbs-selected-tab").addClass("blue");
        //         $(".cbs-review-tab").removeClass("blue");

        //     } else if ($(".payment-area").is(":visible")) {
        //         // Hide review area and show payment area
        //         $(".review-area").show();
        //         $(".cbs-form-area").hide();
        //         $(".payment-area").hide();
        //         $(".confirm-area").hide();
        //         $(".cbs-review-tab").addClass("blue");
        //         $(".cbs-payment-tab").removeClass("blue");

        //     } else if ($(".confirm-area").is(":visible")) {
        //         // Hide review area and show payment area
        //         $(".payment-area").show();
        //         $(".review-area").hide();
        //         $(".cbs-form-area").hide();
        //         $(".confirm-area").hide();
        //         $(".cbs-payment-tab").addClass("blue");
        //         $(".cbs-confirm-tab").removeClass("blue");

        //     }  else {
        //         $(".prev-area button").prop('disabled', true);
        //     }
        // });
    });
});

//review page
jQuery(function($){
    $(document).ready(function () {
        $('.cbs-btn').on('click', function(){
            
            let productId = $(this).attr('product-id');

            $.post(CBS_ajax.url, {
                action: 'cbs_remove_product_from_cart',
                _nonce: CBS_ajax.nonce,
                product_ID_r: productId,
            }, function(response) {

                if(response.success) {
                    $(this).closest('.cbs-single-slot').hide();
                }
            });
        });
    });
});