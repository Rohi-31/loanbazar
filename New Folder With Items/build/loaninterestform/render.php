<!-- Apply Online -->
<section class="applyonline">
    <div class="container">
        <div class="applyonline__inner">
            <div class="applyonline__content">
                <div class="applyonline__close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                        <path d="M0.94118 0.45305C1.3317 0.0625252 1.96487 0.0625252 2.35539 0.45305L20.0331 18.1307C20.4236 18.5212 20.4236 19.1544 20.0331 19.5449C19.6425 19.9355 19.0094 19.9355 18.6189 19.5449L0.941179 1.86726C0.550655 1.47674 0.550655 0.843574 0.94118 0.45305Z" fill="#040018"></path>
                        <path d="M0.933518 19.5488C0.542994 19.1582 0.542994 18.5251 0.933518 18.1345L18.6112 0.456871C19.0017 0.0663466 19.6349 0.0663471 20.0254 0.456871C20.4159 0.847396 20.4159 1.48056 20.0254 1.87108L2.34773 19.5488C1.95721 19.9393 1.32404 19.9393 0.933518 19.5488Z" fill="#040018"></path>
                    </svg>
                </div>
                <h2 class="applyonline__title h2_title">Apply Online</h2>
                <div id="loan-interest-rates-form">
                    <?php echo do_shortcode('[formidable id=13]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle form fields behavior
    const inputs = document.querySelectorAll('#loan-interest-rates-form .frm_form_field input, #loan-interest-rates-form .frm_form_field textarea, #loan-interest-rates-form .frm_form_field select');

    inputs.forEach(input => {
        // Hide label on focus
        input.addEventListener('focus', function() {
            const label = input.closest('.frm_form_field').querySelector('.frm_primary_label');
            if (label) {
                label.style.display = 'none';
            }
        });

        // Show label on blur if field is empty
        input.addEventListener('blur', function() {
            const label = input.closest('.frm_form_field').querySelector('.frm_primary_label');
            if (label && input.value === '') {
                label.style.display = '';
            }
        });
    });

    // Handle popup functionality
    const claimButtons = document.querySelectorAll('.claim-btn');
    const applyonline = document.querySelector('.applyonline');
    const applyonlineClose = document.querySelector('.applyonline__close');
    const body = document.querySelector('body');

    // Open popup when claim button is clicked
    claimButtons.forEach(btn => {
        btn.addEventListener('click', function(event) {
            event.preventDefault();
            
        
                // Get lender and ROI data from the clicked row
                const row = this.closest('tr');
                const lender = row.querySelector('td:first-child').textContent.trim();
                console.log('lender',lender);
                const roi = row.querySelector('td:nth-child(2)').textContent.split('%')[0].trim();
                console.log('roi',roi);

                // Update form fields directly if they exist
                const lenderField = document.getElementById('field_lender2'); // Replace with the actual ID for the lender field
                const roiField = document.getElementById('field_roi2'); // Using the ID for the ROI field

                if (lenderField) lenderField.value = lender;
                if (roiField) roiField.value = roi;

                // Store values in session storage as backup
                sessionStorage.setItem('selected_lender', lender);
                sessionStorage.setItem('selected_roi', roi);

                // Show popup
                applyonline.classList.add('active');
                body.classList.add('no-scroll');
            });
    });

    // Close popup when close button is clicked
    if (applyonlineClose) {
        applyonlineClose.addEventListener('click', closePopup);
    }

    // Close popup when clicking outside
    applyonline?.addEventListener('click', function(event) {
        if (event.target === applyonline) {
            closePopup();
        }
    });

    // Close popup with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && applyonline.classList.contains('active')) {
            closePopup();
        }
    });

    function closePopup() {
        applyonline.classList.remove('active');
        body.classList.remove('no-scroll');
        resetForm();
    }

    function resetForm() {
        const form = document.querySelector('#loan-interest-rates-form form');
        if (form) {
            form.reset();
            // Reset labels visibility
            const labels = form.querySelectorAll('.frm_primary_label');
            labels.forEach(label => {
                label.style.display = '';
            });
            
            // Clear any validation messages
            const errorMessages = form.querySelectorAll('.frm_error');
            errorMessages.forEach(error => error.remove());
            
            // Remove any error classes
            const errorFields = form.querySelectorAll('.frm_error_style');
            errorFields.forEach(field => field.classList.remove('frm_error_style'));
        }
    }
});
</script>