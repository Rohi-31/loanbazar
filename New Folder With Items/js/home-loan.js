let swiper = new Swiper(".scrolling-slider", {
    direction: "vertical",
    spaceBetween: 42,
    slidesPerView: 1,
    loop: false,
    speed: 2000,
    autoplay: {
      delay: 8000,
      disableOnInteraction: false,
      },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
});

const checkboxes = document.querySelectorAll('.compare__checkbox');
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            this.parentElement.classList.add('active');
        } else {
            this.parentElement.classList.remove('active');
        }
    });
});
const faqItems = document.querySelectorAll('.faq__item');
faqItems.forEach(item => {
    const top = item.querySelector('.faq__item-top');
    top.addEventListener('click', function() {
        item.classList.toggle('active');
    });
});
