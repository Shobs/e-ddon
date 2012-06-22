<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Use the .htaccess and remove these lines to avoid edge case issues.
More info: h5bp.com/i/378 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Eddon</title>
<meta name="description" content="">

<!-- Mobile viewport optimized: h5bp.com/viewport -->
<meta name="viewport" content="width=device-width">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
{{ HTML::style('css/style.css') }}
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">  
<link href='http://fonts.googleapis.com/css?family=Dosis|Lato|Share' rel='stylesheet' type='text/css'>

<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

<!-- All JavaScript at the bottom, except this Modernizr build.
     Modernizr enables HTML5 elements & feature detects for optimal performance.
     Create your own custom Modernizr build: www.modernizr.com/download/ -->
     <script src="js/libs/modernizr-2.5.3.min.js"></script>
   </head>
   <body>

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->


<header id="banner">
  <div id="banner_content" class="container_12 clearfix">
    <div id="logo">
      <h1>E<span>ddon</span></h1>
    </div>
  </div>
</header>

<content>
  <div id="content" class="container_12 clearfix">
    <div id="main" class="grid_12">
      <div id="catList" class="grid_6 omega">
        <h2 class="main_title">addon by <span class="colorWord">type</span></h2>
        <a href="#" title="View addon list in Economy" class="cat_block grid_2 economy alpha ">
          <h2 class="cat_title">Economy</h2>
          <p class="cat_desc"></p>
        </a>
        <a href="#" title="View tool list in Gathering" class="cat_block grid_2 gathering  ">
          <h2 class="cat_title">Gathering</h2>
          <p class="cat_desc"></p> 
        </a>
        <a href="#" title="View tool list in Interface" class="cat_block grid_2 interface  omega">
          <h2 class="cat_title">Interface</h2>
          <p class="cat_desc"></p> 
        </a>
        <a href="#" title="View tool list in PVP" class="cat_block grid_2 pvp  alpha">
          <h2 class="cat_title">PVP</h2>
          <p class="cat_desc"></p> 
        </a>
        <a href="#" title="View tool list in Raiding" class="cat_block grid_2 raiding  ">
          <h2 class="cat_title">Raiding</h2>
          <p class="cat_desc"></p> 
        </a>
        <a href="#" title="View tool list in Vanity" class="cat_block grid_2 vanity  omega">
          <h2 class="cat_title">Vanity</h2>
          <p class="cat_desc"></p> 
        </a>
      </div>
      <div class="grid_5 push_1 omega">
        <div id="search">
          <form name="" action="#" method="get" role="search" class="clearfix"> 
            <input type="search" placeholder="search an addon" id="s" name="s"> 
            <input type="submit" value="search">
          </form>
        </div>
        <div class="tagList"><h2 class="main_title">addon by <span class="colorWord">tags</span></h2>
          <div class="widget widget_tag_cloud">
            <h2 class="widgettitle"></h2>
            <div class="tagcloud">
              <a href="#" class="tag-link-13" title="2 topics" style="font-size: 10.1176470588pt;">achievements</a> 
              <a href="#" class="tag-link-20" title="1 topic" style="font-size: 8pt;">action bars</a> 
              <a href="#" class="tag-link-12" title="30 topics" style="font-size: 22pt;">artwork</a> 
              <a href="#" class="tag-link-10" title="4 topics" style="font-size: 12.7058823529pt;">audio &amp; video</a> 
              <a href="#" class="tag-link-32" title="2 topics" style="font-size: 10.1176470588pt;">bags &amp; inventory</a> 
              <a href="#" class="tag-link-11" title="22 topics" style="font-size: 20.4705882353pt;">boss encounters</a> 
              <a href="#" class="tag-link-35" title="4 topics" style="font-size: 12.7058823529pt;">buffs &amp; debuffs</a> 
              <a href="#" class="tag-link-23" title="3 topics" style="font-size: 11.5294117647pt;">chat &amp; communication</a> 
              <a href="#" class="tag-link-30" title="1 topic" style="font-size: 8pt;">class</a> 
              <a href="#" class="tag-link-15" title="7 topics" style="font-size: 15.0588235294pt;">combat</a> 
              <a href="#" class="tag-link-22" title="2 topics" style="font-size: 10.1176470588pt;">companions</a> 
              <a href="#" class="tag-link-27" title="12 topics" style="font-size: 17.5294117647pt;">data export</a> 
              <a href="#" class="tag-link-19" title="5 topics" style="font-size: 13.6470588235pt;">development tools</a> 
              <a href="#" class="tag-link-17" title="21 topics" style="font-size: 20.2352941176pt;">guild</a> 
              <a href="#" class="tag-link-26" title="1 topic" style="font-size: 8pt;">libraries</a> 
              <a href="#" class="tag-link-16" title="4 topics" style="font-size: 12.7058823529pt;">mail</a> 
              <a href="#" class="tag-link-29" title="2 topics" style="font-size: 10.1176470588pt;">map &amp; minimap</a> 
              <a href="#" class="tag-link-28" title="5 topics" style="font-size: 13.6470588235pt;">minigames</a> 
              <a href="#" class="tag-link-21" title="3 topics" style="font-size: 11.5294117647pt;">miscellaneous</a> 
              <a href="#" class="tag-link-33" title="3 topics" style="font-size: 11.5294117647pt;">plugins</a> 
              <a href="#" class="tag-link-14" title="13 topics" style="font-size: 18pt;">quest &amp; leveling</a> 
              <a href="#" class="tag-link-31" title="2 topics" style="font-size: 10.1176470588pt;">roleplay</a> 
              <a href="#" class="tag-link-34" title="3 topics" style="font-size: 11.5294117647pt;">tooltip</a>
            </div>
          </div>
        </div>
      </div>
      <div id="featuredPost" class="clearfix">
        <h2 class="section_title"><span>featured</span></h2>
        <div class="grid_4 alpha">
          <h3 class="featured_section_title">last <span class="colorWord">added</span></h3> 
          <a href="#" class="linkPage btColor2" title="see all the last added addons">see all »</a> 
          <article id="post_659" class="post-659 post type_post status_publish format_standard hentry category_graphics tag_code_snippet tag_css3"> 
            <a href="http://www.toolmarklets.com/css3-button/" class="imgHolder">
              <img width="370" height="278" src="http://s.cdn.wowinterface.com/preview/pvw55800.jpg" class="attachment_featured_thumbnail wp_post_image" alt="CSS 3 Button Generator" title="css3-button">
            </a>
            <div class="entry_details"> 
              <header class="entry_header">
                <h2 class="entry_title">
                  <a href="#" title="See CSS3 Button Generator detail's" rel="bookmark">CSS3 Button Generator</a>
                </h2> 
              </header>
              <p class="info">by Seiji Uchiyama, in 
                <a href="#" title="View all posts in Graphics">Graphics</a>
              </p>
              <div class="entry_tag">
                <ul>
                  <li>
                    <a href="#" rel="tag">code snippet</a>
                  </li>
                  <li>
                    <a href="#" rel="tag">css3</a>
                  </li>
                </ul>
              </div>
            </div> 
          </article>
        </div>
        <div class="grid_4">
          <h3 class="featured_section_title">highest <span class="colorWord">rated</span></h3> 
          <a href="#" class="linkPage btColor2" title="see all the highest rated tools">see all »</a> 
          <article id="post-169" class="post_169 post type_post status_publish format_standard hentry category_css tag_code_snippet"> 
            <a href="#" class="imgHolder">
              <img width="370" height="278" src="http://s.cdn.wowinterface.com/preview/pvw55141.png" class="attachment_featured_thumbnail wp_post_image" alt="Sprite Cow" title="sprite-cow">
            </a>
            <div class="entry_details"> 
              <header class="entry_header">
                <h2 class="entry_title">
                  <a href="#" title="See Sprite Cow detail's" rel="bookmark">Sprite Cow</a>
                </h2> 
              </header>
              <p class="info">by theTeam, in 
                <a href="#" title="View all posts in CSS">CSS</a>
              </p>
              <div class="entry_tag">
                <ul>
                  <li>
                    <a href="#" rel="tag">code snippet</a>
                  </li>
                </ul>
              </div>
            </div> 
          </article>
        </div>
        <div class="grid_4 omega">
          <h3 class="featured_section_title">eddon <span class="colorWord">selected</span></h3> 
          <article id="post_633" class="post_633 post type_post status_publish format_standard sticky hentry category_graphics tag_css3 tag_text"> 
            <a href="#" class="imgHolder">
              <img width="370" height="278" src="http://s.cdn.wowinterface.com/preview/pvw16031.jpg" class="attachment_featured_thumbnail wp_post_image" alt="IcoMoon" title="ico-moon">
            </a>
            <div class="entry_details"> 
              <header class="entry_header">
                <h2 class="entry_title">
                  <a href="#" title="See IcoMoon detail's" rel="bookmark">IcoMoon</a>
                </h2> 
              </header>
              <p class="info">by keyamoon, in 
                <a href="#" title="View all posts in Graphics">Graphics</a>
              </p>
              <div class="entry_tag">
                <ul>
                  <li>
                    <a href="#" rel="tag">css3</a>
                  </li>
                  <li>
                    <a href="#" rel="tag">text</a>
                  </li>
                </ul>
              </div>
            </div> 
          </article>
        </div>
      </div>
      <div class="scrollToTop" style="display: block; ">
        <a href="#">ScrollTotop</a>
      </div>
    </div>
  </div>

