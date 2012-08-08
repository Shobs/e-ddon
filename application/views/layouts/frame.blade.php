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
          @yield('logo')
        </h1>
      </hgroup>
      <div class="three columns">
        <div id="btLogin">
          <a href="#" class="small radius nice blue button" title="log in or register" data-reveal-id="loginModal">Login / Register</a>
        </div>
      </div>
      <div class="four columns">
        <div id="btUpload">
          <a href="#" class="large radius nice blue button" title="Submit an Addon" data-reveal-id="uploadModal">Submit an <span>addon</span></a>
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

<div id="loginModal" class="reveal-modal">
  <div id="main" class="row">
    <div id="content" role="main" class="twelve columns">
      <div id="loginArea">
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
                {{Form::open('usertest/authenticate', 'post');}}
                <p>
                  {{Form::label('email', 'Email', array('class' => 'label'));}}
                </p>
                <p>
                  {{Form::email('email', '', array('class' => 'input','placeholder' => 'Enter your email', 'required' => 'required'));}}
                </p>
                <p>
                  {{Form::label('password', 'Password', array('class' => 'label'));}}
                  {{Form::password('password', array('id' => 'password','class' => 'input','placeholder' => 'Enter your password', 'required' => 'required', 'pattern' => '(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'));}}
                </p>
                <div class=" nine columns">
                  <p class="forgetMeNot">
                    <span class="fakeCheckbox"></span>
                    {{Form::checkbox('rememberme', 'forever', '', array('id' => 'rememberme', 'style' => 'display: none'));}}
                    <span class="wpcf7-list-item-label">Remember Me</span>
                  </p>
                </div>
                <div class="three columns">
                  <div class="submit">
                    {{Form::submit('Log in', array('class' => 'small radius nice blue button btright', 'name' => 'submit', 'id' => 'submit'));}}
                  </div>
                </div>
                {{Form::close();}}

                <div class="clear">
                  <div class="twelve columns ">
                    <p class="formExtraLnk">
                      <h4 class="entryTitle">Forgot Password ?</h4>
                      <a class="forgotPassLink clear" href="#" title="Click here if you forgot your password">Reset Password</a>
                    </p>
                    <p class="formExtraLnk">
                      <h4 class="entryTitle">You don't have an account yet ?</h4>
                      <a class="registerLink clear" href="#" title="Click here if you have do not have an account">Create Account</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="forgetArea">
        <hgroup class="mainTitle ">
          <h3>my <span class="colorWord">eddons</span><span class="sep"></span></h3>
          <h2 class="inlined">Recovery</h2>
        </hgroup>
        <div class="row">
          <div id="forgetForm" class=" twelve columns" >
            <br>
            <p>Please enter your email address.<br>You will receive a link to create a new password via email.</p>
            {{Form::open('user/authenticate', 'post');}}
            <p>
              {{Form::label('email', 'E-mail', array('class' => 'label'));}}
              {{Form::email('email', '', array('class' => 'input','placeholder' => 'Enter your email', 'required' => 'required'));}}
            </p>
            <br>
            <div class="nine columns"></div>
            <div class="three columns ">
              <div class="submit">
                {{Form::submit('submit', array('class' => 'small radius nice blue button btright', 'name' => 'submit', 'id' => 'submit', 'value' => 'Get a new password'));}}
              </div>
            </div>
            {{Form::close();}}
            <div class="clear">
              <div class="twelve columns ">
                <p class="formExtraLnk">
                  <h4 class="entryTitle">Remember your password ?</h4>
                  <a class="loginLink clear" href="#" title="Click here if you want to log-in.">Log in</a>
                </p>
                <p class="formExtraLnk">
                  <h4 class="entryTitle">You don't have an account yet ?</h4>
                  <a class="registerLink clear" href="#" title="Click here if you have do not have an account">Create Account</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="registerArea">
        <hgroup class="mainTitle ">
          <h3>my <span class="colorWord">eddons</span><span class="sep"></span></h3>
          <h2 class="inlined">Sign up</h2>
        </hgroup>
        <div class="row">
          <div id="goCreate" class="twelve columns">
            <div>
              <br>
              <p>Sign up to upload your addons</p>
              <br>
            </div>
            <div>
              {{Form::open('usertest/authenticate', 'post')}};
              <form name="newUser" id="newUser" action="user/authenticate" method="post" class="clearfix">
                <p>
                  {{Form::label('email', 'E-mail', array('class' => 'label'));}}
                  {{Form::email('email', '', array('class' => 'input','placeholder' => 'Enter your email', 'id' => 'email', 'required' => 'required'));}}
                </p>
                <br>
                <p>
                  {{Form::label('lastname', 'Lastname', array('class' => 'label'));}}
                  {{Form::input('text', 'lastname', '', array('class' => 'input', 'placeholder' => 'Enter your lastname', 'id' => 'lastname', 'required' => 'required', 'pattern' => '[A-Za-z]+'));}}
                </p>
                <p>
                  {{Form::label('firstname', 'Firstname', array('class' => 'label'));}}
                  {{Form::input('text', 'firstname', '', array('class' => 'input', 'placeholder' => 'Enter your firstname', 'id' => 'firstname', 'required' => 'required', 'pattern' => '[A-Za-z]+'));}}
                </p>
                <p>
                  {{Form::label('birthdate', 'Birthdate', array('class' => 'label'));}}
                  {{Form::input('text', 'birthdate', '', array('class' => 'input', 'placeholder' => 'MM/DD/YYYY', 'id' => 'birthdate', 'required' => 'required', 'pattern' => '(?:(?:0[1-9]|1[0-2])[\/\\-. ]?(?:0[1-9]|[12][0-9])|(?:(?:0[13-9]|1[0-2])[\/\\-. ]?30)|(?:(?:0[13578]|1[02])[\/\\-. ]?31))[\/\\-. ]?(?:19|20)[0-9]{2}'));}}
                </p>
                <div>
                  {{Form::label('country', 'Country', array('class' => 'label'));}}
                  <div class="select">
                    {{Form::select('country', array(), '');}}
                    {{ $errors->first('country') }}
                  </div>
                </div>
                <br>
                <p>
                  {{Form::label('password', 'Password', array('class' => 'label'));}}
                  {{Form::password('password', array('id' => 'password','class' => 'input','placeholder' => 'Enter your password', 'required' => 'required', 'pattern' => '(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'));}}
                  UpperCase, LowerCase, Number and 8 chars min.
                </p>
                <p>
                  {{Form::label('password2', 'Confirm Password', array('class' => 'label'));}}
                  {{Form::password('password2', array('id' => 'password2','class' => 'input','placeholder' => 'Enter your password', 'required' => 'required', 'pattern' => '(?=^.{8,}$)^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$'));}}
                </p>
                {{Form::input('hidden', 'newUser', 'on', array('id' => 'newUser'));}}
                <div class="nine columns"></div>
                <div class="three columns submit clearfix">
                  {{Form::submit('Register', array('class' => 'small radius nice blue button btright', 'name' => 'submit', 'id' => 'submit'));}}
                </div>
              </form>
              {{Form::close();}}
              <div class="clear">
                <div class="twelve columns ">
                  <p class="formExtraLnk">
                    <h4 class="entryTitle">Forgot Password ?</h4>
                    <a class="forgotPassLink clear" href="#" title="Click here if you forgot your password">Reset Password</a>
                  </p>
                  <p class="formExtraLnk">
                    <h4 class="entryTitle">You have an account ?</h4>
                    <a class="loginLink clear" href="#" title="Click here if you already have an account">Log in</a>
                  </p>
                </div>
              </div>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>

