function getData() {
	const loanAmountSlider = document.getElementById( 'loanAmount' );
	const interestRateSlider = document.getElementById( 'interestRate' );
	const loanTenureSlider = document.getElementById( 'loanTenure' );

	const loanAmountValue = document.getElementById( 'loanAmountValue' );
	const interestRateValue = document.getElementById( 'interestRateValue' );
	const loanTenureValue = document.getElementById( 'loanTenureValue' );

	const loanAValueTextField = document.getElementById( 'loanAValue' );
	const loanRateValueTextField = document.getElementById( 'loanRateValue' );
	const loanTenValueTextField = document.getElementById( 'loanTenValue' );

	const monthlyEMI = document.getElementById( 'monthlyEMI' );
	const principalAmount = document.getElementById( 'principalAmount' );
	const interestAmount = document.getElementById( 'interestAmount' );
	const totalAmountPayable = document.getElementById( 'totalAmountPayable' );

	const homeLoan = document.getElementById( 'homeLoan' );
	const personalLoan = document.getElementById( 'personalLoan' );
	const mortgageLoan = document.getElementById( 'mortgageLoan' );
	const businessLoan = document.getElementById( 'businessLoan' );

	function updateRangeDisplay( slider, convertToLakhs, displayElement ) {
		if ( convertToLakhs ) {
			displayElement.innerText = formatToLakhs( slider.value ); // Updated to format in Lakhs
		} else {
			displayElement.innerText = slider.value;
		}
	}

	function createScale( slider, convertToLakhs, scaleElement ) {
		const min = parseInt( slider.min );
		const max = parseInt( slider.max );
		const step = ( max - min ) / 10;
		scaleElement.innerHTML = '';

		for ( let i = 0; i <= 10; i++ ) {
			const value = min + step * i;
			const scaleMark = document.createElement( 'span' );
			const scaleMark2 = document.createElement( 'span' );
			scaleMark.className = 'scale-mark';
			scaleMark2.className = 'scale-mark scale-mark-2';
			scaleMark.style.left = `calc(${ i * 10 }% + 10px)`;
			scaleMark2.style.left = `calc(${ i * 10 }% + 10px)`;
			if ( convertToLakhs ) {
				scaleMark.innerText = formatToLakhs( value ); // Updated to format in Lakhs
				scaleMark2.innerText = formatToLakhs( value ); // Updated to format in Lakhs
			} else {
				scaleMark.innerText = value.toFixed( 1 );
				scaleMark2.innerText = value.toFixed( 1 );
			}

			scaleElement.appendChild( scaleMark );
			scaleElement.appendChild( scaleMark2 );
		}
	}

	function formatToLakhs( value ) {
		return ( value / 100000 ).toFixed( 0 ) + 'L'; // Function to format values in Lakhs
	}

	function formatToIndianCurrency(value) {
		return new Intl.NumberFormat('en-IN', {
			style: 'currency',
			currency: 'INR',
			maximumFractionDigits: 0,
		}).format(value);
	}
	
	function updateLoanAmountDisplay() {
		// Remove non-numeric characters from input value
		let numericValue = loanAValueTextField.value.replace(/[^0-9]/g, '');
	
		// Convert the numeric string to a number
		let value = parseInt(numericValue, 10);
	
		// Only update if value is a valid number
		if (!isNaN(value)) {
			// Format to Indian currency without ₹ symbol
			loanAValueTextField.value = formatToIndianCurrency(value).replace('₹', '');
			
		} else {
			console.log('Invalid input, cannot format');
		}
	}

	loanAmountSlider.addEventListener( 'input', function () {
		loanAValueTextField.value = Number( this.value );
		calculateEMI(
			loanAmountSlider,
			interestRateSlider,
			loanTenureSlider,
			monthlyEMI,
			principalAmount,
			interestAmount,
			totalAmountPayable
		);
	} );

	loanAValueTextField.addEventListener( 'input', function () {
		const val_sd = this.value.replace( /,/g, '' );
		loanAmountSlider.value = Number( val_sd );
		
		updateLoanAmountDisplay();
		sliderColor();
		calculateEMI(
			loanAmountSlider,
			interestRateSlider,
			loanTenureSlider,
			monthlyEMI,
			principalAmount,
			interestAmount,
			totalAmountPayable
		);
	} );

	interestRateSlider.addEventListener( 'input', function () {
		loanRateValueTextField.value = this.value;
		calculateEMI(
			loanAmountSlider,
			interestRateSlider,
			loanTenureSlider,
			monthlyEMI,
			principalAmount,
			interestAmount,
			totalAmountPayable
		);
	} );

	loanRateValueTextField.addEventListener( 'input', function () {
		interestRateSlider.value = this.value;
		sliderColor();
		calculateEMI(
			loanAmountSlider,
			interestRateSlider,
			loanTenureSlider,
			monthlyEMI,
			principalAmount,
			interestAmount,
			totalAmountPayable
		);
	} );

	loanTenureSlider.addEventListener( 'input', function () {
		loanTenValueTextField.value = this.value;
		calculateEMI(
			loanAmountSlider,
			interestRateSlider,
			loanTenureSlider,
			monthlyEMI,
			principalAmount,
			interestAmount,
			totalAmountPayable
		);
	} );

	loanTenValueTextField.addEventListener( 'input', function () {
		loanTenureSlider.value = this.value;
		sliderColor();
		calculateEMI(
			loanAmountSlider,
			interestRateSlider,
			loanTenureSlider,
			monthlyEMI,
			principalAmount,
			interestAmount,
			totalAmountPayable
		);
	} );

	sliderColor();

	calculateEMI(
		loanAmountSlider,
		interestRateSlider,
		loanTenureSlider,
		monthlyEMI,
		principalAmount,
		interestAmount,
		totalAmountPayable
	);

	// Initial range display update
	updateRangeDisplay(
		loanAmountSlider,
		( convertToLakhs = true ),
		document.getElementById( 'loanAmountRange' )
	);
	updateRangeDisplay(
		interestRateSlider,
		( convertToLakhs = false ),
		document.getElementById( 'interestRateRange' )
	);
	updateRangeDisplay(
		loanTenureSlider,
		( convertToLakhs = false ),
		document.getElementById( 'loanTenureRange' )
	);

	// Create scales
	createScale(
		loanAmountSlider,
		( convertToLakhs = true ),
		document.getElementById( 'loanAmountScale' )
	);
	createScale(
		interestRateSlider,
		( convertToLakhs = false ),
		document.getElementById( 'interestRateScale' )
	);
	createScale(
		loanTenureSlider,
		( convertToLakhs = false ),
		document.getElementById( 'loanTenureScale' )
	);

	let donutChart;

	const inputField = document.getElementById( 'loanAValue' );

	formatInputValue();

	inputField.addEventListener( 'click', function ( event ) {
		let inputval = inputField.value.replace( /,/g, '' ); // Remove commas
		inputField.value = inputval;
	} );

	// Add event listener to detect click anywhere on the document
	document.addEventListener( 'click', function ( event ) {
		// Check if the clicked target is NOT the input field
		if ( ! inputField.contains( event.target ) ) {
			formatInputValue();
		}
	} );

	// Also format the number when the user leaves the input field (optional)
	inputField.addEventListener( 'blur', formatInputValue );

	// Function to format the value inside the input field
	function formatInputValue() {
		let inputValue = inputField.value.replace( /,/g, '' ); // Remove commas

		// Check if the input is a valid number
		if ( isNaN( inputValue ) || inputValue === '' ) {
			inputField.value = '';
			return;
		}

		// Format the number in Indian number system
		inputField.value = formatIndianNumber( inputValue );
	}

	function formatIndianNumber( num ) {
		let x = num.split( '.' );
		let x1 = x[ 0 ]; // Whole number part
		let x2 = x.length > 1 ? '.' + x[ 1 ] : ''; // Decimal part

		// Apply Indian formatting (lakh, crore)
		let lastThree = x1.substring( x1.length - 3 );
		let otherNumbers = x1.substring( 0, x1.length - 3 );
		if ( otherNumbers !== '' ) lastThree = ',' + lastThree;
		let formattedNumber =
			otherNumbers.replace( /\B(?=(\d{2})+(?!\d))/g, ',' ) +
			lastThree +
			x2;

		return formattedNumber;
	}

	/*document.addEventListener( 'DOMContentLoaded', function () {
		const loanAmountInput = document.getElementById( 'loanAValue' );
		const loanAmountRange = document.getElementById( 'loanAmount' );
	
		function formatToIndianCurrency( value ) {
			return new Intl.NumberFormat( 'en-IN', {
				style: 'currency',
				currency: 'INR',
				maximumFractionDigits: 0,
			} )
				.format( value )
				.replace( '₹', '' );
		}
	
		function updateLoanAmountDisplay() {
			loanAmountInput.value = formatToIndianCurrency(
				loanAmountInput.value.replace( /[^0-9]/g, '' )
			);
		}
	
		//loanAmountInput.addEventListener( 'input', updateLoanAmountDisplay );
		loanAmountInput.addEventListener( 'input',  function() {
			updateLoanAmountDisplay();
			loanAmountSlider.value = Number( this.value );
		});
		console.log(loanAmountInput);
		loanAmountRange.addEventListener( 'input', function () {
			loanAmountInput.value = loanAmountRange.value;
			updateLoanAmountDisplay();
		} ); 
	
		// Initial formatting
		updateLoanAmountDisplay();
	} );  */
}

