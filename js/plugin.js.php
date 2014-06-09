<?php
// get template params

?>

<script type="text/javascript">
    //  Avoid `console` errors in browsers that lack a console.
    (function() {
        var method;
        var noop = function () {};
        var methods = [
            'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
            'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
            'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
            'timeStamp', 'trace', 'warn'
        ];
        var length = methods.length;
        var console = (window.console = window.console || {});

        while (length--) {
            method = methods[length];

            // Only stub undefined methods.
            if (!console[method]) {
                console[method] = noop;
            }
        }
    }());

    // classie js
    var sidebarLeft = document.getElementById('sidebar-s1'),
        sidebarRight = document.getElementById('sidebar-s2'),
        showLeftPush = document.getElementById('showLeftPush'),
        showRightPush = document.getElementById('showRightPush'),
        body = document.body;

    showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'sidebar-push-toright');
        classie.toggle(sidebarLeft, 'sidebar-open');
        disableOther('showLeftPush');
    };

    showRightPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'sidebar-push-toleft');
        classie.toggle(sidebarRight, 'sidebar-open');
        disableOther('showRightPush');
    };

    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
        if (button !== 'showRightPush') {
            classie.toggle(showRightPush, 'disabled');
        }
    }

    // responsive slideshow von viljamis
    <?php if ($this->countModules('slideshow')): ?>
    jQuery(window).load(function() {
        jQuery("#slider").responsiveSlides({
            auto: true,
            pager: false,
            //manualControls: '#slider-pager',
            nav: true,
            speed: 1200,
            namespace: "transparent-btns"
        });
    });
    <?php endif; ?>

    //  abstände
    jQuery(document).ready( function() {
        var $paragraph = jQuery("p");
        $paragraph.has("img")
            .css({"margin-top": ".75em","margin-bottom": "1.5em","text-indent": "0px"})
            .addClass("bild");
        $paragraph.has("button").css({
            "margin-top": ".75em",
            "margin-bottom": ".75em",
            "text-indent": "0px"});
    });

    // go to top
    jQuery(document).ready(function() {
        var offset = 220;
        var duration = 500;
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.go-top').fadeIn(duration);
            } else {
                jQuery('.go-top').fadeOut(duration);
            }
        });

        jQuery('.go-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });

    //  google analytics id
    var _gaq=[['_setAccount','UA-22101886-3'],['_trackPageview']];
        _gaq.push (['_gat._anonymizeIp']);

    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'));

</script>