</content>

<footer>
  <footer id="footer" role="contentinfo" class="clearfix">
    <div id="footer_content" class="container_12 clearfix">
      <div id="fb" class="grid_3">
        <h4>You like eddon ?</h4>
        <h5><span class="colorWord">Say-it</span> to Facebook !</h5> 
        <fb:fan profile_id="262740907103776" stream="false" connections="10" width="280" height="230" css="http://www.toolmarklets.com/wp-content/themes/toolmarklets/style-fb.css?120" class="  fb_iframe_widget ">
        <span style="height: 230px; width: 280px; ">
          <iframe id="f17fd77954" name="f2bd986348" scrolling="no" style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; border-image: initial; overflow-x: hidden; overflow-y: hidden; height: 230px; width: 280px; " class="fb_ltr" src="http://www.facebook.com/plugins/fan.php?connections=10&amp;css=http%3A%2F%2Fwww.toolmarklets.com%2Fwp-content%2Fthemes%2Ftoolmarklets%2Fstyle-fb.css%3F120&amp;height=230&amp;id=262740907103776&amp;locale=en_US&amp;sdk=joey&amp;stream=false&amp;width=280"></iframe>
        </span>
      </fb:fan>
    </div>
    <div id="feedback" class="grid_3 push_1">
      <h4>Help us to <span class="colorWord">improve</span></h4>
      <h5>eddon.com</h5> 
      <a href="#" title="Give us your feedback">Give us your <br><span>feedback !</span></a>
    </div>
    <div id="footer_ads" class="grid_4 push_2 omega">
      <div style="margin: 0px; padding: 0px; background: none; border: none">
        <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
          <img src="http://www.toolmarklets.com/wp-content/plugins/sam-images/125x125.png">
        </div>
        <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
          <img src="http://www.toolmarklets.com/wp-content/plugins/sam-images/125x125.png">
        </div>
        <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
          <img src="http://www.toolmarklets.com/wp-content/plugins/sam-images/125x125.png">
        </div>
      </div>
      <div style="margin: 0px; padding: 0px; background: none; border: none">
        <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
          <img src="http://www.toolmarklets.com/wp-content/plugins/sam-images/125x125.png">
        </div>
        <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
          <img src="http://www.toolmarklets.com/wp-content/plugins/sam-images/125x125.png">
        </div>
        <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
          <img src="http://www.toolmarklets.com/wp-content/plugins/sam-images/125x125.png">
        </div>
      </div>
    </div>
  </div>
  <div id="mentions">
    <div class="container_12 clearfix">
      <p class="copyright grid_6">© eddon 2012 - <a href="#" title="about eddon" class="colorWord">about</a></p>
      <p class="extraLinks grid_6">
        <a href="http://www.toolmarklets.com/legales/" title="legales" class="colorWord">legales</a>
          - ico by <a href="http://thenounproject.com/" title="The Noun Project" class="colorWord" target="_blank">The Noun Project</a>
        </p>
      </div>
    </div> 
  </footer>



<!-- JavaScript at the bottom for fast page loading -->

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via build script -->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<!-- end scripts -->

<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
mathiasbynens.be/notes/async-analytics-snippet -->
<!--<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>-->
</body>
</html>