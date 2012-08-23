<div id="loginModal" class="reveal-modal modals">
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
              <br/>
              <p class="underTitle">Please log in to access to your addon collection</p>
              <div class="login" id="theme-my-login">
                {{Form::open('auth', 'post');}}
                <p>
                  {{Form::label('email', 'Email', array('class' => 'label'));}}
                  {{Form::email('email', '', array('class' => 'input','placeholder' => 'Enter your email', 'required' => 'required'));}}
                </p>
                <p>
                  {{Form::label('password', 'Password', array('class' => 'label'));}}
                  {{Form::password('password', array('id' => 'password','class' => 'input','placeholder' => 'Enter your password', 'required' => 'required'));}}
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
                      <h5 class="entryTitle">Forgot Password ?</h5>
                      {{HTML::link('#', 'Reset Password', array('class'=>'forgotPassLink clear', 'title'=>'Click here if you forgot your password'));}}
                    </p>
                    <p class="formExtraLnk">
                      <h5 class="entryTitle">You don't have an account yet ?</h5>
                      {{HTML::link('#', 'Create Account', array('class'=>'registerLink clear', 'title'=>'Click here if you have do not have an account'));}}
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
            <br/>
            <p>Please enter your email address.<br/>You will receive a link to create a new password via email.</p>
            {{Form::open('reset', 'post');}}
            <p>
              {{Form::label('email', 'E-mail', array('class' => 'label'));}}
              {{Form::email('email', '', array('class' => 'input','placeholder' => 'Enter your email', 'required' => 'required'));}}
            </p>
            <br/>
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
                  <h5 class="entryTitle">Remember your password ?</h5>
                  {{HTML::link('#', 'Log in', array('class'=>'loginLink clear', 'title'=>'Click here if you want to log-in'));}}
                </p>
                <p class="formExtraLnk">
                  <h5 class="entryTitle">You don't have an account yet ?</h5>
                  {{HTML::link('#', 'Create Account', array('class'=>'registerLink clear', 'title'=>'Click here if you have do not have an account'));}}
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
              <br/>
              <p>Sign up to upload your addons</p>
            </div>
            <div>
              {{Form::open('auth', 'post')}};
                <p>
                  {{Form::label('email', 'E-mail', array('class' => 'label'));}}
                  {{Form::email('email', '', array('class' => 'input','placeholder' => 'Enter your email', 'id' => 'email', 'required' => 'required'));}}
                </p>
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
                  {{Form::date('birthdate', '', array('class' => 'input', 'placeholder' => 'YYYY-MM-DD', 'id' => 'birthdate', 'required' => 'required', 'pattern' => '(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))'));}}
                </p>
                <p>
                  {{Form::label('password', 'Password', array('class' => 'label'));}}
                  {{Form::password('password', array('id' => 'registerPassword','class' => 'input','placeholder' => 'Enter your password', 'required' => 'required'));}}
                  Your password is forceable in: <span id="registerTime"></span>
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
                    <h5 class="entryTitle">Forgot Password ?</h5>
                    {{HTML::link('#', 'Reset Password', array('class'=>'forgotPassLink', 'title'=>'Click here if you forgot your password'));}}
                  </p>
                  <p class="formExtraLnk">
                    <h5 class="entryTitle">You have an account ?</h5>
                    {{HTML::link('#', 'Log in', array('class'=>'loginLink', 'title'=>'Click here if you already have an account'));}}
                  </p>
                </div>
              </div>
            </div>
            <br/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>

