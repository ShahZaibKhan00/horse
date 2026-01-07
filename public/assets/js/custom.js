gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
ScrollSmoother.create({
    smooth: 1,
    effects: true,
});

document.querySelectorAll(".seller_detail_card").forEach((card) => {
    const slider = card.querySelector(".horse_swiper_one");
    const nextBtn = card.querySelector(".horse_arrow.right");
    const prevBtn = card.querySelector(".horse_arrow.left");

    // Initialize a separate Swiper instance for each card
    new Swiper(slider, {
        loop: true,
        navigation: {
            nextEl: nextBtn,
            prevEl: prevBtn,
        },
    });
});


document.querySelectorAll(".img_box").forEach((box) => {
    let slider = box.querySelector(".horse_list_card_slider");

    // Initialize Swiper without autoplay initially
    let swiperInstance = new Swiper(slider, {
        loop: true,
        navigation: {
            nextEl: box.querySelector(".horse_arrow_right"),
            prevEl: box.querySelector(".horse_arrow_left"),
        },
        autoplay: false,
    });

    // Start autoplay on hover
    box.addEventListener("mouseenter", () => {
        swiperInstance.params.autoplay = { delay: 1500 };
        swiperInstance.autoplay.start();
    });

    // Stop autoplay when mouse leaves
    box.addEventListener("mouseleave", () => {
        swiperInstance.autoplay.stop();
    });
});

let counter = document.querySelector('#counter');
if (counter) {
    var a = 0;
    $(window).scroll(function () {
        var oTop = $(counter).offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-value').each(function () {
                var $this = $(this), countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                },
                    {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(this.countNum);
                            //alert('finished');
                        }
                    });
            });
            a = 0;
        }
    });
}


document.addEventListener("DOMContentLoaded", function () {
    const checkboxOne = document.getElementById("form_check_one");
    const checkboxTwo = document.getElementById("form_check_two");
    const submitBtn = document.getElementById("submit_btn");
    function toggleSubmitButton() {
        submitBtn.disabled = !(checkboxOne.checked && checkboxTwo.checked);
    }
    // Add event listeners to both checkboxes
    checkboxOne.addEventListener("change", toggleSubmitButton);
    checkboxTwo.addEventListener("change", toggleSubmitButton);
});

window.addEventListener("load", function () {
    setTimeout(function () {
        let preloader = document.getElementById("preloader");
        preloader.classList.add("preloader-hide"); // Add fade-out effect
        setTimeout(() => {
            preloader.style.display = "none"; // Remove from DOM after fade
        }, 800); // Matches transition duration
    }, 1000); // Keep loader visible for 1 second
});

var hamBurger = document.querySelector('.hamBurger');
var responsive_menu = document.querySelector('.responsive_menu');
hamBurger.addEventListener('click', () => {
    responsive_menu.classList.toggle('openMenu');
});

////////////////ADD DYNAMIC HEIGH IN CART
// let cartEffect = document.querySelector('.cartEffect');
let cartWrap = document.querySelector('.cartWrap');
let cartBody = document.querySelector('.cartBody');
let clsBtn = document.querySelectorAll('.clsBtn');
// let body = document.querySelector('.body');
let cartHeader = document.querySelector('.cartHeader').offsetHeight;
let cartFooterHeight = document.querySelector('.cartFooter').offsetHeight;
let shopingBtn = document.querySelector('.shopingBtn');
cartBody.style.height = `calc(100vh - ${cartHeader + cartFooterHeight}px)`;
shopingBtn.addEventListener('click', () => {
    cartWrap.style.right = "0%";
    cartEffect.style.opacity = "1";
    cartEffect.style.zIndex = "9999";
    body.style.overflow = "hidden";
});
clsBtn.forEach((item) => {
    item.addEventListener('click', () => {
        cartWrap.style.right = "-200%";
        cartEffect.style.opacity = "0";
        cartEffect.style.zIndex = "-1";
        body.style.overflow = "auto";
    });
});

////////////////ADD DYNAMIC HEIGH IN CART



var incrementPlus;
var incrementMinus;

var buttonPlus = jQuery(".cart-qty-plus");
var buttonMinus = jQuery(".cart-qty-minus");

var incrementPlus = buttonPlus.click(function () {
    var $n = jQuery(this)
        .parent(".button-myQuantity")
        .parent(".myQuantity")
        .find(".qty");
    $n.val(Number($n.val()) + 1);
});

var incrementMinus = buttonMinus.click(function () {
    var $n = jQuery(this)
        .parent(".button-myQuantity")
        .parent(".myQuantity")
        .find(".qty");
    var amount = Number($n.val());
    if (amount > 1) {
        $n.val(amount - 1);
    }
});

////////////////QUANTITY INC DEC
document.addEventListener('click', function (event) {
    const plusButton = event.target.closest('.plus');
    const minusButton = event.target.closest('.minus');

    if (plusButton) {
        updateQuantity(1);
    } else if (minusButton) {
        updateQuantity(-1);
    }
});

let qty = 1;
let quantityInput = document.querySelectorAll('.quantity_input');

function updateQuantity(change) {
    qty += change;
    qty = Math.max(1, qty); // Ensure quantity is never less than 1

    if (qty === 1) {
        document.querySelectorAll('.minus').forEach(item => {
            item.style.pointerEvents = 'none';
            item.style.opacity = '0.5';
        });
    } else {
        document.querySelectorAll('.minus').forEach(item => {
            item.style.pointerEvents = 'auto';
            item.style.opacity = '1';
        });
    }
    quantityInput.forEach((item) => {
        item.value = qty;
    });
}



var top_nav = jQuery('.top_nav').html();
jQuery('.responsive_menu .clm_wrap').append(top_nav);

var sec_menu = jQuery('.second_menu_clm').html();
jQuery('.responsive_menu .clm_wrap').append(sec_menu);

$('.service_btn a').click(function () {
    $(this).parent().toggleClass('openService');
    $(this).next().slideToggle();
});

$(function () {
    var url = window.location.pathname;
    var activePage = url.substring(url.lastIndexOf('/') + 1);
    $('.navigation li a').each(function () {
        var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1);
        if (activePage == linkPage) {
            $(this).addClass('active');
        }
    });
});

jQuery(".tech_slider").owlCarousel({
    autoplay: true,
    rewind: false, /* use rewind if you don't want loop */
    margin: 20,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: false,
    dots: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        717: {
            items: 3
        },
        1200: {
            items: 6
        }
    }
});

jQuery(".book_slider").owlCarousel({
    autoplay: true,
    rewind: false, /* use rewind if you don't want loop */
    margin: 0,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: false,
    dots: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1024: {
            items: 3
        },
        1366: {
            items: 3
        }
    }
});

jQuery(".related_products_slider").owlCarousel({
    autoplay: true,
    rewind: false, /* use rewind if you don't want loop */
    margin: 20,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: false,
    dots: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1024: {
            items: 3
        },
        1366: {
            items: 4
        }
    }
});







$('.proDetail_for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.proDetail_nav',
    adaptiveHeight: true
});

$('.proDetail_nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.proDetail_for',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                vertical: false,
                verticalSwiping: false,
            }
        }
    ]

});


