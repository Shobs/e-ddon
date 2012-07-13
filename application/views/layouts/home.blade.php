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
        <div class="row">
          <div class="twelve columns" style="display: block; ">
            <div class="scrollToTop">
              <a href="#">ScrollTotop</a>
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
        <h3>my <span class="colorWord">eddons</span><span class="sep"></span></h3>
        <h2 class="inlined">Log In</h2>
      </hgroup>
      <div class="row">
        <div class="twelve columns">
          <div id="loginForm" class="">
            <br>
            <p class="underTitle">Please log in to access to your addon collection</p>
            <br>
            <div class="login" id="theme-my-login">
              <form name="loginform" id="loginform" action="/login/?action=login" method="post" class="clearfix">
                <p>
                  <label class="label" for="userLogin">Username</label>
                  <input type="text" name="log" id="userLogin" class="input" value="" size="20">
                </p>
                <br>
                <p>
                  <label class="label" for="userPass">Password</label>
                  <input type="password" name="pwd" id="userPass" class="input" value="" size="20">
                </p>
                <input type="hidden" name="_wp_original_http_referer" value="http://www.eddon.com/">
                <div class=" nine columns">
                  <p class="forgetMeNot"><span class="fakeCheckbox"></span>
                    <input name="rememberme" type="checkbox" id="rememberMe" value="forever" style="display: none; "> <span class="wpcf7-list-item-label">Remember Me</span>
                  </p>
                </div>
                <div class="three columns">
                  <div class="submit">
                    <input class="small radius nice blue button btRight" type="submit" name="wp-submit" id="wp-submit" value="Log in">
                    <input type="hidden" name="redirect_to" value="http://www.toolmarklets.com/wp-admin/">
                    <input type="hidden" name="testcookie" value="1">
                    <input type="hidden" name="instance" value="">
                  </div>
                </div>
                <div class="clear">
                  <div class="twelve columns ">
                    <p class="formExtraLnk">
                      <h4 class="entryTitle">Forgot Password ?</h4>
                      <a class="sliderLink clear" href="#" title="Click here if you forgot your password">Reset Password</a>
                    </p>
                    <p class="formExtraLnk">
                      <h4 class="entryTitle">You don't have an account yet ?</h4>
                      <a class="sliderLink clear" href="#" title="Click here if you have do not have an account">Create Account</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <hgroup class="mainTitle ">
        <h3>my <span class="colorWord">eddons</span><span class="sep"></span></h3>
        <h2 class="inlined">Recovery</h2>
      </hgroup>
      <div class="row">
        <div id="forgetForm" class=" twelve columns" >
          <br>
          <p>Please enter your username or email address.<br>You will receive a link to create a new password via email.</p>

          <div class="login pwdlost" id="theme-my-login1">
            <form name="lostpasswordform" id="lostpasswordform1" action="#" method="post" class="">
              <p>
                <label for="user_login1">Username or E-mail:</label>
                <input type="text" name="user_login" id="user_login1" class="input" value="" size="20"></p>
                <br>
                <div class="six columns"></div>
                <div class="six columns ">
                  <div class="submit">
                    <input class="small radius nice blue button btRight" type="submit" name="wp-submit" id="wp-submit1" value="Get a new password">
                    <input type="hidden" name="redirect_to" value="/login/?checkemail=confirm">
                    <input type="hidden" name="instance" value="1">
                  </div>
                </div>
                <div class="clear">
                  <div class="twelve columns ">
                    <p class="formExtraLnk">
                      <h4 class="entryTitle">Remember your password ?</h4>
                      <a class="sliderLink clear" href="#" title="Click here if you forgot your password">Log in</a>
                    </p>
                    <p class="formExtraLnk">
                      <h4 class="entryTitle">You don't have an account yet ?</h4>
                      <a class="sliderLink clear" href="#" title="Click here if you have do not have an account">Create Account</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <hgroup class="mainTitle ">
          <h3>my <span class="colorWord">eddons</span><span class="sep"></span></h3>
          <h2 class="inlined">Sign up</h2>
        </hgroup>
        <div class="row">
          <div id="goCreate" class="twelve columns">
            <div>
              <br>
              <p>Sign up to make your addons collection</p>
              <br>
            </div>
            <div>
              <form name="registerform" id="registerform1" action="?action=register" method="post" class="clearfix">
                <p>
                  <label for="user_login1">Username</label>
                  <input type="text" name="user_login" id="user_login1" class="input" value="" size="20">
                </p>
                <br>
                <p>
                  <label for="user_email1">E-mail</label>
                  <input type="text" name="user_email" id="user_email1" class="input" value="" size="20">
                </p>
                <p>
                  <label for="user_job1">Job</label>
                  <input type="text" name="user_job" id="user_job1" class="input" value="" size="20">
                </p>
                <div>
                  <label for="user_country">Country</label>
                  <div class="select">
                    <select name="user_country" id="user_country"></select>
                  </div>
                </div>
                <br>
                <p>
                  <label for="pass11">Password:</label>
                  <input autocomplete="off" name="pass1" id="pass11" class="input" size="20" value="" type="password">
                </p>
                <p>
                  <label for="pass21">Confirm Password:</label>
                  <input autocomplete="off" name="pass2" id="pass21" class="input" size="20" value="" type="password">
                </p>
                <p id="reg_passmail1"></p>
                <div class="twelve columns submit clearfix">
                  <input class="small radius nice blue button btRight" type="submit" name="wp-submit" id="wp-submit1" value="Register">
                  <input type="hidden" name="redirect_to" value="/register/?checkemail=registered"> <input type="hidden" name="instance" value="1">
                </div>
                <div class="clear">
                  <div class="twelve columns ">
                    <p class="formExtraLnk">
                      <h4 class="entryTitle">Forgot Password ?</h4>
                      <a class="sliderLink clear" href="#" title="Click here if you forgot your password">Reset Password</a>
                    </p>
                    <p class="formExtraLnk">
                      <h4 class="entryTitle">You have an account ?</h4>
                      <a class="sliderLink clear" href="#" title="Click here if you have do not have an account">Create Account</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
    <a class="close-reveal-modal">&#215;</a>
  </div>

      <div id="uploadForm" class="reveal-modal">
        <div class="row">
          <div class="twelve column">
        <div id="content" role="main" class="submitPage clearfix">
          <h1 class="main-title">submit a <span class="colorWord">addon</span></h1>
          <div class="entry-content grid_11 alpha omega clearfix">
            <div class="wpcf7" id="wpcf7-f30-p27-o1">
              <form action="#" method="post" class="#" enctype="multipart/form-data">
                <div style="display: none;">
                  <input type="hidden" name="_wpcf7" value="30">
                  <input type="hidden" name="_wpcf7_version" value="3.1.2">
                  <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f30-p27-o1">
                  <input type="hidden" name="_wpnonce" value="e984417028">
                </div>
                <div class="grid_5 suffix_1 alpha clearfix">
                  <span class="wpcf7-form-control-wrap honeypot-1982">
                    <div style="display:none;" class="hidden">
                      <label for="email-wpcf7-hp"><small>Leave this field empty.</small></label>
                      <input class="wpcf7-text" type="text" name="email-wpcf7-hp" id="email-wpcf7-hp" value="" size="40" tabindex="3">
                    </div>
                  </span>
                  <p></p>
                  <p>
                    <span class="label">Addon's name <em>(required)</em></span>
                    <br>
                    <span class="#">
                      <input type="text" name="addon-name" value="" class="#" size="40">
                    </span>
                  </p>
                  <p>
                    <span class="label">Addon's author</span>
                    <br>
                    <span class="#">
                      <input type="text" name="addon-author" value="" class="#" size="40">
                    </span>
                  </p>
                  <p>
                    <span class="label">Addon's url <em>(required)</em></span>
                    <br>
                    <span class="#">
                      <input type="text" name="addon-url" value="" class="#" size="40">
                    </span>
                  </p>
                  <p class="fileFaker">
                    <span class="label">Addon's image <em>(.jpg, .gif, .png - 470 x 354px - 300ko.max)</em></span>
                    <br>
                    <input id="fileFake" type="text" value="">
                    <span class="small radius nice blue button btRight">Parcourir</span>
                    <span class="formControlWrap">
                      <input type="file" name="addon-image" class="formControlWrap" size="40" value="1">
                    </span>
                  </p>
                  <p>
                    <span class="label">Addon's description <em>(required)</em></span>
                    <br>
                    <span class="#">
                      <textarea name="addon-description" class="#" cols="40" rows="10">
                      </textarea>
                    </span>
                  </p>
                </div>
                <div class="grid_5 omega clearfix">
                  <p>
                    <span class="label">Your Name <em>(required)</em></span>
                    <br>
                    <span class="wpcf7-form-control-wrap your-name">
                      <input type="text" name="your-name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40">
                    </span>
                  </p>
                  <p>
                    <span class="label">Your Email <em>(required)</em></span>
                    <br>
                    <span class="wpcf7-form-control-wrap your-email">
                      <input type="text" name="your-email" value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" size="40">
                    </span>
                  </p>
                  <p>
                    <span class="#">
                      <span class="#">
                        <span class="#">
                          <span class="fakeCheckbox"></span>
                          <input type="checkbox" name="is-author[]" value="i'm the author of this addon" style="display: none; ">&nbsp;
                          <span class="#">i'm the author of this addon</span>
                        </span>
                      </span>
                    </span>
                  </p>
                </div>
                <p class="submit grid_5 push_6">
                  <input type="submit" value="Submit the addon" class="small radius nice blue button btRight">
                  <img class="ajax-loader" src="http://www.toolmarklets.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden; ">
                </p>
                <div class="wpcf7-response-output wpcf7-display-none">
                </div>
              </form>
            </div>
          </div>
        </div>
        </div>
        </div>
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