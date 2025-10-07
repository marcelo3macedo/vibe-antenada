document.addEventListener('DOMContentLoaded', function() {
    
    const swiper = new Swiper('#main-swiper', {
        
        effect: 'slide',
        slidesPerView: "auto",
        loop: true,
        centeredSlides: true,
        spaceBetween: 30,
        grabCursor: true,
        
        keyboard: {
            enabled: true,
        },
        mousewheel: true,
        
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
        
    });

    const prevButton = document.getElementById('carousel-prev');
    const nextButton = document.getElementById('carousel-next');
    
    if (prevButton && nextButton) {
        prevButton.addEventListener('click', () => swiper.slidePrev());
        nextButton.addEventListener('click', () => swiper.slideNext());
    }
});