<div>
  <ul class="menu">
    @if(URI::is('profile/addons'))
      {{'<li class="current">'}}
    @elseif(URI::is('profile/modify'))
      {{'<li class="current">'}}
    @else
     {{'<li>'}}
    @endif
      {{HTML::link('profile/addons', 'Addons');}}
    </li>
    @if(URI::is('user'))
      {{'<li class="current">'}}
    @else
     {{'<li>'}}
    @endif
      {{HTML::link('profile/user', 'Profile');}}
    </li>
    <li>
      {{HTML::link('auth/logout', 'Logout');}}
    </li>
  </ul>
</div>