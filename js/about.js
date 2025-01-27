document.addEventListener( 'DOMContentLoaded', function () {
	const members = document.querySelectorAll( '.team-member' );
	const contents = document.querySelectorAll(
		'.member-content,.member-content2'
	);
	const triangles = document.querySelectorAll( '.triangle-up' );

	// Set the first member as active by default
	if ( members.length > 0 ) {
		const firstMember = members[ 0 ];
		const firstContent = contents[ 0 ];
		const firstTriangle = triangles[ 0 ];

		firstMember.querySelector( 'img' ).classList.add( 'active' );
		firstMember
			.querySelector( '.member-box' )
			.classList.add( 'active-box' );
		firstContent.style.display = 'block';
		firstTriangle.style.display = 'block';

		if ( window.innerWidth < 768 ) {
			firstMember.parentNode.insertBefore(
				firstContent,
				firstMember.nextSibling
			);
			firstContent.style.alignSelf = 'center';
		} else {
			firstMember.parentNode.parentNode.insertBefore(
				firstContent,
				firstMember.parentNode.nextSibling
			);
			firstContent.style.alignSelf = firstMember.dataset.alignContent;
		}
	}

	members.forEach( ( member, index ) => {
		member.addEventListener( 'click', () => {
			if ( member.classList.contains( 'no-click' ) ) {
				return;
			}

			// Remove active class and hide all content and triangles
			members.forEach( ( m, i ) => {
				if ( m !== member ) {
					// Only reset other members
					m.querySelector( 'img' ).classList.remove( 'active' );
					m.querySelector( '.member-box' ).classList.remove(
						'active-box'
					);
					triangles[ i ].style.display = 'none';
					contents[ i ].style.display = 'none';
				}
			} );

			let topOffset = 0;

			if ( window.innerWidth < 768 ) {
				topOffset = 150;
			} else {
				topOffset = 150;
			}

			// Get the top location of the member's image and calculate the scroll position with 50px offset
			const img = member.querySelector( 'img' );
			const imgTop =
				img.getBoundingClientRect().top + window.scrollY - topOffset;

			// Toggle active class to clicked member and show corresponding content and triangle
			const isActive = img.classList.toggle( 'active' ); // Check if it is active

			const memberBox = member.querySelector( '.member-box' );
			memberBox.classList.toggle( 'active-box', isActive ); // Only add if active

			const content = contents[ index ];
			content.style.display = isActive ? 'block' : 'none'; // Toggle display based on isActive

			if ( window.innerWidth < 768 ) {
				member.parentNode.insertBefore( content, member.nextSibling );
				content.style.alignSelf = 'center';
			} else {
				member.parentNode.parentNode.insertBefore(
					content,
					member.parentNode.nextSibling
				);
				content.style.alignSelf = member.dataset.alignContent;
			}

			const triangle = triangles[ index ];
			triangle.style.display = isActive ? 'block' : 'none'; // Toggle display based on isActive

			// Restore the original scroll position after the update
			window.scrollTo( { top: imgTop, behavior: 'smooth' } );
		} );
	} );
} );

// Toggle the size of the image when clicked
function toggleSize( img ) {
	img.classList.toggle( 'enlarged' );
}

jQuery( document ).ready( function () {
	let owl = jQuery( '#owl-carousel-gallery-demo' );
	owl.on( 'initialized.owl.carousel', function ( event ) {
		const container = document.querySelector( '.owl-stage' );
		lightGallery( container, {
			pager: true,
			plugins: [],
			hash: true,
			preload: 0,
			selector: '.owl-carousel-item',
		} );
	} );
	owl.owlCarousel( {
		center: true,
		items: 2,
		loop: true,
		margin: 10,
		responsive: {
			100: {
				items: 2,
			},
			768: {
				items: 4,
			},
		},
	} );
} );

jQuery( document ).ready( function () {
	let owl2 = jQuery( '#owl-carousel-gallery-2' );
	owl2.on( 'initialized.owl.carousel', function ( event ) {
		const container = document.querySelector(
			'#owl-carousel-gallery-2 .owl-stage'
		);
		lightGallery( container, {
			pager: true,
			plugins: [],
			hash: true,
			preload: 0,
			selector: '.owl-carousel-item',
		} );
	} );
	owl2.owlCarousel( {
		center: true,
		items: 2,
		loop: true,
		margin: 10,
		responsive: {
			100: {
				items: 2,
			},
			768: {
				items: 4,
			},
		},
	} );
} );

jQuery( document ).ready( function () {
	let owl = jQuery( '#owl-carousel-gallery-demo2' );
	owl.on( 'initialized.owl.carousel', function ( event ) {
		const container = document.querySelector(
			'#owl-carousel-gallery-demo2 .owl-stage'
		);
		lightGallery( container, {
			pager: true,
			plugins: [],
			hash: true,
			preload: 0,
			selector: '.owl-carousel-item',
		} );
	} );
	owl.owlCarousel( {
		center: true,
		items: 2,
		loop: true,
		margin: 10,
		responsive: {
			100: {
				items: 2,
			},
			768: {
				items: 4,
			},
		},
	} );
} );

jQuery( document ).ready( function () {
	let owl3 = jQuery( '#owl-carousel-gallery-3' );
	owl3.on( 'initialized.owl.carousel', function ( event ) {
		const container = document.querySelector(
			'#owl-carousel-gallery-3 .owl-stage'
		);
		lightGallery( container, {
			pager: true,
			plugins: [],
			hash: true,
			preload: 0,
			selector: '.owl-carousel-item',
		} );
	} );
	owl3.owlCarousel( {
		center: true,
		items: 2,
		loop: true,
		margin: 10,
		responsive: {
			100: {
				items: 2,
			},
			768: {
				items: 4,
			},
		},
	} );
} );

const contentData = {
	2018: {
		bgColor: '#83b4e3',
		content:
			'<ul><li>Loan Bazaar operations started at Thane Office at Lodha Supremus building from a plush new office space with a seating capacity of 60.</li><li> Hired a team of 50 employees constituting mainly Call Centre and Operations employees along with a team of support staff for Unsecured and Secured loans.</li><li> Kick started building Banking relationships with some key Private Banks and NBFCs.</li></ul>',
	},

	2019: {
		bgColor: '#dc84f5',
		content:
			'<ul><li>Started participating in Exhibits of various Corporates and Housing Society functions for Brand Promotion and active Sales.</li><li> Shot two exclusive videos of Loan Bazaar as a key branding initiative for Home and Personal Loan.</li><li> We also started selling additional products like Mortgage, LAP, Overdraft and working capital to enhance our product portfolio.</li></ul>',
	},

	2020: {
		bgColor: '#ff914d',
		content:
			'<ul><li>Pandemic Stuck, People weren’t buying houses or taking loans anymore. A common response we received was “if we live, we may take a loan so stay in touch and be safe” </li><li> We continued the journey targeting Loan Transfers (BT cases) and also supporting our existing clients by getting them a moratorium for existing loans.</li></ul>',
	},

	2021: {
		bgColor: '#7fe5b4',
		content:
			'<ul><li>Loan Bazaar was among the first few offices to open up early in the Industry in the month of Aug 2021 with an objective to support our clients as well as employees.</li><li> Tied up with Havmore Insurance Brokerage House in Oct 2021. It was a strategic move for the long term, insurance being one of the key financial products for cross sell.</li></ul>',
	},

	2022: {
		bgColor: '#949ed0',
		content:
			'<ul><li>Loan Bazaar B2B App was launched in Jun 2022 with the purpose of formally associating with channel partners. 100+ Agents of the Real Estate Industry, Builders, CA’s, and Insurance agents were enrolled as a result.</li><li> Loan Bazaar also started working on Direct Business codes with various Private and Nationalized banks to scale up business. The real estate industry also started showing some early signs of revival.</li></ul>',
	},

	2023: {
		bgColor: '#e79a91',
		content:
			'<ul><li> Started aggressively with Social & Digital media penetration through Google My Business, Just Dial, 99acres, Magicbricks, Facebook, Insta and LinkedIn portals. </li><li> Business numbers started picking up well and our team started putting up a business plan to expand across 360 degrees, adding more products, more locations etc. </li><li> Started planning to launch a full- fledged portal for becoming a preferred choice for its clients for numerous financial products.</li></ul>',
	},
	2024: {
		bgColor: '#f0d755',
		content:
			'<ul><li>Our Head office has been in Thane since 2018. We opened new branches in Mumbai and Delhi. </li><li> Launched our tailor made Business Franchise model which would give us a roadmap for future expansion. </li><li> Looking forward to opening at Pune, Bangalore and Hyderabad branch networks. </li><li> We got approval for the Name - “Loan Bazaar Financial Services Pvt Ltd” on Aug 1, 2024.</li><li> Launched 100 page Loan Bazaar Website in October 2024 with some unique features and interfaces.</li><li> Signed Mr Hiten Tejwani as our Brand Ambassador for the year 2024-25.</li><li> Did a strategic tie-up with Transunion CIBIL Bureau to enable our clients to download FREE CIBIL reports online.</li><li> Pumped up our Marketing and Sales campaigns through multiple digital interventions.</li></ul>',
	},
};

