const applyonline = document.querySelector( '.applyonline' );
const applyonlineClose = document.querySelector( '.applyonline__close' );
const body = document.querySelector( 'body' );

jQuery( document ).ready( function ( $ ) {
    $('#form-submit').prop('disabled', true);
	$( '#cibilForm' ).on( 'submit', function ( e ) {
		e.preventDefault();
		body.classList.add( 'credit-check' );
        $('#loading-screen').css('display','flex');

		let formData = $( this ).serialize();

		// console.log('js working');
	
		$.ajax( {
			url: cibilAjax.ajax_url,
			method: 'POST',
			data: {
				action: 'submit_cibil_form',
				nonce: cibilAjax.nonce,
				form_data: formData,
			},
			success: function ( response ) {
				//  console.log(response);
				// console.log(response.data.message);
				//console.log(response.data.message.errors);
				body.classList.remove( 'credit-check' );
                $('#loading-screen').css('display','none');
				

				var success = response.success;
				// var success = false;
				const applyonline = document.querySelector( '.applyonline' );
				if ( success == true ) {
					var creditscore = response.data.credit_score;
					var creditpdf = response.data.pdf_url;
					// var creditscore = 700;
					updateSpeedometer(creditscore);
					//  console.log(creditscore);
					// console.log(creditpdf);
					$( '.credit_score' ).text( creditscore );
					$( '#downloadbutton' ).attr( 'href', creditpdf );
					$( '#downloadbutton' ).show();
					$( '#cibil-score-container').show();
					applyonline.classList.add( 'active' );
					body.classList.add( 'no-scroll' );
					$('.applyonline__close .close-btn path').css('fill', '#fff');
				} else {
					body.classList.remove( 'credit-check' );
                    $('#loading-screen').css('display','none');
                    $( '#downloadbutton' ).hide();
                    $( '#downloadbutton' ).attr( 'href', '' );
					$( '#cibil-score-container').hide();
					var pan = response?.data?.message?.errors?.pan ?? null;
					var mobile =
						response?.data?.message?.errors?.mobile ?? null;
					if ( pan != null ) {
						//console.log(pan);
						$( '.error_message' ).text( pan );
						applyonline.classList.add( 'active' );
						body.classList.add( 'no-scroll' );
					} else if ( mobile != null ) {
						//console.log(mobile);
						$( '.error_message' ).text( mobile );
						applyonline.classList.add( 'active' );
						body.classList.add( 'no-scroll' );
					} 

					else {
						body.classList.remove( 'credit-check' );
                        $('#loading-screen').css('display','none');
						console.log(response.data.message.message);
						// $( '.error_message' ).text(
						// 	response.data.message.message
						// );
						$( '.error_message' ).text('Entered details are incorrect.');
						applyonline.classList.add( 'active' );
						body.classList.add( 'no-scroll' );
					}
				}
				$( '#responsePopup' ).html( response.data.message ).fadeIn();
			},
			error: function () {
                $('#loading-screen').css('display','none');
				alert( 'An error occurred. Please try again.' );
			},
		} );
	
	} );

	applyonlineClose.addEventListener( 'click', function () {
		applyonline.classList.remove( 'active' );
		body.classList.remove( 'no-scroll' );
		$( '.credit_score' ).text( '' );
		$( '#downloadbutton' ).attr( 'href', '' );
		$( '#downloadbutton' ).hide();
		$( '#cibil-score-container').hide();
		$( '.error_message' ).text( '' );
		
		// Clear all form fields
		$('#cibilForm')[0].reset();
		$('#OTP').prop('disabled', true);
		$('#mobileerror').text('');
		$('#mobilesuccess').text('');
		$('#otperror').text('');
		$('#otpsuccess').text('');
		$('#otpStatus').html('');
		$('#form-submit').prop('disabled', true);
		$('#timer').text('');
	} );


    let resendTimer;

    // Function to start the resend timer
    function startResendTimer() {
        let timeLeft = 60; // 60 seconds
        $('#otpsend').prop('disabled', true);
        $('#timer').text(`Resend OTP in ${timeLeft} seconds`);

        resendTimer = setInterval(function () {
            timeLeft--;
            $('#timer').text(`Resend OTP in ${timeLeft} seconds`);

            if (timeLeft <= 0) {
                clearInterval(resendTimer);
                $('#otpsend').prop('disabled', false);
                $('#timer').text('');
            }
        }, 1000);
    }

    // Send OTP ajax

    $('#otpsend').on('click', function () {

        const mobile = $('#mobile-number').val();
        $('#mobileerror').text('');

        if (!mobile) {
            $('#mobileerror').text('Please enter a mobile number.');
            return;
        } else if (!/^\d{10}$/.test(mobile)) {
            $('#mobileerror').text('Please enter a valid 10-digit mobile number.');
            return; 
        }

        startResendTimer();

      //  $(this).prop('disabled', false);

        $.ajax({
            url: cibilAjax.ajax_url, // WordPress AJAX URL
            type: 'POST',
            data: {
                action: 'send_otp',
                mobile: mobile,
            },
            success: function (response) {
                if (response.success) {
                    $('#mobileerror').text('');
                    $('#mobilesuccess').text(response.data.message);
                    $('#OTP').prop('disabled', false); // Enable OTP input after successful send
                } else {
                    $('#mobilesuccess').text('');
                    $('#mobileerror').text(response.data.message);
                }
            },
        });
    });

    $('#mobile-number').on('input', function () {
        const mobileValue = $(this).val();
        const mobileError = $('#mobileerror');

        // Clear previous error message
        mobileError.text('');

        // Validate for non-digit characters
        if (/[^0-9]/.test(mobileValue)) {
            mobileError.text('Please enter valid mobile number.');
            return; // Prevent further action if validation fails
        }

        // Validate length
        if (mobileValue.length > 10) {
            mobileError.text('Mobile number cannot exceed 10 digits.');
            return; // Prevent further action if validation fails
        }
    });


    // verify OTP

   /*
    $('#otpverify').on('click', function () {
        const otp = $('#OTP').val();

        if (!otp) {
            $('#otperror').text('Please enter OTP.');
            return;
        }

        $.ajax({
            url: cibilAjax.ajax_url, // WordPress AJAX URL
            type: 'POST',
            data: {
                action: 'verify_otp',
                otp: otp,
            },
            success: function (response) {
                if (response.success) {
                  //  alert(response.data.message);
                    $('#otperror').text('');
                    $('#otpsuccess').text(response.data.message);
                    $('#form-submit').prop('disabled', false);
                } else {
                    $('#otpsuccess').text('');
                    $('#otperror').text(response.data.message);
                 //   alert(response.data.message);
                }
            },
        });
    });
    */

    $('#OTP').on('input', function () {
        const otp = $(this).val();

        // Allow only numbers
        if (/[^0-9]/.test(otp)) {
            $(this).val(otp.replace(/[^0-9]/g, '')); // Remove non-numeric characters
            return;
        }

        // Clear previous messages and status
        $('#otperror').text('');
        $('#otpsuccess').text('');
        $('.otpStatus-success, .otpStatus-error').removeClass('active');

        // Validate OTP input
        if (!otp) {
            $('#otperror').text('Please enter OTP.');
            return;
        }

        if (otp.length < 6) { 
            return;
        }

        $.ajax({
            url: cibilAjax.ajax_url, 
            type: 'POST',
            data: {
                action: 'verify_otp',
                otp: otp,
            },
            success: function (response) {
                if (response.success) {
                    $('#otpsuccess').text(response.data.message);
                    $('#form-submit').prop('disabled', false);
                    $('.otpStatus-success').addClass('active');
                    $('.otpStatus-error').removeClass('active');
                } else {
                    $('#otperror').text(response.data.message);
                    $('.otpStatus-error').addClass('active');
                    $('.otpStatus-success').removeClass('active');
                }
            },
            error: function () {
                $('#otperror').text('An error occurred while verifying OTP.');
                $('.otpStatus-error').addClass('active');
                $('.otpStatus-success').removeClass('active');
            }
        });
    });

//



} );
