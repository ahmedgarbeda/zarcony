/*global $, document, window */

/* Nice Scroll
===============================*/
/* Home-Scroll */
$(document).ready(function () {

    "use strict";

	$("html").niceScroll({
        scrollspeed: 60,
        mousescrollstep: 35,
        cursorwidth: 5,
        cursorcolor: '#000',
        cursorborder: 'none',
        background: 'rgba(255,255,255,0.3)',
        cursorborderradius: 3,
        autohidemode: false,
        cursoropacitymin: 0.1,
        cursoropacitymax: 1,
        zindex: "99999",
        horizrailenabled: false
	});
});


$(document).ready(function () {
    "use strict";
    var product_carousel =  $(".product-carousel");
    if (product_carousel.length) {
        product_carousel.owlCarousel({
            items : 6,
            itemsDesktopSmall : [979, 4],
            itemsDesktop : [1199, 5],
            itemsTablet : [767, 3],
            itemsTabletSmall : [570, 2],
            itemsMobile : [390, 1],
            navigation : true,
            pagination : false,
            autoPlay : true,
            loop : true,
            navigationText: ["<i class='fa fa-chevron-right'></i>", "<i class='fa fa-chevron-left'></i>"]
        });
    }

    var product_carousel =  $(".product-orders");
    if (product_carousel.length) {
        product_carousel.owlCarousel({
            items : 3,
            itemsDesktopSmall : [979, 3],
            itemsDesktop : [1199, 3],
            itemsTablet : [767, 2],
            itemsTabletSmall : [570, 1],
            itemsMobile : [390, 1],
            navigation : true,
            pagination : false,
            // rtl:true,
            autoPlay : true,
            loop : true,
            navigationText: ["<i class='fa fa-chevron-right'></i>", "<i class='fa fa-chevron-left'></i>"]
        });
    }

    var today_offer_carousel =  $("#today-offer-carousel");
    if (today_offer_carousel.length) {
        today_offer_carousel.owlCarousel({
            items : 2,
            itemsDesktopSmall : [979, 2],
            itemsDesktop : [1199, 2],
            itemsMobile : [767, 1],
            navigation : true,
            pagination : false,
            autoPlay : true,
            loop : true,
            navigationText: ["<i class='fa fa-chevron-right'></i>", "<i class='fa fa-chevron-left'></i>"]
        });
    }

});


$(document).ready(function () {
    "use strict";

    $("[data-countdown]").each(function () {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function (event) {
            $this.html(event.strftime('<div class="box-time-date second"><div class="box-time-date-inner"><span class="time-num">%-S</span>ثانية</div></div> <div class="box-time-date minutes"><div class="box-time-date-inner"><span class="time-num">%-M</span> دقيقة</div></div> <div class="box-time-date hour"><div class="box-time-date-inner"><span class="time-num">%-H</span>ساعة</div></div> <div class="box-time-date day"> <div><div class="box-time-date-inner"><span class="time-num">%-D</span>يوم</div></div>'));
        });
    });

});

/* Overlay */
$(document).ready(function () {
    "use strict";
    $(".overlay-drop").on("click", function (e) {
        e.preventDefault();
        $("#overlay").toggleClass("in");

        $("#overlay").on('click', function () {
            $("#overlay").removeClass("in");
            $(".navbar-collapse.collapse").removeClass("show");
        });
    });
});


/*Flex Slider
============================= */
$(window).load(function () {
  // The slider being synced must be initialized first
    "use strict";
    $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        directionNav: true,
        prevText: "<i class='fa fa-chevron-left'></i>",
        nextText: "<i class='fa fa-chevron-right'></i>",
        animationLoop: false,
        slideshow: false,
        maxItem: 5,
        itemWidth: 80,
        itemMargin: 15,
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        directionNav: false,
        sync: "#carousel"
    });
});

