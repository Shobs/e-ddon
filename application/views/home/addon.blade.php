@layout('layouts/frame')


@section('content')

<header class="row">
  <div class="twelve columns">
    <div class="pageHeader ten columns ">
      <h1 class="mainTitle">addon's type <span class="colorWord">Category</span></h1>
      <div class="entryTag"><span class="catTag">Category's tags</span><span class="arrow"></span></div>
    </div>
    <div class="two columns">
      <ul id="sortButton" class="clearfix">
        <li><p>order by:</p></li>
        <li class="current">
          <a class="date" href="?orderby=date" title="Sort tools by added date">by date</a>
        </li>
        <li>
          <a class="name" href="?orderby=title&amp;order=ASC" title="Sort tools by name">by name</a>
        </li>
        <li>
          <a class="rate" href="?r_sortby=highest_rated&amp;r_orderby=desc" title="Sort tools by rate">by rate</a>
        </li>
      </ul>
    </div>
  </div>
</header>

@if(Session::has('addons'))
<?php $addons = Session::get('addons');?>
<content class="row">
@foreach($addons as $addon)
  <div id="addonLeft" class="three column">
    <a href="http://www.toolmarklets.com/japonizer/" class="imgHolder" title="See Japonizer detail's">
      <img class="attachment-post-thumbnail wp-post-image" title="Japonizer" alt="background pattern in japan style" src="http://www.toolmarklets.com/wp-content/uploads/2012/01/japonizer-286x211.jpg" width="260" height="200" style="display: inline; ">
    </a>
    <div class="entry-details">
      <header class="entry-header">
        <h2 class="entry-title">
          <a href="http://www.toolmarklets.com/japonizer/" title="See Japonizer detail's" rel="bookmark">Japonizer </a>
        </h2>
        <div class="rate-it"><span></span>4</div>
      </header>
      <p class="info">by ワノコト</p>
      <div class="entry-tag">
        <ul>
          <li>
            <a href="http://www.toolmarklets.com/tag/image-generator/" rel="tag">image generator</a>
          </li>
        </ul>
      </div>
  </div>
</div>
@endforeach
</content>
@endif
</content>

@endsection