<div id="uploadModal" class="reveal-modal">
  <div class="row">
    <div id="content" role="main" class="twelve column clearfix">
      {{Form::open('user/upload', 'post');}}
      <div class="twelve column">
        <h1 class="mainTitle">submit an <span class="colorWord">addon</span></h1>
        <p>
          {{Form::label('addonName', "Addon's name (required)", array('class' => 'label'));}}
          {{Form::input('text', 'addonName', '', array('size' => '40', 'required' => 'required'));}}
        </p>
        <p>
          {{Form::label('addonAuthor', "Addon's author (required)", array('class' => 'label'));}}
          {{Form::input('text', 'addonAuthor', '', array('size' => '40', 'required' => 'required'));}}
        </p>
      </div>
      <div class="nine columns">
        <br>
        {{Form::label('addon', 'Addon (.zip format only)', array('class' => 'label'));}}
        {{Form::input('text', 'fakeFile');}}
      </div>
      <div class="three columns">
        <br>
        <span class="small radius nice blue button btRight">Select</span>
        {{Form::open_for_files('user/profile', 'post', array('name' => 'addon', 'class' => 'formControlWrap', 'size' => '40', 'value' => '1'));}}
        <!-- <input type="file" name="addon-image" class="formControlWrap" size="40" value="1"> -->
      </div>
      <div class="nine columns">
        <br>
        {{Form::label('addon', 'Addon (.zip format only)', array('class' => 'label'));}}
        {{Form::input('text', 'fakeFile');}}
      </div>
      <div class="three columns">
        <br>
        <span class="small radius nice blue button btRight">Select</span>
        {{Form::open_for_files('user/profile', 'post', array('name' => 'addon', 'class' => 'formControlWrap', 'size' => '40', 'value' => '1'));}}
        <!-- <input type="file" name="addon-image" class="formControlWrap" size="40" value="1"> -->
      </div>
      <div class="twelve columns">
        <br>
        <p>
          {{Form::label('addonDescription', "Addon's description (required)", array('class' => 'label', 'required' => 'required'));}}
          {{Form::textarea('addonDescription', '', array('cols' => '40', 'rows' => '10', 'style' => 'font-size: "10"'));}}
        </p>
        <p>
          {{Form::label('addonDescription', "Addon's description (required)", array('class' => 'label'));}}
        </p>
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
      </div>
      <div class="eight columns">
        <span class="fakeCheckbox"></span>
        <input type="checkbox" name="is-author[]" value="i'm the author of this addon" style="display: none; ">&nbsp;
        <span class="#">i'm the author of this addon</span>
      </div>
      <div class="four columns">
        <input type="submit" value="Submit the addon" class="small radius nice blue button btRight">
      </div>
      {{Form::close();}}
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