/* Product Number Counter
====================================*/
$(document).ready(function () {
    'use strict';

    $('.number-up').on('click', function () {
        var $value = ($(this).closest('.product-counter').find('input[type="text"]').val());
        $(this).closest('.product-counter').find('input[type="text"]').val(parseFloat($value) + 1).attr('value', parseFloat($value) + 1);
        return false;
    });

    $('.number-down').on('click', function () {
        var $value = ($(this).closest('.product-counter').find('input[type="text"]').val());
        if ($value > 1) {
            $(this).closest('.product-counter').find('input[type="text"]').val(parseFloat($value) - 1).attr('value', parseFloat($value) - 1);
        }
        return false;
    });


    $('.product-counter').find('input[type="text"]').on('keyup', function () {
        $(this).attr('value', $(this).val());
    });


    // const img = document.getElementsByTagName("img")
    // $('img').on('error', function (e) {
    //     $(this).attr('src', 'http://eshtry-design.dobzo.com/images/products/product_02.svg')
    //     e.onerror = null
    // })


    // Source: js/widgets/notify.js
    var _notify_container = false;
    var _notifies = [];

    var Notify = {

        _container: null,
        _notify: null,
        _timer: null,

        version: "3.0.0",

        options: {
            icon: '', // to be implemented
            caption: '',
            content: '',
            shadow: true,
            width: 'auto',
            height: 'auto',
            style: false, // {background: '', color: ''}
            position: 'right', //right, left
            timeout: 3000,
            keepOpen: false,
            type: 'default' //default, success, alert, info, warning
        },

        init: function(options) {
            this.options = $.extend({}, this.options, options);
            this._build();
            return this;
        },

        _build: function() {
            var that = this, o = this.options;

            this._container = _notify_container || $("<div/>").addClass("notify-container").appendTo('body');
            _notify_container = this._container;

            if (o.content === '' || o.content === undefined) {return false;}

            this._notify = $("<div/>").addClass("notify");

            if (o.type !== 'default') {
                this._notify.addClass(o.type);
            }

            if (o.shadow) {this._notify.addClass("shadow");}
            if (o.style && o.style.background !== undefined) {this._notify.css("background-color", o.style.background);}
            if (o.style && o.style.color !== undefined) {this._notify.css("color", o.style.color);}

            // add Icon
            if (o.icon !== '') {
                var icon = $(o.icon).addClass('notify-icon').appendTo(this._notify);
            }

            // add title
            if (o.caption !== '' && o.caption !== undefined) {
                $("<div/>").addClass("notify-title").html(o.caption).appendTo(this._notify);
            }
            // add content
            if (o.content !== '' && o.content !== undefined) {
                $("<div/>").addClass("notify-text").html(o.content).appendTo(this._notify);
            }

            // add closer
            var closer = $("<span/>").addClass("notify-closer").appendTo(this._notify);
            closer.on('click', function(){
                that.close(0);
            });

            if (o.width !== 'auto') {this._notify.css('min-width', o.width);}
            if (o.height !== 'auto') {this._notify.css('min-height', o.height);}

            this._notify.hide().appendTo(this._container).fadeIn('slow');
            _notifies.push(this._notify);

            if (!o.keepOpen) {
                this.close(o.timeout);
            }

        },

        close: function(timeout) {
            var self = this;

            if(timeout === undefined) {
                return this._hide();
            }

            setTimeout(function() {
                self._hide();
            }, timeout);

            return this;
        },

        _hide: function() {
            var that = this;

            if(this._notify !== undefined) {
                this._notify.fadeOut('slow', function() {
                    $(this).remove();
                    _notifies.splice(_notifies.indexOf(that._notify), 1);
                });
                return this;
            } else {
                return false;
            }
        },

        closeAll: function() {
            _notifies.forEach(function(notEntry) {
                notEntry.hide('slow', function() {
                    notEntry.remove();
                    _notifies.splice(_notifies.indexOf(notEntry), 1);
                });
            });
            return this;
        }
    };

    $.Notify = function(options) {
        return Object.create(Notify).init(options);
    };

    $.Notify.show = function(message, title, icon) {
        return $.Notify({
            content: message,
            caption: title,
            icon: icon
        });
    };


});
