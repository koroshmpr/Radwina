import $ from "jquery";

require('./bootstrap');
import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import WOW from 'wow.js'
import Search from "./search";

const wow = new WOW(
    {
        boxClass: 'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 100,          // distance to the element when triggering the animation (default is 0)
        duration: .5,
        mobile: true,       // trigger animations on mobile devices (default is true)
        live: true,       // act on asynchronously loaded content (default is true)
        callback: function (box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null,    // optional scroll container selector, otherwise use window,
        resetAnimation: true,     // reset animation on end (default is true)
    }
);

wow.init();

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

$(document).ready(function () {
        $(".nav-pills > button").hover(function () {
            let megaMenu = $(this).children("button")
            if (!megaMenu.hasClass('active')) {
                megaMenu.addClass("active")
            }
        })
        $(window).scroll(function () { // check if scroll event happened
            if ($(document).scrollTop() > 30) { // check if user scrolled more than 50 from top of the browser window
                $('.site-header').addClass('bg-primary');
                $('.category-dropdown').addClass('bg-primary');
                $('.backTo_Top').removeClass('outro');

            } else {
                if (window.location.pathname == '/') {
                    $('.site-header').removeClass('bg-primary');
                    $('.category-dropdown').removeClass('bg-primary');
                }
                $('.backTo_Top').addClass('outro');
            }
        })
    }
);


document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#myTab a').forEach(function (everyitem) {

        var tabTrigger = new bootstrap.Tab(everyitem)
        everyitem.addEventListener('mouseenter', function () {
            tabTrigger.show();
            let tabContent = document.querySelectorAll('.tab-content');
            let tabPane = document.querySelectorAll('.tab-pane');
            let thisIndex = document.getElementById(this.href.split('#')[1])
            tabContent.forEach((el) => {
                if (!(el.hasAttribute('id') == thisIndex)) {
                    tabPane.removeClass('active')
                }
            })
            console.log(thisIndex)
            // console.log(thisIndex)
        });

    });
    const search = new Search();

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    //toggle header on time
    const toggleScrollClass = function () {
        if (window.scrollY > 24) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    }

    toggleScrollClass();

    //check scroll to take actions on it
    window.addEventListener('scroll', function () {
        toggleScrollClass();
    });

    const swiper = new Swiper('.hero_swiper', {
        // Optional parameters
        loop: true,
        effect: 'slide',
        speed: 2000,
        slidesPerView: 1,
        spaceBetween: 0,
        direction: 'horizontal',
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 10000,
        },
        disableOnInteraction: false,
    })
    const swiper2 = new Swiper('.testimonial_swiper', {
        // Optional parameters
        loop: true,
        effect: 'slide',
        speed: 3000,
        slidesPerView: 1.1,
        centeredSlides: true,
        spaceBetween: 10,
        // If we need pagination
        autoplay: true,
        breakpoints: {
            992: {
                slidesPerView: 4,
            }
        },
        // disableOnInteraction: false,
    });
    const swiper3 = new Swiper('.related_swiper', {
        // Optional parameters
        loop: true,
        effect: 'slide',
        autoplay: {
            delay: 3000,
        },
        speed: 3000,
        slidesPerView: 1.4,
        spaceBetween: 15,
        centeredSlides: true,
        breakpoints: {
            992: {
                slidesPerView: 5,
                centeredSlides: false,

            }
        },
        // disableOnInteraction: false,
    });
    const swiper4 = new Swiper('.category_swiper', {
        // Optional parameters
        loop: true,
        effect: 'slide',
        speed: 1000,
        slidesPerView: 2,
        spaceBetween: 15,
        autoplay: {
            delay: 3000,
        },
        breakpoints: {
            992: {
                slidesPerView: 6,
                centeredSlides: true,
                autoplay: false,

            }
        },
        // disableOnInteraction: false,
    });
    const swiper5 = new Swiper('.post_swiper', {
        // Optional parameters
        loop: true,
        effect: 'slide',
        speed: 1000,
        autoplay: {
            delay: 5000,
        },
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            992: {
                slidesPerView: 2,
                spaceBetween: 10,
                centeredSlides: false,

            }
        },
        // disableOnInteraction: false,
    });
    const swiper6 = new Swiper('.shop_swiper', {
        // Optional parameters
        loop: true,
        effect: 'fade',
        speed: 1000,
        autoplay: {
            delay: 5000,
        },
        slidesPerView: 1,
        spaceBetween: 0,
        // disableOnInteraction: false,
    });
    const swiper7 = new Swiper('.product_swiper', {
        // Optional parameters
        loop: false,
        effect: 'slide',
        speed: 1000,
        slidesPerView: 1,
        autoplay: {
            delay: 3000,
        },
        breakpoints: {
            992: {
                slidesPerView: 4,
                spaceBetween: 15,
                centeredSlides: false,
            }
        },
        // disableOnInteraction: false,
    });
    const swiper8 = new Swiper('.product_image_swiper', {
        loop: true,
        effect: 'slide',
        speed: 0,
        slidesPerView: 1,
        spaceBetween: 0,
        direction: 'horizontal',
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
        disableOnInteraction: false,
    });
    if (document.getElementById('product-count')) {
        let productCountEL = document.getElementById('product-count');
        let productCountInput = document.getElementById('product-quantity');
        const increaseBtn = document.getElementById('increase-product-btn');
        const decreaseBtn = document.getElementById('decrease-product-btn');
        let quantityInputBox = document.getElementById('quantity-input-box');
        let productCountNum = 1;

        function increaseValue() {
            productCountNum += 1;
            productCountEL.innerHTML = productCountNum;
            productCountInput.value = productCountNum;
            productCountNum === Number(quantityInputBox.dataset.max) && (increaseBtn.disabled = true);
            productCountNum > Number(quantityInputBox.dataset.min) && (decreaseBtn.disabled = false);
        }


        function decreaseValue() {
            if (productCountNum > Number(quantityInputBox.dataset.min)) {
                productCountNum -= 1;
                productCountEL.innerHTML = productCountNum;
                productCountInput.value = productCountNum;
            }
            productCountNum === Number(quantityInputBox.dataset.min) && (decreaseBtn.disabled = true);
            productCountNum < Number(quantityInputBox.dataset.max) && (increaseBtn.disabled = false);
        }

        increaseBtn.addEventListener('click', increaseValue);

        decreaseBtn.addEventListener('click', decreaseValue);
    }


})