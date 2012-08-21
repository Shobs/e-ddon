@if(URI::is('category'))
  {{'<li class="current">'}}
@elseif(URI::is('tag'))
  {{'<li class="current">'}}
@elseif(URI::is('search'))
  {{'<li class="current">'}}
@elseif(URI::is('date'))
  {{'<li class="current">'}}
@elseif(URI::is('profile/addons'))
  {{'<li class="current">'}}
@else
  {{'<li>'}}
@endif
  {{HTML::link('order/date', 'by date', array('class' => 'date', 'title' => 'Sort addons by added date'));}}
</li>
@if(URI::is('asc'))
  {{'<li class="current">'}}
@else
  {{'<li>'}}
@endif
  {{HTML::link('order/asc', 'by name', array('class' => 'name', 'title' => 'Sort addons by name'));}}
</li>
@if(URI::is('rate'))
  {{'<li class="current">'}}
@else
  {{'<li>'}}
@endif
  {{HTML::link('order/rate', 'by rate', array('class' => 'rate', 'title' => 'Sort addons by rate'));}}
</li>