function sliderColor() {
	const ranges = document.getElementsByClassName( 'calculator__left-range' );

	function updateBackground( range ) {
		const value =
			( ( range.value - range.min ) / ( range.max - range.min ) ) * 100;

		range.style.background = `linear-gradient(to right, rgb(0, 112, 224) ${ value }%, rgb(217, 217, 217) ${ value }%)`;
	}

	Array.from( ranges ).forEach( ( range ) => {
		range.addEventListener( 'input', function () {
			updateBackground( range );
		} );

		// Initial update to set the gradient based on the initial value
		updateBackground( range );
	} );
}

function calculateEMI(
	loanAmountSlider,
	interestRateSlider,
	loanTenureSlider,
	monthlyEMI,
	principalAmount,
	interestAmount,
	totalAmountPayable
) {
	const loanAmount = parseInt( loanAmountSlider.value );
	
	const annualInterestRate = parseFloat( interestRateSlider.value );
	const monthlyInterestRate = annualInterestRate / 12 / 100;
	const loanTenure = parseInt( loanTenureSlider.value ) * 12;

	const emi =
		( loanAmount *
			monthlyInterestRate *
			Math.pow( 1 + monthlyInterestRate, loanTenure ) ) /
		( Math.pow( 1 + monthlyInterestRate, loanTenure ) - 1 );
	const totalAmount = emi * loanTenure;
	const interest = totalAmount - loanAmount;

	// Format numbers using 'en-IN' locale
	monthlyEMI.innerText = Math.floor( emi ).toLocaleString( 'en-IN' );
	principalAmount.innerText =
		Math.floor( loanAmount ).toLocaleString( 'en-IN' );
	interestAmount.innerText = Math.floor( interest ).toLocaleString( 'en-IN' );
	totalAmountPayable.innerText =
		Math.floor( totalAmount ).toLocaleString( 'en-IN' );

	updateDonutChart( loanAmount, interest );
}
let donutChart;

