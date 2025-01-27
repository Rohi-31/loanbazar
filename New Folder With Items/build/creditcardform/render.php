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
        <h2 class="applyonline__title">Apply Online</h2>

        <?php echo do_shortcode('[formidable id=3]'); ?>

      </div>
    </div>
  </div>
</section>
<script>
  // hide form placehoolder when start typing
  document.addEventListener('DOMContentLoaded', function() {
    // Select all input and textarea fields within Formidable Forms
    const inputs = document.querySelectorAll('.frm_form_field input, .frm_form_field textarea, .frm_form_field select');

    inputs.forEach(input => {
      input.addEventListener('focus', function() {
        const label = input.closest('.frm_form_field').querySelector('.frm_primary_label');
        if (label) {
          label.style.display = 'none'; // Hide the label (placeholder) when focused
        }
      });

      input.addEventListener('blur', function() {
        const label = input.closest('.frm_form_field').querySelector('.frm_primary_label');
        if (label && input.value === '') {
          label.style.display = ''; // Show the label (placeholder) again if the input is empty
        }
      });
    });
  });


  // Handle the popup
  const popupBtn = document.querySelectorAll('.credit_apply_online');
  if (popupBtn.length > 0) {
    const applyonline = document.querySelector('.applyonline');
    const applyonlineClose = document.querySelector('.applyonline__close');
    const body = document.querySelector('body');

    popupBtn.forEach(btn => {
      btn.addEventListener('click', function() {
        applyonline.classList.add('active');
        body.classList.add('no-scroll');
      });
    });

    applyonlineClose.addEventListener('click', function() {
      applyonline.classList.remove('active');
      body.classList.remove('no-scroll');

    });
  }
</script>