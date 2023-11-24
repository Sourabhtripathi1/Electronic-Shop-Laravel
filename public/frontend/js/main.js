// (function ($) {
//     "use strict";

//     // Mobile Nav toggle
//     $(".menu-toggle > a").on("click", function (e) {
//         e.preventDefault();
//         $("#responsive-nav").toggleClass("active");
//     });

//     // Fix cart dropdown from closing
//     $(".cart-dropdown").on("click", function (e) {
//         e.stopPropagation();
//     });

//     /////////////////////////////////////////

//     // Products Slick
//     $(".products-slick").each(function () {
//         var $this = $(this),
//             $nav = $this.attr("data-nav");

//         $this.slick({
//             slidesToShow: 4,
//             slidesToScroll: 1,
//             autoplay: true,
//             infinite: true,
//             speed: 300,
//             dots: false,
//             arrows: true,
//             appendArrows: $nav ? $nav : false,
//             responsive: [
//                 {
//                     breakpoint: 991,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 1,
//                     },
//                 },
//                 {
//                     breakpoint: 480,
//                     settings: {
//                         slidesToShow: 1,
//                         slidesToScroll: 1,
//                     },
//                 },
//             ],
//         });
//     });

//     // Products Widget Slick
//     $(".products-widget-slick").each(function () {
//         var $this = $(this),
//             $nav = $this.attr("data-nav");

//         $this.slick({
//             infinite: true,
//             autoplay: true,
//             speed: 300,
//             dots: false,
//             arrows: true,
//             appendArrows: $nav ? $nav : false,
//         });
//     });

//     /////////////////////////////////////////

//     // Product Main img Slick
//     $("#product-main-img").slick({
//         infinite: true,
//         speed: 300,
//         dots: false,
//         arrows: true,
//         fade: true,
//         asNavFor: "#product-imgs",
//     });

//     // Product imgs Slick
//     $("#product-imgs").slick({
//         slidesToShow: 3,
//         slidesToScroll: 1,
//         arrows: true,
//         centerMode: true,
//         focusOnSelect: true,
//         centerPadding: 0,
//         vertical: true,
//         asNavFor: "#product-main-img",
//         responsive: [
//             {
//                 breakpoint: 991,
//                 settings: {
//                     vertical: false,
//                     arrows: false,
//                     dots: true,
//                 },
//             },
//         ],
//     });

//     // Product img zoom
//     var zoomMainProduct = document.getElementById("product-main-img");
//     if (zoomMainProduct) {
//         $("#product-main-img .product-preview").zoom();
//     }

//     /////////////////////////////////////////

//     // Input number
//     $(".input-number").each(function () {
//         var $this = $(this),
//             $input = $this.find('input[type="number"]'),
//             up = $this.find(".qty-up"),
//             down = $this.find(".qty-down");

//         down.on("click", function () {
//             var value = parseInt($input.val()) - 1;
//             value = value < 1 ? 1 : value;
//             $input.val(value);
//             $input.change();
//             updatePriceSlider($this, value);
//         });

//         up.on("click", function () {
//             var value = parseInt($input.val()) + 1;
//             value = value > 1000 ? 1000 : value;
//             $input.val(value);
//             $input.change();
//             updatePriceSlider($this, value);
//         });
//     });

//     var priceInputMax = document.getElementById("price-max"),
//         priceInputMin = document.getElementById("price-min");

//     priceInputMax.addEventListener("change", function () {
//         updatePriceSlider($(this).parent(), this.value);
//     });

//     priceInputMin.addEventListener("change", function () {
//         updatePriceSlider($(this).parent(), this.value);
//     });

//     function updatePriceSlider(elem, value) {
//         if (elem.hasClass("price-min")) {
//             console.log("min");
//             priceSlider.noUiSlider.set([value, null]);
//         } else if (elem.hasClass("price-max")) {
//             console.log("max");
//             priceSlider.noUiSlider.set([null, value]);
//         }
//     }

