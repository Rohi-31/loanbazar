const headerBlock = document.querySelector( '.header__block' );
const headerMenu = document.querySelector( '.header__menu' );
const headerTop = document.querySelector( '.header__top' );
function resizeHandler() {
	const width = window.innerWidth;

	if ( width < 781 ) {
		headerMenu.appendChild( headerBlock );
	} else {
		headerTop.appendChild( headerBlock );
	}
}
window.addEventListener( 'resize', resizeHandler );
resizeHandler();
document.addEventListener( 'DOMContentLoaded', function () {
	const menuBoxes = document.querySelectorAll( '.header__menu-box' );
	menuBoxes.forEach( ( box ) => {
		const menuTrigger = box.querySelector( '.menu-trigger' );
		menuTrigger.addEventListener( 'click', function ( event ) {
			event.stopPropagation();
			box.classList.toggle( 'active' );
		} );
		document.addEventListener( 'click', function ( event ) {
			if ( ! box.contains( event.target ) ) {
				box.classList.remove( 'active' );
			}
		} );
	} );
	document.querySelectorAll( '.circle-animate span' ).forEach( ( span ) => {
		span.addEventListener( 'animationstart', () => {
			setTimeout( () => {
				document
					.querySelectorAll( '.circle-animate' )
					.forEach( ( element ) => {
						element.classList.add( 'animate-off' );
					} );
				setTimeout( () => {
					document
						.querySelectorAll( '.circle-animate' )
						.forEach( ( element ) => {
							element.classList.remove( 'animate-off' );
						} );
				}, 1000 );
			}, 3500 );
		} );
	} );
	const rotateAnimation = document.querySelector( '.rotate-animation' );
	rotateAnimation.addEventListener( 'animationiteration', () => {
		rotateAnimation.classList.toggle( 'animate-off' );
	} );
	const headerBurger = document.querySelector( '.header__burger' );
	const headerMenu = document.querySelector( '.header__menu' );
	const body = document.querySelector( '.body' );
	headerBurger.addEventListener( 'click', function () {
		headerBurger.classList.toggle( 'active' );
		headerMenu.classList.toggle( 'show' );
		body.classList.toggle( 'no-scroll' );
	} );
	const leftRanges = document.querySelectorAll( '.calculator__left-range' );
	/*function updateRangeBackground( range ) {
		const value = range.value;
		const max = range.getAttribute( 'max' );
		const percent = ( value / max ) * 100;
		const gradientStart = '#0070E0';
		const gradientEnd = '#D9D9D9';
		const newGradient = `linear-gradient(to right, ${ gradientStart } ${ percent }%, ${ gradientEnd } ${ percent }%)`;
		range.style.background = newGradient;
	}
	leftRanges.forEach( ( range ) => {
		updateRangeBackground( range );
		range.addEventListener( 'input', () => updateRangeBackground( range ) );
	}); */

	// Header

	const menuItems = document.querySelectorAll(
		'.header-menu .menu-item-has-children > a'
	);

	menuItems.forEach( ( menuItem ) => {
		menuItem.addEventListener( 'click', function ( event ) {
			event.preventDefault();
			const parentItem = menuItem.parentElement;
			const submenu = parentItem.querySelector( '.sub-menu' );

			if ( submenu ) {
				parentItem.classList.toggle( 'active' );
				submenu.classList.toggle( 'active' );
			}

			// Close other open submenus
			menuItems.forEach( ( item ) => {
				if ( item !== menuItem ) {
					const otherParentItem = item.parentElement;
					const otherSubmenu =
						otherParentItem.querySelector( '.sub-menu' );
					if ( otherSubmenu ) {
						otherParentItem.classList.remove( 'active' );
						otherSubmenu.classList.remove( 'active' );
					}
				}
			} );
		} );
	} );

	document.addEventListener( 'click', function ( event ) {
		// Close submenus if clicking outside of them
		menuItems.forEach( ( menuItem ) => {
			const parentItem = menuItem.parentElement;
			const submenu = parentItem.querySelector( '.sub-menu' );

			if ( submenu && ! parentItem.contains( event.target ) ) {
				parentItem.classList.remove( 'active' );
				submenu.classList.remove( 'active' );
			}
		} );
	} );
} );

// Hide formidibal form Placeholder when start typing
document.addEventListener( 'DOMContentLoaded', function () {
	// Select all input and textarea fields within Formidable Forms
	const inputs = document.querySelectorAll(
		'.frm_form_field input, .frm_form_field textarea, .frm_form_field select'
	);

	inputs.forEach( ( input ) => {
		input.addEventListener( 'focus', function () {
			const label = input
				.closest( '.frm_form_field' )
				.querySelector( '.frm_primary_label' );
			if ( label ) {
				label.style.display = 'none'; // Hide the label (placeholder) when focused
			}
		} );

		input.addEventListener( 'blur', function () {
			const label = input
				.closest( '.frm_form_field' )
				.querySelector( '.frm_primary_label' );
			if ( label && input.value === '' ) {
				label.style.display = ''; // Show the label (placeholder) again if the input is empty
			}
		} );
	} );

	const offset = 100;

	// Function to handle scroll with offset
	function scrollToElement( elementId ) {
		const element = document.getElementById( elementId );
		if ( element ) {
			const elementPosition =
				element.getBoundingClientRect().top + window.scrollY; // Element position from top
			const offsetPosition = elementPosition - offset; // Adjust position with offset

			// Smooth scroll to the calculated position
			window.scrollTo( {
				top: offsetPosition,
				behavior: 'smooth',
			} );
		}
	}

	// Attach event listeners to links
	document.querySelectorAll( '.scroll-link' ).forEach( ( link ) => {
		link.addEventListener( 'click', function ( e ) {
			e.preventDefault();
			const targetId = this.getAttribute( 'data-target' );
			scrollToElement( targetId );
		} );
	} );
} );

// formidable currency input formatting amount

document.addEventListener('DOMContentLoaded', function () {
    const inputSelectors = [
        '.currency-input input',
        '#balance-transfer .currency-input input',
        '#working-capital .currency-input input',
        '#instant-callback .currency-input input'
    ];

    const inputs = document.querySelectorAll(inputSelectors.join(', '));

    // Function to format the value inside the input field
    function formatInputValue(event) {
        const inputField = event.target;
        let inputValueCurrent = inputField.value.replace(/,/g, ''); // Remove commas

        // Check if the input is a valid number
        if (isNaN(inputValueCurrent) || inputValueCurrent === '') {
            inputField.value = '';
            return;
        }

        // Format the number in Indian number system
        inputField.value = formatIndianNumber(inputValueCurrent);
    }

    function formatIndianNumber(num) {
        let x = num.split('.');
        let x1 = x[0]; // Whole number part
        let x2 = x.length > 1 ? '.' + x[1] : ''; // Decimal part

        // Apply Indian formatting (lakh, crore)
        let lastThree = x1.substring(x1.length - 3);
        let otherNumbers = x1.substring(0, x1.length - 3);
        if (otherNumbers !== '') lastThree = ',' + lastThree;
        let formattedNumber =
            otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ',') +
            lastThree +
            x2;

        return formattedNumber;
    }

    // Add event listeners to each input
    inputs.forEach(input => {
        input.addEventListener('input', formatInputValue);
    });
});




