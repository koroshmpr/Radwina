import $ from "jquery";
require('./bootstrap');
import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import Search from "./search";

$(document).ready(function () {
        $(".nav-pills > button").hover(function () {
            let megaMenu = $(this).children("button")
            if (!megaMenu.hasClass('active')) {
                megaMenu.addClass("active")
            }
        })
        $(window).scroll(function () { // check if scroll event happened
            if ($(document).scrollTop() > 30) { // check if user scrolled more than 50 from top of the browser window
                $('.backTo_Top').removeClass('outro');

            } else {
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
        });

    });
    const search = new Search();
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
    window.addEventListener('scroll', function () {
        toggleScrollClass();
    });
    const swiper = new Swiper('.hero_swiper', {
        // Optional parameters
        loop: true,
        effect: 'slide',
        speed: 500,
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
    const swiper3 = new Swiper('.related_swiper', {
        // Optional parameters
        loop: true,
        effect: 'slide',
        autoplay: {
            delay: 3000,
        },
        speed: 1500,
        slidesPerView: 1.4,
        spaceBetween: 15,
        centeredSlides: true,
        breakpoints: {
            992: {
                slidesPerView: 6,
                centeredSlides: false,

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
        effect: 'slide',
        grabCursor :true,
        speed: 1000,
        autoplay: {
            delay: 5000,
        },
        slidesPerView: 1,
        spaceBetween: 0,
        pagination: {
            el: '.shop-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.shop-button-next',
            prevEl: '.shop-button-prev',
        },
        disableOnInteraction: false,
    });
    const swiper7 = new Swiper('.product_swiper', {
        // Optional parameters
        loop: false,
        effect: 'slide',
        speed: 1000,
        slidesPerView: 1.3,
        centeredSlides: false,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
        },
        breakpoints: {
            992: {
                slidesPerView: 4,
            }
        },
        // disableOnInteraction: false,
    });
    const swiper8 = new Swiper('.product_image_swiper', {
        loop: false,
        effect: 'slide',
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 0,
        centeredSlides: false,
        direction: 'horizontal',
        pagination: {
            el: '.swiper-pagination',
            clickable: true
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

    let increaseBtn = document.getElementById('increase-product-btn');
    let decreaseBtn = document.getElementById('decrease-product-btn');
    if (increaseBtn || decreaseBtn) {
        let step = document.getElementById('quantity-input-box').getAttribute('data-step');
        let stepNum = Number(step);
        let minQuantity = stepNum;
        let currentQuantity = stepNum;
        function updateQuantityDisplay() {
            document.getElementById('product-count').innerText = currentQuantity;
            document.getElementById('product-quantity').value = currentQuantity;
        }

        function updateButtonState() {
            decreaseBtn.disabled = currentQuantity <= minQuantity;
            // document.getElementById('increase-product-btn').disabled = currentQuantity >= maxQuantity;
        }

        function handleQuantityChange(change) {
            currentQuantity += change;
            updateQuantityDisplay();
            updateButtonState();
        }

        decreaseBtn.addEventListener('click', function () {
            if (stepNum === 1 || currentQuantity >= 10) {
                handleQuantityChange(-1);
            } else {
                if (currentQuantity <= 9) {
                    let negativeStepNum = -stepNum;
                    handleQuantityChange(negativeStepNum);
                }
            }
        });


        increaseBtn.addEventListener('click', function () {
            if (stepNum === 1 || currentQuantity >= 9) {
                handleQuantityChange(1);
            } else {
                handleQuantityChange(stepNum);
            }
        });


        // Initial setup
        updateQuantityDisplay();
        updateButtonState();

    }
    var cartQuantityInputs = document.querySelectorAll('.cart_quantity_input');

    if (cartQuantityInputs.length > 0) {
        let stepSize = cartQuantityInputs.getAttribute('step'); // Set a default step size, or retrieve it from somewhere if needed
        let minQuantity = 3;

        function updateQuantityStep(event) {
            var currentQuantity = parseInt(event.target.value, 10);
            var newStep = (currentQuantity < 10) ? stepSize : '1';
            event.target.step = newStep;
        }

        // Add an event listener to each quantity input to update the step attribute on input change
        cartQuantityInputs.forEach(function (input) {
            input.addEventListener('input', updateQuantityStep);
        });

        // Initial setup for all inputs
        cartQuantityInputs.forEach(function (input) {
            updateQuantityStep({ target: input }); // Call the function to set the initial step
        });
    }

})