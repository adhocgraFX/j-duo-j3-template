<?php defined( '_JEXEC' ) or die; 

/**
 * @copyright	JDuo responsive template © 2014 adhocgraFX / Johannes Hock - All Rights Reserved.
 * @license		GNU/GPL
**/

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

// generator tag
$this->setGenerator(null);

// Add Joomla! JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add current user information
$user = JFactory::getUser();

// template css
$doc->addStyleSheet($tpath.'/css/j-template.css');

// modernizr mit html5-shiv must be in the head
$doc->addScript($tpath.'/js/modernizr.custom.min.js');

?>

<!doctype html>

<!-- modernizr -->
<!--[if IEMobile]> <html lang="<?php echo $this->language; ?>" class="iemobile"> <![endif]-->
<!--[if IE 8 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="<?php echo $this->language; ?>" class="no-js"><!--<![endif]-->

<head>

    <jdoc:include type="head" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="//brick.a.ssl.fastly.net/Fira+Sans:300,300i,400,400i,500,500i,700,700i">

    <!-- funktioniert: bildverkleinerung über mobify cdn -->
    <script>!function(a,b,c,d,e){function g(a,c,d,e){var f=b.getElementsByTagName("script")[0];a.src=e,a.id=c,a.setAttribute("class",d),f.parentNode.insertBefore(a,f)}a.Mobify={points:[+new Date]};var f=/((; )|#|&|^)mobify=(\d)/.exec(location.hash+"; "+b.cookie);if(f&&f[3]){if(!+f[3])return}else if(!c())return;b.write('<plaintext style="display:none">'),setTimeout(function(){var c=a.Mobify=a.Mobify||{};c.capturing=!0;var f=b.createElement("script"),h="mobify",i=function(){var c=new Date;c.setTime(c.getTime()+3e5),b.cookie="mobify=0; expires="+c.toGMTString()+"; path=/",a.location=a.location.href};f.onload=function(){if(e)if("string"==typeof e){var c=b.createElement("script");c.onerror=i,g(c,"main-executable",h,mainUrl)}else a.Mobify.mainExecutable=e.toString(),e()},f.onerror=i,g(f,"mobify-js",h,d)})}(window,document,function(){var a=/webkit|msie\s10|(firefox)[\/\s](\d+)|(opera)[\s\S]*version[\/\s](\d+)|3ds/i.exec(navigator.userAgent);return a?a[1]&&+a[2]<4?!1:a[3]&&+a[4]<11?!1:!0:!1},
    // path to mobify.js
            "//cdn.mobify.com/mobifyjs/build/mobify-2.0.0.min.js",
    // calls to APIs go here
            function() {
                var capturing = window.Mobify && window.Mobify.capturing || false;
                if (capturing) {
                    Mobify.Capture.init(function(capture){
                        var capturedDoc = capture.capturedDoc;
                        var images = capturedDoc.querySelectorAll("img, picture");
                        Mobify.ResizeImages.resize(images);
                        // Render source DOM to document
                        capture.renderCapturedDoc();
                    });
                }
            });
    </script>

    <!-- funktioniert, wenn der provider mitspielt: squeezr adaptive images solution
    <script type="text/javascript" id="squeezr" data-breakpoints-images="480,768,1024">
      (function(a){function h(){for(var f,a=0,b=d.cookie.split(";"),c=/^\ssqueezr\.([^=]+)=(.*?)\s*$/,e={};b.length>a;++a)(f=b[a].match(c))&&(e[f[1]]=f[2]);return e}function i(a){a=Math.max(parseFloat(a||1,10),.01);var c=d.documentElement,f=function(){var a=d.createElement("div"),b={width:"1px",height:"1px",display:"inline-block"};for(var c in b)a.style[c]=b[c];return a},g=d.createElement("div"),h=g.appendChild(f());g.appendChild(f()),c.appendChild(g);for(var i=g.clientHeight,j=Math.floor(e/i),k=j/2,l=0,m=[j];1e3>l++&&(Math.abs(k)>a||g.clientHeight>i);)j+=k,h.style.width=j+"em",k/=(g.clientHeight>i?1:-1)*(k>0?-2:2),m.push(j);return c.removeChild(g),j}function j(a){for(var g,c=0,d=(a||"").split(","),e=/(\d+(?:\.\d+)?)(px)?/i,f=[];d.length>c;++c)(g=d[c].match(e))&&f.push(parseFloat(g[1],10));return f.sort(function(a,b){return a-b})}function k(){return"devicePixelRatio"in a?a.devicePixelRatio:"deviceXDPI"in a&&"logicalXDPI"in a?a.deviceXDPI/a.logicalXDPI:1}if(navigator.cookieEnabled)for(var b="squeezr",c=";path=/",d=document,e=a.innerWidth,f=screen.width,g=screen.height,m=0,n=d.getElementsByTagName("script");n.length>m;++m)if(n[m].id==b){var o=k(),p="-";if(d.cookie=b+".screen="+f+"x"+g+"@"+o+c,!n[m].getAttribute("data-disable-images")){var q=j(n[m].getAttribute("data-breakpoints-images")),r=Math.max(f,g),s=null;do{if(r>(s=q.pop()))break;p=s*o+"px"}while(q.length)}d.cookie=b+".images="+p+c;var t=h(),u=t.css||"-";if(!("css"in t&&t.css&&"-"!=t.css||n[m].getAttribute("data-disable-css"))){var v=e/i(parseFloat(n[m].getAttribute("data-em-precision")||.5,10)/100);u=f+"x"+g+"@"+Math.round(10*v)/10}d.cookie=b+".css="+u+c;break}})(this);
    </script> -->

    <link rel="shortcut icon" href="<?php echo $tpath; ?>/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png">

</head>
  
<body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?> sidebar-push">

<div class="wrapper block-group">

    <header role="banner">
        <button id="showLeftPush"></button>
        <div class="logo-text">
            <a href="<?php echo $this->baseurl ?>">
                <h1>adhocgraFX</h1>
            </a>
        </div>
        <button id="showRightPush"></button>
    </header>

    <nav class="sidebar" id="sidebar-s1" role="navigation">
        <div class="logo-image">
            <a href="<?php echo $this->baseurl ?>">
                <img src="<?php echo $tpath ?>/images/logo-adhoc-2.png"  alt="adhocgraFX" />
            </a>
        </div>
        <jdoc:include type="modules" name="nav" />
    </nav>

    <?php if ($this->countModules('slideshow')): ?>
        <section class="rslides_container hide-on-mobile" role="complementary">
            <jdoc:include type="modules" name="slideshow" />
        </section>
    <?php endif; ?>

    <?php if ($this->countModules('top_row')): ?>
        <section class="top" role="complementary">
            <jdoc:include type="modules" name="top_row" style="jduo" />
        </section>
    <?php endif; ?>

    <section class="wrapper-push">
        <div class="main" role="main">
			<jdoc:include type="message" />
			<jdoc:include type="component" />
            <?php if ($this->countModules('breadcrumbs')): ?>
                <div class="breadcrumbs-pad" role="navigation">
                    <jdoc:include type="modules" name="breadcrumbs" />
                </div>
            <?php endif; ?>
		</div>
		<aside class="sidebar" id="sidebar-s2" role="complementary">
            <div class="logo-social">
                <ul class="social-buttons">
                    <li><a href="https://twitter.com/adhocgraFX" target="_blank" title="twitter"><span class="icon icon-2x icon-twitter"></span></a></li>
                    <li><a href="https://plus.google.com/u/0/111658539092346200948/posts" target="_blank" title="google plus"><span class="icon icon-2x icon-google-plus"></span></a></li>
                    <li><a href="https://github.com/adhocgraFX" target="_blank" title="github"><span class="icon icon-2x icon-github"></span></a></li>
                </ul>
            </div>
			<jdoc:include type="modules" name="sidebar" style="jduo"  />
        </aside>
    </section>

    <?php if ($this->countModules('bottom_row')): ?>
        <section class="bottom" role="complementary">
            <jdoc:include type="modules" name="bottom_row" style="jduo" />
        </section>
    <?php endif; ?>

    <?php if ($this->countModules('footer')): ?>
        <footer role="contentinfo">
            <jdoc:include type="modules" name="footer" style="jduo" />
        </footer>
    <?php endif; ?>

    <a href="#" class="go-top"><span class="icon-chevron-up"></span><p hidden>Top</p></a>
</div>

<jdoc:include type="modules" name="debug" />

<!--  load plugin scripts -->
<script type="text/javascript" src="<?php echo $tpath.'/js/template.js.php';?>"></script>

<!-- load plugin options -->
<?php include_once ('js/plugin.js.php'); ?>

</body>

</html>