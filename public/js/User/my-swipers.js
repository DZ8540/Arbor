// banner on home page
var swiper = new Swiper(".swiper-banner", {
    spaceBetween: 6,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// news slider on home and news pages
var swiper = new Swiper('.swiper-news', {
    slidesPerView: 1,
    spaceBetween: 30,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        378: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        992: {
            slidesPerView: 4,
            spaceBetween: 15
        },
        1200: {
            slidesPerView: 4
        },
        1660: {
            slidesPerView: 5,
            spaceBetween: 30
        },
    },
});

// production slider on about company page
var swiper = new Swiper('.swiper-production', {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    centeredSlides: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 30
        },
        1400: {
            slidesPerView: 5,
            spaceBetween: 0

        }
    },
});

// new thumbs slider on new page
var galleryThumbs = new Swiper('.new-gallery-thumbs', {
    spaceBetween: 8,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    breakpoints: {
        768: {
            spaceBetween: 11
        },
    },
});

// new top slider on new page
var galleryTop = new Swiper('.new-gallery-top', {
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: galleryThumbs
    }
});

// card thumbs slider on card page
var galleryThumbs = new Swiper('.card-gallery-thumbs', {
    direction: 'vertical',
    spaceBetween: 6,
    slidesPerView: 3,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    breakpoints: {
        320: {
            slidesPerView: 3
        },
        640: {
            slidesPerView: 3
        },
        992: {
            spaceBetween: 15
        },
        1200: {
            spaceBetween: 10
        }
    }
});

// card top slider on card page
var galleryTop = new Swiper('.card-gallery-top', {
    direction: 'vertical',
    spaceBetween: 10,
    thumbs: {
        swiper: galleryThumbs,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }
});