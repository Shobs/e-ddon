<!DOCTYPE html>
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


<!-- Laravel static function to call js and css -->
{{ Asset::styles() }}
{{ Asset::scripts() }}

<!-- Loads the selected js at the end of the page for fast loading -->
{{ Asset::container('footer')->scripts(); }}


<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

<!-- All JavaScript at the bottom, except this Modernizr build.
     Modernizr enables HTML5 elements & feature detects for optimal performance.
     Create your own custom Modernizr build: www.modernizr.com/download/ -->

</head>
<body>

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<?php
$user = Auth::user();
?>

<header id="header" >
  <div class="row">
    <div class="twelve columns">
      <hgroup class="five columns">
        <h1 id="siteLogo">
          {{HTML::link('home', '', array('title'=>'Eddon', 'rel'=>'home'));}}
        </h1>
      </hgroup>
      <div id="userName" class="two columns">
        @if(Auth::check())
          Welcome {{Str::title($user->firstname)}}!
        @endif
      </div>
      <div class="two columns">
        <div id="btLogin">

          <!-- if user is logged shows logout button, if not login button -->
          @if (Auth::guest())
          {{HTML::link('#', 'Login / Register', array('class'=>'small radius nice blue button', 'title'=>'log in or register', 'data-reveal-id'=>'loginModal'));}}
          @else
          {{HTML::link('user/logout', 'Logout', array('class'=>'small radius nice blue button', 'title'=>'Logout'));}}
          @endif
        </div>
      </div>
      <div class="three columns">
        <div id="btUpload">

          <!-- if user is logged links to upload form, if not login form -->
          @if (Auth::guest())
          {{HTML::link('#', 'Submit an addon', array('id'=>'upload', 'class'=>'large radius nice blue button', 'title'=>'Submit an Addon', 'data-reveal-id'=>'loginModal'));}}
          @else
          {{HTML::link('#', 'Submit an addon', array('id'=>'upload', 'class'=>'large radius nice blue button', 'title'=>'Submit an Addon', 'data-reveal-id'=>'uploadModal'));}}
          @endif
        </div>
      </div>
    </div>
  </header>

  <content>
    <div class="row">
      <div class="twelve columns">
        @yield('content')

        <div class="row">
          <div class="twelve columns">
            <div class="scrollToTop">
              <br>
              {{HTML::link('#', 'ScrollTotop');}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </content>


  <footer id="footer" role="contentinfo">
    <div class="row">
      <div class="twelve columns">
        <div class="four columns">
          <h4>You like eddon ?</h4>
          <h5><span class="colorWord">Say-it</span> to Facebook !</h5>
          <fb:fan profile_id="262740907103776" stream="false" connections="10" width="280" height="230" css="../css/fb.css" class="  fb_iframe_widget ">
          <span style="height: 230px; width: 280px; ">
            <!-- <iframe id="f17fd77954" name="f2bd986348" scrolling="no" style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; border-image: initial; overflow-x: hidden; overflow-y: hidden; height: 230px; width: 280px; " class="fb_ltr" src="http://www.facebook.com/plugins/fan.php?connections=10&amp;css=http%3A%2F%2Fwww.toolmarklets.com%2Fwp-content%2Fthemes%2Ftoolmarklets%2Fstyle-fb.css%3F120&amp;height=230&amp;id=262740907103776&amp;locale=en_US&amp;sdk=joey&amp;stream=false&amp;width=280"></iframe> -->
          </span>
        </fb:fan>
      </div>
      <div class="three columns">
        <h4>Help us to <span class="colorWord">improve</span></h4>
        <h5>eddon.com</h5>
        <a href="#" title="Give us your feedback">Give us your <br/><span>feedback !</span></a>
      </div>
      <div class="five columns ">
        <div id="addArea">
          <div style="margin: 0px; padding: 0px; background: none; border: none">
            <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
              <img src="http://placehold.it/125x125">
            </div>
            <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
              <img src="http://placehold.it/125x125">
            </div>
            <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
              <img src="http://placehold.it/125x125">
            </div>
          </div>
          <div style="margin: 0px; padding: 0px; background: none; border: none">

            <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
              <img src="http://placehold.it/125x125">
            </div>
            <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
              <img src="http://placehold.it/125x125">
            </div>
            <div style="display: inline-block; margin: 0px 0px 1px 1px; padding: 0px; background: none; border: none">
              <img src="http://placehold.it/125x125">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="mentions">
    <div class="row">
      <div  class="twelve columns">
        <div class="six columns">
          <p id="mentionLeft" >© eddon 2012 - <a href="#" title="about eddon" class="colorWord">about</a></p>
        </div>
        <div class="six columns">
          <p id="mentionRight">
            <a href="#" title="legales" class="colorWord">legales</a>
            - ico by <a href="http://thenounproject.com/" title="The Noun Project" class="colorWord" target="_blank">The Noun Project</a>
          </p>
        </div>
      </div>
    </div>
  </div>

</footer>

@yield('modal')




<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>


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