function showContent( year ) {
	const contentBox = document.getElementById( 'content-box' );
	const content = document.getElementById( 'content' );

	content.innerHTML = contentData[ year ].content;
	contentBox.style.backgroundColor = contentData[ year ].bgColor;
	contentBox.classList.add( 'active' );
}

window.onload = function () {
	showContent( '2024' );
};

// Get modal elements
const modal = document.getElementById( 'videoModal' );
const modalVideo = document.getElementById( 'modalVideo' );
const closeBtn = document.getElementsByClassName( 'close' )[ 0 ];

// Add event listeners to video items
document.querySelectorAll( '.video-item' ).forEach( ( item ) => {
	item.addEventListener( 'click', function () {
		// Get the video source from the data-video attribute
		const videoSrc = item.getAttribute( 'data-video' );

		// Set the iframe source for the YouTube video
		modalVideo.src = videoSrc;
		modal.style.display = 'block';
	} );
} );

// Close modal on click of close button
closeBtn.addEventListener( 'click', function () {
	closeModal();
} );

// Close modal if clicked outside the video
window.addEventListener( 'click', function ( event ) {
	if ( event.target == modal ) {
		closeModal();
	}
} );

// Close modal function
function closeModal() {
	modal.style.display = 'none';
	modalVideo.src = ''; // Reset video source to stop loading
}

// Mobile journey

const pointers = document.querySelectorAll( '.pointer' );
const infoBox = document.getElementById( 'infoBox' );
const infoContent = document.getElementById( 'infoContent' );

// Content for each year
const yearData = {
	2018: '2018: The foundation year...',
	2019: '2019: The planning year...',
	2020: '2020: The PAUSE...',
	2021: '2021: The year of ...',
	2022: '2022: Visit the White Board - Draft new strategy...',
	2023: '2023: Catch Speed - Year of Momentum...',
	2024: '2024: Year of Innovation and Collaboration...',
};

// Colors for each pointer's click
const yearColors = {
	2018: 'lightblue',
	2019: 'lightgreen',
	2020: 'orange',
	2021: 'purple',
	2022: 'cyan',
	2023: 'pink',
	2024: 'yellow',
};

// Function to set a pointer as active
function setActivePointer( year ) {
	pointers.forEach( ( p ) => p.classList.remove( 'active' ) );
	const activePointer = document.querySelector(
		`.pointer[data-year="${ year }"]`
	);
	activePointer.classList.add( 'active' );
	infoContent.innerHTML = contentData[ year ].content;
	infoBox.style.backgroundColor = contentData[ year ].bgColor;
}

// Set 2024 as the default active pointer on page load
document.addEventListener( 'DOMContentLoaded', () => {
	setActivePointer( '2024' );
} );

// Add event listener to each pointer
pointers.forEach( ( pointer ) => {
	pointer.addEventListener( 'click', function () {
		const year = this.getAttribute( 'data-year' );
		setActivePointer( year );
	} );
} );
