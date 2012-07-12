@layout('layouts/home')


@section('content')

<div id="page" class="">
  <div id="main" class="">
    <div id="content" role="main">
      <header class="pageHeader">
        <h1 class="mainTitle">eddon's type <span class="colorWord"> "Category" </span></h1>
        <div class="entryTag"><span class="catTag">Graphics's tags</span>
          <span class="arrow"></span>
        </div>
      </header>
      <ul id="sortButton" class="">
        <li><p>order by:</p></li>
        <li class="current"><a class="date" href="?orderby=date" title="Sort addons by added date">by date</a></li>
        <li><a class="name" href="?orderby=title&amp;order=ASC" title="Sort addons by name">by name</a></li>
        <li><a class="rate" href="?r_sortby=highest_rated&amp;r_orderby=desc" title="Sort addons by rate">by rate</a></li>
      </ul>
    </div>
  </div>
</div>

@endsection

