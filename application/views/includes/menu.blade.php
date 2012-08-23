<div>
  <ul class="menu">
    <!-- Addons menu -->
    @if(URI::is('profile/addons'))
      {{'<li class="current">'}}
    @elseif(URI::is('profile/modify'))
      {{'<li class="current">'}}
    @elseif(URI::is('admin/addons'))
      {{'<li class="current">'}}
    @elseif(URI::is('admin/modify'))
      {{'<li class="current">'}}
    @else
     {{'<li>'}}
    @endif
    @if(Auth::user()->role == 100)
      {{HTML::link('admin/addons', 'Addons');}}
    @else
      {{HTML::link('profile/addons', 'Addons');}}
    @endif
    </li>

    <!-- Dashboard menu -->
    @if(Auth::user()->role == 100)
     @if(URI::is('admin'))
      {{'<li class="current">'}}
    @else
     {{'<li>'}}
    @endif
      {{HTML::link('admin', 'Dashboard');}}
    </li>
    @endif

     <!-- Files menu -->
    @if(Auth::user()->role == 100)
     @if(URI::is('admin/files'))
      {{'<li class="current">'}}
    @else
     {{'<li>'}}
    @endif
      {{HTML::link('admin/files', 'Files');}}
    </li>
    @endif

    <!-- Profile menu -->
    @if(URI::is('user'))
      {{'<li class="current">'}}
    @elseif(URI::is('admin/profile'))
      {{'<li class="current">'}}
    @else
     {{'<li>'}}
    @endif
     @if(Auth::user()->role == 100)
      {{HTML::link('admin/profile', 'Profile');}}
    @else
      {{HTML::link('profile/user', 'Profile');}}
    @endif


    </li>

    <!-- Users menu -->
    @if(Auth::user()->role == 100)
     @if(URI::is('user'))
      {{'<li class="current">'}}
    @elseif(URI::is('admin/users'))
      {{'<li class="current">'}}
    @else
     {{'<li>'}}
    @endif
      {{HTML::link('admin/users', 'Users');}}
    </li>
    @endif


    <!-- Logout menu -->
    <li>
      {{HTML::link('auth/logout', 'Logout');}}
    </li>
  </ul>
</div>