//     // Price Slider
//     var priceSlider = document.getElementById("price-slider");
//     if (priceSlider) {
//         noUiSlider.create(priceSlider, {
//             start: [1, 999],
//             connect: true,
//             step: 1,
//             range: {
//                 min: 1,
//                 max: 999,
//             },
//         });

//         priceSlider.noUiSlider.on("update", function (values, handle) {
//             var value = values[handle];
//             handle
//                 ? (priceInputMax.value = value)
//                 : (priceInputMin.value = value);
//         });
//     }
// })(jQuery);

$(document).ready(function () {
    "use strict";
    moveElementBasedOnWidth();
    // Mobile Nav toggle
    $(".menu-toggle > a").on("click", function (e) {
        e.preventDefault();
        $("#responsive-nav").toggleClass("active");
    });

    // Fix cart dropdown from closing
    $(".cart-dropdown").on("click", function (e) {
        e.stopPropagation();
    });

    /////////////////////////////////////////

    // Products Slick
    $(".products-slick").each(function () {
        var $this = $(this);
        var $nav = $this.attr("data-nav");

        $this.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            infinite: true,
            speed: 300,
            dots: false,
            arrows: true,
            appendArrows: $nav ? $nav : false,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
            ],
        });
    });

    // Products Widget Slick
    $(".products-widget-slick").each(function () {
        var $this = $(this);
        var $nav = $this.attr("data-nav");

        $this.slick({
            infinite: true,
            autoplay: true,
            speed: 300,
            dots: false,
            arrows: true,
            appendArrows: $nav ? $nav : false,
        });
    });

    /////////////////////////////////////////

    // Product Main img Slick
    $("#product-main-img").slick({
        infinite: true,
        speed: 300,
        dots: false,
        arrows: true,
        fade: true,
        asNavFor: "#product-imgs",
    });

    // Product imgs Slick
    $("#product-imgs").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: 0,
        vertical: true,
        asNavFor: "#product-main-img",
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    vertical: false,
                    arrows: false,
                    dots: true,
                },
            },
        ],
    });

    // Product img zoom
    var zoomMainProduct = document.getElementById("product-main-img");
    if (zoomMainProduct) {
        $("#product-main-img .product-preview").zoom();
    }

    /////////////////////////////////////////

    // Input number
    $(".input-number").each(function () {
        var $this = $(this);
        var $input = $this.find('input[type="number"]');
        var up = $this.find(".qty-up");
        var down = $this.find(".qty-down");

        down.on("click", function () {
            var value = parseInt($input.val()) - 1;
            value = value < 1 ? 1 : value;
            $input.val(value);
            $input.change();
            updatePriceSlider($this, value);
        });

        up.on("click", function () {
            var value = parseInt($input.val()) + 1;
            value = value > 1000 ? 1000 : value;
            $input.val(value);
            $input.change();
            updatePriceSlider($this, value);
        });
    });

    var priceInputMax = document.getElementById("price-max");
    var priceInputMin = document.getElementById("price-min");

    priceInputMax.addEventListener("change", function () {
        updatePriceSlider($(this).parent(), this.value);
    });

    priceInputMin.addEventListener("change", function () {
        updatePriceSlider($(this).parent(), this.value);
    });

    function updatePriceSlider(elem, value) {
        if (elem.hasClass("price-min")) {
            priceSlider.noUiSlider.set([value, null]);
        } else if (elem.hasClass("price-max")) {
            priceSlider.noUiSlider.set([null, value]);
        }
    }

    // Price Slider
    var priceSlider = document.getElementById("price-slider");
    if (priceSlider) {
        noUiSlider.create(priceSlider, {
            start: [1, 999999],
            connect: true,
            step: 1,
            range: {
                min: 1,
                max: 999999,
            },
        });

        priceSlider.noUiSlider.on("update", function (values, handle) {
            var value = values[handle];
            handle
                ? (priceInputMax.value = value)
                : (priceInputMin.value = value);
        });

        priceSlider.noUiSlider.on("slide", function (values, handle) {
            if (values[0] > 1 || values[1] < 999999) {
                $("#apply_filters").show();
            } else {
                $("#apply_filters").hide();
            }
        });
    }

    $(".category_check").change(function () {
        if (
            $(".category_check:checked").length > 0 ||
            $(".brand_checkbox:checked").length > 0
        ) {
            $("#apply_filters").show();
        } else {
            $("#apply_filters").hide();
        }
    });

    $(".brand_checkbox").change(function () {
        if (
            $(".category_check:checked").length > 0 ||
            $(".brand_checkbox:checked").length > 0
        ) {
            $("#apply_filters").show();
        } else {
            $("#apply_filters").hide();
        }
    });

    $("#price-max").on("change", function () {
        if ($(this).val() < 999) {
            $("#apply_filters").show();
        } else {
            $("#apply_filters").hide();
        }
    });

    $("#price-min").on("change", function () {
        if ($(this).val() > 1) {
            $("#apply_filters").show();
        } else {
            $("#apply_filters").hide();
        }
    });

    $("#apply_filters").click(function () {
        var categories = [];
        var brands = [];

        $(".category_check").each(function () {
            if (this.checked) {
                categories.push(this.value);
            }
        });

        $(".brand_checkbox").each(function () {
            if (this.checked) {
                brands.push(this.value);
            }
        });

        var maxPrice = $("#price-max").val();
        var minPrice = $("#price-min").val();

        var qry = {
            category: categories,
            brand: brands,
            price: { max: maxPrice, min: minPrice },
        };

        var qry2 = btoa(JSON.stringify(qry));

        window.location.href = `?query=${qry2}`;
    });

    $(window).resize(function () {
        moveElementBasedOnWidth();
    });

    $(".filter").click(function () {
        $(".innerFilter").toggleClass("hidden");
        $(".sign").toggleClass("hidden");
        $(".sign-").toggleClass("hidden");
    });

    addProductPagination();
    productPagination(1);

    $(".paginate-product").click(function ($this) {
        const page = parseInt($(this).data("page"));
        productPagination(page);
    });




});

