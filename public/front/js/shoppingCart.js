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
});