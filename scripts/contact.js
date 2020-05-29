"use strict";
var Contact = function() {
	
	var _form_validate = function () {

		$('#contact-form').validate({

			rules: {
				name: {
					required: true,
                },
                store_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                mobile_no: {
                    required: true,
                },
                message: {
                    required: true
				},
			},
	
			invalidHandler: function ( event, validator ) {

				event.preventDefault();

			},
			submitHandler: function ( _frm ) {

				var submit          = $('#contact-form submit');

				var name            = $('#contact-form [name="name"]').val();
				var store_name            = $('#contact-form [name="store_name"]').val();
				var email           = $('#contact-form [name="email"]').val();
				var mobile_no           = $('#contact-form [name="mobile_no"]').val();
				var message         = $('#contact-form [name="message"]').val();

				$.ajax({
					type: 'POST',
					url: 'php/contact.php',
					dataType: 'JSON',
					data: {
                        name: name,
                        store_name: store_name,
                        email: email,
						mobile_no: mobile_no,
						message: message,
					},
					cache: false,
					beforeSend: function(result) {
						submit.empty();
						submit.text('Please Wait...');
					},
					success: function(result) {
						if(result.sendstatus == 1) {

                            Swal.fire(
                                'Good job!',
                                'Thanks for contacting us.',
                                'success'
                            ).then((result) => {

                                $("#contact-form").trigger("reset");
                            });

						} else {

                            Swal.fire(
                                'Oops!',
                                'Sorry, something is wrong.',
                                'error'
                            );

						}
					}
				});
			}
		});
	}

	return {

		//main function to initiate the module
		init: function() {
			_form_validate();
		},

	};

}();

jQuery(document).ready(function() {
	Contact.init();
});