function moveElementBasedOnWidth() {
    var screenWidth = $(window).width();

    if (screenWidth <= 991) {
        // Move the element to the destination container on small screens
        $("#aside").appendTo(".innerFilter");
        $("#filterSection").show();
    } else {
        // Move the element back to its original container on larger screens
        $("#aside").appendTo(".mainfilter");
        $("#filterSection").hide();
    }
}

function productPagination(page) {
    var itemsPerPage = 5;
    var products = $(".product_tab");

    $(".product_tab").each(function () {
        $(this).addClass("hidden");
    });

    var tot = products.length;

    const totalPages = Math.ceil(tot / itemsPerPage);

    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    for (let index = startIndex; index < endIndex; index++) {
        $(".product_tab").eq(index).removeClass("hidden");
    }

    var hidden = $(".product_tab.hidden").length;
    var visible = $(".product_tab:not(.hidden)");
    var i = 1;
    visible.each((index, item) => {
        if (i % 2 == 0) {
            $(item).after(`<div class="clearfix visible-sm visible-xs"></div>`);
        } else if (i % 3 == 0) {
            $(item).after(
                `<div class="clearfix visible-lg visible-md "></div>`
            );
        } else {
            console.log(i);
        }
        i++;
    });
}

function addProductPagination() {
    var cnt = 5;
    var products = $(".product_tab");

    var tot = products.length;

    const totalPages = Math.ceil(tot / cnt);

    for (let i = 1; i <= totalPages; i++) {
        $(".store-pagination").append(
            `<li><a href="#" class="page paginate-product"  data-page="${i}">${i}</a></li>`
        );
    }
}