<div id="uploadModal" class="reveal-modal modals">
  <div class="row">
    <div id="content" role="main" class="twelve column clearfix">
      {{Form::open_for_files('upload', 'post');}}
      <div class="twelve column">
        <h1 class="mainTitle">submit an <span class="colorWord">addon</span></h1>
        <p>
          {{Form::label('addonName', "Addon's name (required)", array('class' => 'label'));}}
          {{Form::input('text', 'addonName', '', array('size' => '40', 'required' => 'required'));}}
          @if ($errors)
            @foreach ($errors->all('<p class="error-message">:message</p>') as $addonName_error)
            {{ $addonName_error }}
            @endforeach
          @endif
          <div id="#sessionMessage"></div>
        </p>
        <p>
          {{Form::label('addonVersion', "Addon's version (required)", array('class' => 'label'));}}
          {{Form::input('text', 'addonVersion', '', array('size' => '40', 'required' => 'required'));}}
        </p>
        <p>
          {{Form::label('addonAuthor', "Addon's author (required)", array('class' => 'label'));}}
          {{Form::input('text', 'addonAuthor', '', array('size' => '40', 'required' => 'required'));}}
        </p>
      </div>
      <div class="nine columns">
        <br/>
        {{Form::label('addonUpload', 'Addon (.zip format only)', array('class' => 'label'));}}
        {{Form::hidden('MAX_FILE_SIZE', 3145728);}}
        {{Form::file('addonUpload', array('id'=>'addonUpload'));}}
        <div id="fakeAddonUpload"></div>

      </div>
      <div class="three columns">
        <br/>
        {{Form::button('Select', array('class'=>'small radius nice blue button btRight', 'id'=>'fakeAddUpBtn'));}}
      </div>
      <div class="nine columns">
        {{Form::label('pictureUpload', 'Picture (.jpg format only)', array('class' => 'label'));}}
        {{Form::hidden('MAX_FILE_SIZE', 500000);}}
        {{Form::file('pictureUpload', array('id'=>'pictureUpload'));}}
        <div id="fakePictureUpload"></div>
      </div>
      <div class="three columns">
        {{Form::button('Select', array('class'=>'small radius nice blue button btRight', 'id'=>'fakePicUpBtn'));}}
      </div>
      <div class="twelve columns">
        {{Form::label('category', 'Category', array('class' => 'label'));}}
        <div class="select">
        {{Form::select('category', array('' => '', '1' => 'Economy', '2' => 'Interface', '3' => 'Professions', '4' => 'PVP', '5' => 'Raiding', '6' => 'Vanity'), '', array('id' => 'addonCategory'));}}
        </div>
      </div>
      <br/>
      <div id="uploadTextarea" class="twelve columns">
        <p>
          {{Form::label('addonDescription', "Addon's description (required)", array('class' => 'label', 'required' => 'required'));}}
          {{Form::textarea('addonDescription', '', array('class' => 'widgEditor', 'id' => 'uploadTextBox'));}}
        </p>
        <br/>
       </div>
      <div class="eight columns"></div>
      <div>
      </div>
      <div class="four columns">
        <input type="submit" value="Submit the addon" class="small radius nice blue button btRight">
      </div>
      {{Form::close();}}
    </div>
  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>


<div id="alertError" class="reveal-modal modals">
  @if (isset($errors) && count($errors->all()) > 0)
  <div class="row">
    <div class="twelve columns">
      <a class="close" data-dismiss="alert" href="#">×</a>
      <h5 class="alert-heading">Oh Snap!</h5>
      <ul>
        @foreach ($errors->all('<li>:message</li>') as $message)
        {{ $message }}
        @endforeach
      </ul>
    </div>
  </div>
  @elseif (!is_null(Session::get('status_error')))
  <div class="row">
    <div class="twelve columns">
      <h5 class="alert-heading">Oh Snap!</h5>
      @if (is_array(Session::get('status_error')))
      <ul>
        @foreach (Session::get('status_error') as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      @else
      {{ Session::get('status_error') }}
      @endif
    </div>
  </div>
  @endif
  <a class="close-reveal-modal">&#215;</a>
</div>

<div id="alertSuccess" class="reveal-modal modals">
  @if (!is_null(Session::get('status_success')))
  <div class="row">
    <div class="twelve columns">
      <h5 class="alert-heading">Success!</h5>
      @if (is_array(Session::get('status_success')))
      <ul>
        @foreach (Session::get('status_success') as $success)
        <li>{{ $success }}</li>
        @endforeach
      </ul>
      @else
      {{ Session::get('status_success') }}
      @endif
    </div>
  </div>
  @endif
  <a class="close-reveal-modal">&#215;</a>
</div>


@if(Session::has('userAddons'))
@foreach($addons as $addon)
<div {{'id="addonDelete'.$addon->id.'"'}} class="reveal-modal modals">
  <div class="row">
    <div class="twelve columns">
      <h5 class="alertHeading">Warning!</h5>
      <br>
      <div class="warning">
     Are you sure you want to <strong>DELETE</strong> <span>{{$addon->name}}</span>?
     </div>
    </div>

    <div class="btRight twelve columns">
      <br>
      {{HTML::link('profile/delete?id='.$addon->id, 'Delete', array('class'=>'small radius nice blue button btRight', 'title'=>'Delete your addon'));}}
    </div>
  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>
@endforeach
@endif