function updateDonutChart( principal, interest ) {
	const data = [ principal, interest ];

	if ( donutChart ) {
		// Update the existing chart's data without animations
		donutChart.data.datasets[ 0 ].data = data;
		donutChart.options.animation = false; // Disable animation for instant update
		donutChart.update(); // Refresh the chart
	} else {
		const ctx = document.getElementById( 'donutChart' ).getContext( '2d' );

		donutChart = new Chart( ctx, {
			type: 'doughnut',
			data: {
				//  labels: ["Principal", "Interest"],
				datasets: [
					{
						data: data,
						backgroundColor: [ '#FFD140', '#0070E0' ],
					},
				],
			},
			options: {
				responsive: true,
				maintainAspectRatio: true,
				cutout: '70%',
				animation: {
					duration: 0, // Disable animation
				},
				plugins: {
					legend: {
						position: 'top',
					},
				},
			},
		} );
	}
}

homeLoan.addEventListener( 'click', function () {
	const homeLoanHtml =
		'<div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Loan Amount<div class=calculator__left-block><p class=calculator__left-ico>₹<p class=calculator__left-descr id=loanAmountValue><input class=cal_num_field id=loanAValue max=50000000 min=0 type=text value=5000000 name=loanAmount></div></div><div class=calculator__left-content><input class=calculator__left-range id=loanAmount max=50000000 min=0 type=range value=5000000 step=1><p id="loanAmountRange" class="range-display"></p><div id="loanAmountScale" class="range-scale"></div></div></div><div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Rate of Interest<div class=calculator__left-block><p class=calculator__left-ico>%<p class=calculator__left-descr id=interestRateValue><input class=cal_num_field id=loanRateValue max=13 min=7 type=number value=7 name=loanrRate></div></div><div class=calculator__left-content><input class=calculator__left-range id=interestRate max=13 min=7 type=range value=7 step=0.1><p id="interestRateRange" class="range-display"></p><div id="interestRateScale" class="range-scale"></div></div></div><div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Loan Tenure (Years)<div class=calculator__left-block><p class=calculator__left-ico>Years<p class=calculator__left-descr id=loanTenureValue><input class=cal_num_field id=loanTenValue max=30 min=5 type=number value=5 name=loanTenure></div></div><div class=calculator__left-content><input class=calculator__left-range id=loanTenure max=30 min=5 type=range value=5 step=1><p id="loanTenureRange" class="range-display"></p><div id="loanTenureScale" class="range-scale"></div></div></div>';
	document.getElementById( 'calculator__left' ).innerHTML = homeLoanHtml;

	this.classList.add( 'active' );
	document.getElementById( 'personalLoan' ).classList.remove( 'active' );
	document.getElementById( 'mortgageLoan' ).classList.remove( 'active' );
	document.getElementById( 'businessLoan' ).classList.remove( 'active' );

	getData();
} );
personalLoan.addEventListener( 'click', function () {
	const personalHtml =
		'<div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Loan Amount<div class=calculator__left-block><p class=calculator__left-ico>₹<p class=calculator__left-descr id=loanAmountValue><input class=cal_num_field id=loanAValue max=3000000 min=0 type=text value=500000 name=loanAmount></div></div><div class=calculator__left-content><input class=calculator__left-range id=loanAmount max=3000000 min=0 type=range value=500000 step=1><p id="loanAmountRange" class="range-display"></p><div id="loanAmountScale" class="range-scale"></div></div></div><div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Rate of Interest<div class=calculator__left-block><p class=calculator__left-ico>%<p class=calculator__left-descr id=interestRateValue><input class=cal_num_field id=loanRateValue max=20 min=8 type=number value=8 name=loanrRate></div></div><div class=calculator__left-content><input class=calculator__left-range id=interestRate max=20 min=8 type=range value=8 step=0.1><p id="interestRateRange" class="range-display"></p><div id="interestRateScale" class="range-scale"></div></div></div><div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Loan Tenure (Years)<div class=calculator__left-block><p class=calculator__left-ico>Years<p class=calculator__left-descr id=loanTenureValue><input class=cal_num_field id=loanTenValue max=5 min=1 type=number value=1 name=loanTenure></div></div><div class=calculator__left-content><input class=calculator__left-range id=loanTenure max=5 min=1 type=range value=1 step=1><p id="loanTenureRange" class="range-display"></p><div id="loanTenureScale" class="range-scale"></div></div></div>';
	document.getElementById( 'calculator__left' ).innerHTML = personalHtml;
	this.classList.add( 'active' );
	document.getElementById( 'mortgageLoan' ).classList.remove( 'active' );
	document.getElementById( 'homeLoan' ).classList.remove( 'active' );
	document.getElementById( 'businessLoan' ).classList.remove( 'active' );

	getData();
} );
mortgageLoan.addEventListener( 'click', function () {
	const mortgageHtml =
		'<div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Loan Amount<div class=calculator__left-block><p class=calculator__left-ico>₹<p class=calculator__left-descr id=loanAmountValue><input class=cal_num_field id=loanAValue max=50000000 min=0 type=text value=5000000 name=loanAmount></div></div><div class=calculator__left-content><input class=calculator__left-range id=loanAmount max=50000000 min=0 type=range value=5000000 step=1><p id="loanAmountRange" class="range-display"></p><div id="loanAmountScale" class="range-scale"></div></div></div><div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Rate of Interest<div class=calculator__left-block><p class=calculator__left-ico>%<p class=calculator__left-descr id=interestRateValue><input class=cal_num_field id=loanRateValue max=15 min=8 type=number value=8 name=loanrRate></div></div><div class=calculator__left-content><input class=calculator__left-range id=interestRate max=15 min=8 type=range value=8 step=0.1><p id="interestRateRange" class="range-display"></p><div id="interestRateScale" class="range-scale"></div></div></div><div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Loan Tenure (Years)<div class=calculator__left-block><p class=calculator__left-ico>Years<p class=calculator__left-descr id=loanTenureValue><input class=cal_num_field id=loanTenValue max=15 min=5 type=number value=5 name=loanTenure></div></div><div class=calculator__left-content><input class=calculator__left-range id=loanTenure max=15 min=5 type=range value=5 step=1><p id="loanTenureRange" class="range-display"></p><div id="loanTenureScale" class="range-scale"></div></div></div>';
	document.getElementById( 'calculator__left' ).innerHTML = mortgageHtml;

	this.classList.add( 'active' );
	document.getElementById( 'personalLoan' ).classList.remove( 'active' );
	document.getElementById( 'homeLoan' ).classList.remove( 'active' );
	document.getElementById( 'businessLoan' ).classList.remove( 'active' );

	getData();
} );
businessLoan.addEventListener( 'click', function () {
	const businessHtml =
		'<div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Loan Amount<div class=calculator__left-block><p class=calculator__left-ico>₹<p class=calculator__left-descr id=loanAmountValue><input class=cal_num_field id=loanAValue max=5000000 min=0 type=text value=500000 name=loanAmount></div></div><div class=calculator__left-content><input class=calculator__left-range id=loanAmount max=5000000 min=0 type=range value=500000 step=1><p id="loanAmountRange" class="range-display"></p><div id="loanAmountScale" class="range-scale"></div></div></div><div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Rate of Interest<div class=calculator__left-block><p class=calculator__left-ico>%<p class=calculator__left-descr id=interestRateValue><input class=cal_num_field id=loanRateValue max=20 min=10 type=number value=10 name=loanrRate></div></div><div class=calculator__left-content><input class=calculator__left-range id=interestRate max=20 min=10 type=range value=10 step=0.1><p id="interestRateRange" class="range-display"></p><div id="interestRateScale" class="range-scale"></div></div></div><div class=calculator__left-item><div class=calculator__left-top><p class=calculator__left-name>Loan Tenure (Years)<div class=calculator__left-block><p class=calculator__left-ico>Years<p class=calculator__left-descr id=loanTenureValue><input class=cal_num_field id=loanTenValue max=10 min=2 type=number value=2 name=loanTenure></div></div><div class=calculator__left-content><input class=calculator__left-range id=loanTenure max=10 min=2 type=range value=2 step=1><p id="loanTenureRange" class="range-display"></p><div id="loanTenureScale" class="range-scale"></div></div></div>';

	document.getElementById( 'calculator__left' ).innerHTML = businessHtml;

	this.classList.add( 'active' );
	document.getElementById( 'mortgageLoan' ).classList.remove( 'active' );
	document.getElementById( 'homeLoan' ).classList.remove( 'active' );
	document.getElementById( 'personalLoan' ).classList.remove( 'active' );

	getData();
} );
// Initial Calculation
getData();


