jQuery(document).ready(function($){

	// Single Task

	var single_task_handler = StripeCheckout.configure({
		key: 'pk_live_AnMNthy2FA6L4PkwQ482Jci9',
		image: 'https://s3.amazonaws.com/stripe-uploads/acct_152XgNLy78ZGYAtrmerchant-icon-1416893622908-99robots-001-high-resolution-logo.jpg',
		token: function(token) {

			$('body').append('<div class="nnr-stripe-payment" style="top:0px;left:0px;right:0px;bottom:0px;position:fixed;background-color:#000000;opacity:0.5;z-index: 99;"></div><div class="nnr-stripe-payment" style="position: fixed;z-index: 99;top: 0px;left: 0px;right: 0px;bottom: 0px;text-align: center;display: inline-block;"><i class="fa fa-circle-o-notch fa-spin" style="font-size: 100px;top: 200px;position: relative;color: #ffffff;z-index: 999999;"></i><div>');

			var data = {
				'action': 'nnr_stripe_charge',
				'token_id': token.id,
				'email': token.email,
				'type': 'single-task',
				'amount': 9900,
			};
			// We can also pass the url value separately from ajaxurl for front end AJAX implementations
			$.post(nnr_stripe_data.ajaxurl, data, function(response) {

				response = jQuery.parseJSON(response);

				$('.nnr-stripe-payment').remove();

				if (response.status = 'good') {
					var win = window.open(response.url, '_self');
					win.focus();
				} else {
					alert(response.message)
				}
			});

		}
	});

	$('#single-task').on('click', function(e) {
		// Open Checkout with further options
		single_task_handler.open({
			name: '99 Robots',
			description: 'Single Task',
			zipCode: true,
			amount: 9900
		});
		e.preventDefault();
	});

	// Close Checkout on page navigation
	$(window).on('popstate', function() {
		single_task_handler.close();
	});

	// Web Robot

	var web_robot_handler = StripeCheckout.configure({
		key: 'pk_live_AnMNthy2FA6L4PkwQ482Jci9',
		image: 'https://s3.amazonaws.com/stripe-uploads/acct_152XgNLy78ZGYAtrmerchant-icon-1416893622908-99robots-001-high-resolution-logo.jpg',
		token: function(token) {

			$('body').append('<div class="nnr-stripe-payment" style="top:0px;left:0px;right:0px;bottom:0px;position:fixed;background-color:#000000;opacity:0.5;z-index: 99;"></div><div class="nnr-stripe-payment" style="position: fixed;z-index: 99;top: 0px;left: 0px;right: 0px;bottom: 0px;text-align: center;display: inline-block;"><i class="fa fa-circle-o-notch fa-spin" style="font-size: 100px;top: 200px;position: relative;color: #ffffff;z-index: 999999;"></i><div>');

			var data = {
				'action': 'nnr_stripe_charge',
				'token_id': token.id,
				'email': token.email,
				'type': 'subscription',
				'plan': 'web_robot',
				'plan_description': 'Web Robot',
			};


			// We can also pass the url value separately from ajaxurl for front end AJAX implementations
			$.post(nnr_stripe_data.ajaxurl, data, function(response) {
				response = jQuery.parseJSON(response);

				$('.nnr-stripe-payment').remove();

				if (response.status == 'good') {
					var win = window.open(response.url, '_self');
					win.focus();
				} else {
					alert(response.message)
				}
			});

		}
	});

	$('#web-robot').on('click', function(e) {
		// Open Checkout with further options
		web_robot_handler.open({
			name: '99 Robots',
			description: 'Web Robot',
			zipCode: true
		});
		e.preventDefault();
	});

	// Close Checkout on page navigation
	$(window).on('popstate', function() {
		web_robot_handler.close();
	});


	// Robot Army

	var robot_army_handler = StripeCheckout.configure({
		key: 'pk_live_AnMNthy2FA6L4PkwQ482Jci9',
		image: 'https://s3.amazonaws.com/stripe-uploads/acct_152XgNLy78ZGYAtrmerchant-icon-1416893622908-99robots-001-high-resolution-logo.jpg',
		token: function(token) {

			$('body').append('<div class="nnr-stripe-payment" style="top:0px;left:0px;right:0px;bottom:0px;position:fixed;background-color:#000000;opacity:0.5;z-index: 99;"></div><div class="nnr-stripe-payment" style="position: fixed;z-index: 99;top: 0px;left: 0px;right: 0px;bottom: 0px;text-align: center;display: inline-block;"><i class="fa fa-circle-o-notch fa-spin" style="font-size: 100px;top: 200px;position: relative;color: #ffffff;z-index: 999999;"></i><div>');

			var data = {
				'action': 'nnr_stripe_charge',
				'token_id': token.id,
				'email': token.email,
				'type': 'subscription',
				'plan': 'robot_army',
				'plan_description': 'Robot Army',
			};
			// We can also pass the url value separately from ajaxurl for front end AJAX implementations
			$.post(nnr_stripe_data.ajaxurl, data, function(response) {
				response = jQuery.parseJSON(response);

				$('.nnr-stripe-payment').remove();

				if (response.status == 'good') {
					var win = window.open(response.url, '_self');
					win.focus();
				} else {
					alert(response.message)
				}
			});

		}
	});

	$('#robot-army').on('click', function(e) {
		// Open Checkout with further options
		robot_army_handler.open({
			name: '99 Robots',
			description: 'Robot Army',
			zipCode: true
		});
		e.preventDefault();
	});

	// Close Checkout on page navigation
	$(window).on('popstate', function() {
		robot_army_handler.close();
	});

	// Robot Fleet

	var robot_fleet_handler = StripeCheckout.configure({
		key: 'pk_live_AnMNthy2FA6L4PkwQ482Jci9',
		image: 'https://s3.amazonaws.com/stripe-uploads/acct_152XgNLy78ZGYAtrmerchant-icon-1416893622908-99robots-001-high-resolution-logo.jpg',
		token: function(token) {

			$('body').append('<div class="nnr-stripe-payment" style="top:0px;left:0px;right:0px;bottom:0px;position:fixed;background-color:#000000;opacity:0.5;z-index: 99;"></div><div class="nnr-stripe-payment" style="position: fixed;z-index: 99;top: 0px;left: 0px;right: 0px;bottom: 0px;text-align: center;display: inline-block;"><i class="fa fa-circle-o-notch fa-spin" style="font-size: 100px;top: 200px;position: relative;color: #ffffff;z-index: 999999;"></i><div>');

			var data = {
				'action': 'nnr_stripe_charge',
				'token_id': token.id,
				'email': token.email,
				'type': 'subscription',
				'plan': 'robot_fleet',
				'plan_description': 'Robot Fleet',
			};
			// We can also pass the url value separately from ajaxurl for front end AJAX implementations
			$.post(nnr_stripe_data.ajaxurl, data, function(response) {
				response = jQuery.parseJSON(response);

				$('.nnr-stripe-payment').remove();

				if (response.status == 'good') {
					var win = window.open(response.url, '_self');
					win.focus();
				} else {
					alert(response.message)
				}
			});

		}
	});

	$('#robot-fleet').on('click', function(e) {
		// Open Checkout with further options
		robot_fleet_handler.open({
			name: '99 Robots',
			description: 'Robot Fleet',
			zipCode: true
		});
		e.preventDefault();
	});

	// Close Checkout on page navigation
	$(window).on('popstate', function() {
		robot_fleet_handler.close();
	});
});