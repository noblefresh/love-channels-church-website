$(document).ready(function(){
	$('.addCartBtn').click(function(){
		let product_id = $(this).data('product_id');
		let cart_count = $('.cart_count');
		let cart_price = $('.cart_price');
		// alert(product_id);
		$.get('/add_product_to_cart/'+product_id)
		.then(function(response){
			if (response.status == 1) {
				cart_count.text(response.count);
				cart_price.text(response.cart_total_price);
				alert("Item added to cart.");
			} else {
				alert("Item already added to cart");
			}
		})
	});

     // FLUTTERWAVE PAYMENT METHOD
    // Order Checkout
    $('.checkOut').on('click',function(){

        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let address = $('#address').val();
        var amount = $('#amount').val();
        // let amt = parseFloat(amount);
        // alert(amount);
        let orderid = $('#orderid').val();
        let transid = $('#transid').val();

        if(name == '' || email == '' || phone == '' || address == ''){
            swal({
                title: "Error",
                text: "Please complete your Checkout Information",
                icon: "error",
            });
        }else{
            //processing code
            makePayment();
            function makePayment() {


                FlutterwaveCheckout({
                    public_key: "FLWPUBK_TEST-d8853583d2114cb919fd0321a4d1dcb6-X",
                    tx_ref: "ay_" + Math.floor((Math.random() * 1000000000) + 1),
                    amount: parseInt(amount) * 1000,
                    currency: "NGN",
                    customer: {
                        email: email,
                        phonenumber: phone,
                        name: name
                    },
                    callback: function (data) {
                        console.log(data.status);
                        if (data.status == 'successful') {
                            // saving order
                            $.ajax({
                                type:'get',
                                url:'/saveOrder',
                                data:{email:email, phone:phone, name:name, address:address, amount:amount},
                                dataType:'json',
                                success: function(res){
                                    if(res.status == 'success'){
                                        window.location.href = '/products/thankyou';

                                    }
                                    // console.log('outside', res);
                                },
                                error: function(e,r,error){
                                    swal({
                                        title: "Error",
                                        text: "An Unexpected error occured! Kindly contact our support team",
                                        icon: "error",
                                    });
                                }
                            });

                        } else {
                            swal({
                                title: "Error",
                                text: "An Unexpected error occured! Kindly contact our support team",
                                icon: "error",
                            });
                        }
                    },
                    customizations: {
                        "title": "Wonderful Direct pharmacy",
                        "description": "payment integration",
                        "logo": "https://image.flaticon.com/icons/png/512/809/809957.png"
                    }
                });
            }

            // payWithRave() // TRIGGER PAYWITHRAVE TO POP-UP

            // function payWithRave() {

            //     var x = getpaidSetup({
            //         // FLWPUBK-ff9268493fa87b738ca4da04acb65589-X
            //         PBFPubKey: 'FLWPUBK_TEST-d8853583d2114cb919fd0321a4d1dcb6-X',
            //         customer_email: email,
            //         amount: parseFloat(amount) * 1000,
            //         customer_phone: phone,
            //         currency: "NGN",
            //         txref: transid,
            //         meta: [{
            //             metaname: "flightID",
            //             metavalue: "AP1234"
            //         }],
            //         onclose: function() {
            //             $('#msg').html('');
            //         },
            //         callback: function(response) {
            //             const txref = response.txRef; // collect txRef returned and pass to a                  server page to complete status check.
            //             console.log("This is the response returned after a charge", response);
            //             if (
            //                 response.tx.chargeResponseCode == "00" ||
            //                 response.tx.chargeResponseCode == "0"
            //             ) {
            //                 // saving order
            //                 $.ajax({
            //                     type:'get',
            //                     url:'/saveOrder',
            //                     data:{email:email, phone:phone, name:name, address:address, amount:amount},
            //                     dataType:'json',
            //                     beforeSend: function(){
            //                         toggleModal('modal-id');
            //                     },
            //                     success: function(res){
            //                         if(res.status == 'success'){
            //                             swal({
            //                                 title: "Bravos",
            //                                 text: res.message,
            //                                 icon: "success",
            //                             });
            //                             window.location.href = res.url;
            //                         }
            //                         // console.log('outside', res);
            //                     },
            //                     error: function(e,r,error){
            //                         swal({
            //                             title: "Error",
            //                             text: "An Unexpected error occured! Kindly contact our support team",
            //                             icon: "error",
            //                         });
            //                     }
            //                 });

            //             } else {
            //                 swal({
            //                     title: "Error",
            //                     text: "An Unexpected error occured! Kindly contact our support team",
            //                     icon: "error",
            //                 });
            //             }

            //             x.close(); // use this to close the modal immediately after payment.
            //         }
            //     });
            // }
        }
    });
});
