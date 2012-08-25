       @if(Auth::guest())
          <div id="btLogin">
          <!-- if user is logged shows logout button, if not login button -->
          {{HTML::link('#', 'Login / Register', array('class'=>'small radius nice blue button', 'title'=>'log in or register', 'data-reveal-id'=>'loginModal'));}}
          </div>
        @else
          <div id="userHeader">
            <div class="userContent clearfix">
              <div class="userInfo">
                <div class="userAvatar four column">
                  @if(Auth::user()->role == 100)
                  <a href="{{URL::to('admin/profile');}}" title="Acces to your profile">
                    {{HTML::image('img/avatar.png', 'avatar');}}
                  </a>
                  @else
                  <a href="{{URL::to('profile/user');}}" title="Acces to your profile">
                    {{HTML::image('img/avatar.png', 'avatar');}}
                  </a>
                  @endif
                </div>
                <div class="userEntry eight column">
                  <h3 class="entryTitle">Welcome,
                    @if(Auth::user()->role == 100)
                      {{HTML::link('admin/profile', Str::title($user->firstname), array('title' => 'Access to your profile'));}}
                    @else
                      {{HTML::link('profile/user', Str::title($user->firstname), array('title' => 'Access to your profile'));}}
                    @endif
                  </h3>
                  <div class="userAccess">
                    @if(Auth::user()->role == 100)
                      {{HTML::link('admin/addons', 'Addons', array('title' => 'Access all addons', 'class' => 'small radius nice blue button'));}}
                    @else
                      {{HTML::link('profile/addons', 'My addons', array('title' => 'Access to your addons', 'class' => 'small radius nice blue button'));}}
                    @endif
                    {{HTML::link('auth/logout', 'log out', array('title' => 'Log out from eddons'));}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif