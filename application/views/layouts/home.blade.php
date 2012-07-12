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


<header id="header" >
  <div class="row">
    <div class="twelve columns">
        <hgroup class="five columns">
          <h1 id="siteLogo">
            <a href="home" title="eddon" rel="home"><span class="colorWord">e</span>ddon<span>.com</span>
            </a>
          </h1>
        </hgroup>
        <div class="three columns">
          <div id="btLogin">
          <a href="#" class="small radius nice blue button" title="log in or register" data-reveal-id="loginForm">Login / Register</a>
        </div>
        </div>
        <div class="four columns">
          <div id="btUpload">
          <a href="#" class="large radius nice blue button" title="Submit an Addon" data-reveal-id="uploadForm">Submit an <span>addon</span></a>
          </div>
        </div>
    </div>
</header>

<content>
  <div class="row">
    <div class="twelve columns">
      @yield('content')
    </div>
  </div>
</content>


<footer id="footer" role="contentinfo">
  <div class="row">
    <div class="twelve columns">
        <div class="four columns">
          <h4>You like eddon ?</h4>
          <h5><span class="colorWord">Say-it</span> to Facebook !</h5>
          <fb:fan profile_id="262740907103776" stream="false" connections="10" width="280" height="230" css="http://www.toolmarklets.com/wp-content/themes/toolmarklets/style-fb.css?120" class="  fb_iframe_widget ">
            <span style="height: 230px; width: 280px; ">
              <iframe id="f17fd77954" name="f2bd986348" scrolling="no" style="border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; border-image: initial; overflow-x: hidden; overflow-y: hidden; height: 230px; width: 280px; " class="fb_ltr" src="http://www.facebook.com/plugins/fan.php?connections=10&amp;css=http%3A%2F%2Fwww.toolmarklets.com%2Fwp-content%2Fthemes%2Ftoolmarklets%2Fstyle-fb.css%3F120&amp;height=230&amp;id=262740907103776&amp;locale=en_US&amp;sdk=joey&amp;stream=false&amp;width=280"></iframe>
            </span>
          </fb:fan>
        </div>
        <div class="three columns">
          <h4>Help us to <span class="colorWord">improve</span></h4>
          <h5>eddon.com</h5>
          <a href="#" title="Give us your feedback">Give us your <br><span>feedback !</span></a>
        </div>
        <div class="five columns ">
          <div id="addArea">
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
        <a href="http://www.toolmarklets.com/legales/" title="legales" class="colorWord">legales</a>
        - ico by <a href="http://thenounproject.com/" title="The Noun Project" class="colorWord" target="_blank">The Noun Project</a>
      </p>
      </div>
    </div>
  </div>
  </div>

</footer>

<div id="loginForm" class="reveal-modal">
<div id="main" class="row">
  <div id="content" role="main" class="twelve columns">
    <hgroup class="mainTitle ">
      <h3>my <span class="colorWord">eddons</span>
        <span class="sep"></span>
      </h3>
      <h2>Log In</h2>
    </hgroup>
    <div class="row">
        <div class="twelve columns">
          <div id="loginForm" class="">
            <h5 class="entryTitle">You have already an account?</h5>
            <p>Please log in to access to your addon collection</p><br>
            <div class="login" id="theme-my-login">
              <form name="loginform" id="loginform" action="/login/?action=login" method="post" class="clearfix">
                <p>
                  <label class="label" for="user_login">Username</label>
                  <input type="text" name="log" id="user_login" class="input" value="" size="20">
                </p>
                <p>
                  <label class="label" for="user_pass">Password</label>
                  <input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
                </p>
                <input type="hidden" name="_wp_original_http_referer" value="http://www.toolmarklets.com/">
                <p class="forgetmenot"><span class="fakeCheckbox"></span>
                  <input name="rememberme" type="checkbox" id="rememberme" value="forever" style="display: none; "> <span class="wpcf7-list-item-label">Remember Me</span>
                </p>
                <div class="submit clearfix">
                  <input class="small radius nice blue button" type="submit" name="wp-submit" id="wp-submit" value="Log in">
                  <input type="hidden" name="redirect_to" value="http://www.toolmarklets.com/wp-admin/">
                  <input type="hidden" name="testcookie" value="1">
                  <input type="hidden" name="instance" value="">
                </div>
                <p class="formExtraLnk">
                  <a class="sliderLink" href="#" title="Click here if you have forget your password">Lost Password ?</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>

          <div id="forgetForm" class="grid_5 omega">
            <h4 class="entry-title">Forget Password ?</h4>
            <p>Please enter your username or email address.<br>You will receive a link to create a new password via email.</p>
            <br> <span class="btClose">close</span>
            <div class="login pwdlost" id="theme-my-login1">
              <form name="lostpasswordform" id="lostpasswordform1" action="http://www.toolmarklets.com/login/?action=lostpassword" method="post" class="clearfix">
                <p>
                  <label for="user_login1">Username or E-mail:</label>
                  <input type="text" name="user_login" id="user_login1" class="input" value="" size="20"></p>
                  <div class="submit clearfix">
                    <input class="small radius nice blue button" type="submit" name="wp-submit" id="wp-submit1" value="Get a new password">
                    <input type="hidden" name="redirect_to" value="/login/?checkemail=confirm">
                    <input type="hidden" name="instance" value="1">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>

        <div class="">
          <div id="goCreate" class="clearfix">
            <div class="left">
              <h4 class="entry-title">You don't have an account yet?</h4>
              <p>Sign up to make your's tools collection</p>
            </div>
            <a class="btColor" href="/register" id="btSwitchForm">Create an account</a>
            <br>
          </div>
        </div>
        </div>
      </div>
    </div>
    <p class="scrollToTop" style="display: none; ">
      <a href="#">ScrollTotop</a>
    </p>
  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>

<div id="uploadForm" class="reveal-modal">
  <h2>Awesome. I have it.</h2>
  <p class="lead">Your couch.  I it's mine.</p>
  <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
  <a class="close-reveal-modal">&#215;</a>
</div>


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