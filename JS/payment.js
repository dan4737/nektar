const paymentForm = document.getElementById('paymentForm');
	paymentForm.addEventListener("submit", payWithPaystack, false);

	// PAYMENT FUNCTION
	function payWithPaystack() {

		let handler = PaystackPop.setup({
			key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
			email: document.getElementById("email-address").value,
			amount: document.getElementById("amount").value * 100,
			currency:'GHS',
			onClose: function(){
			alert('Window closed.');
			},
			callback: function(response){
			
				// send email, amount and reference to our server using AJAX
				 $.ajax({
					url: "../actions/process_payment.php", 
					type:"get",
					data:{'email':document.getElementById("email-address").value, 'amount':document.getElementById("amount").value, 'reference':response.reference},
					success: function(response){
						alert(response)
					},
					error: function(error){
						alert(error)
					}
				});

			}
		});
		handler.openIframe();
	}