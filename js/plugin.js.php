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
    jQuery(window).load( function() {
        var $paragraph = jQuery("p");
        $paragraph.has("img").css({
            "margin-top": ".75em",
            "margin-bottom": "1.5em",
            "text-indent": "0px"
        })
            .addClass("bild");
        $paragraph.has("button").css({
            "margin-top": ".75em",
            "margin-bottom": ".75em",
            "text-indent": "0px"
        });
        $paragraph.has("a").css({
            "text-indent": "0px"
        });
    });

    // go to top
    jQuery(window).load(function() {
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

    // typographic quotes
    (typeof('jQuery') == 'function' ? jQuery : function ( callback ) {
        var addListener = document.addEventListener || document.attachEvent,
            removeListener = document.removeEventListener ? "removeEventListener" : "detachEvent",
            eventName = document.addEventListener ? "DOMContentLoaded" : "onreadystatechange";

        addListener.call(document, eventName, function() {
            document[removeListener](eventName, arguments.callee, false);
            callback();
        }, false);
    })(function() {
        var root = document.body;
        var node = root.childNodes[0];
        while(node != null) {
            if(node.nodeType == 3) {
                node.nodeValue = node.nodeValue
                    .replace(/(\W|^)"(\S)/g, '$1\u201c$2') // beginning "
                    .replace(/(\u201c[^"]*)"([^"]*$|[^\u201c"]*\u201c)/g, '$1\u201d$2') // ending "
                    .replace(/([^0-9])"/g,'$1\u201d') // remaining " at end of word
                    .replace(/(\W|^)'(\S)/g, '$1\u2018$2') // beginning '
                    .replace(/([a-z])'([a-z])/ig, '$1\u2019$2') // conjunction's possession
                    .replace(/((\u2018[^']*)|[a-z])'([^0-9]|$)/ig, '$1\u2019$3') // ending '
                    .replace(/(\u2018)([0-9]{2}[^\u2019]*)(\u2018([^0-9]|$)|$|\u2019[a-z])/ig, '\u2019$2$3') // abbrev. years like '93
                    .replace(/(\B|^)\u2018(?=([^\u2019]*\u2019\b)*([^\u2019\u2018]*\W[\u2019\u2018]\b|[^\u2019\u2018]*$))/ig, '$1\u2019') // backwards apostrophe
                    .replace(/'''/g, '\u2034') // triple prime
                    .replace(/("|'')/g, '\u2033') // double prime
                    .replace(/'/g, '\u2032'); // prime
            }
            if(node.hasChildNodes() && node.firstChild.nodeName != "CODE") {
                node = node.firstChild;
            } else {
                do {
                    while(node.nextSibling == null && node != root) {
                        node = node.parentNode;
                    }
                    node = node.nextSibling;
                } while (node && (node.nodeName == "CODE" || node.nodeName == "SCRIPT" || node.nodeName == "STYLE"));
            }
        }
    });

    //  google analytics code asynchron + anonym
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-22101886-3']);
    _gaq.push(['_gat._anonymizeIp']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

