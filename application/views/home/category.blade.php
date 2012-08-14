@layout('layouts/modal')


@section('content')
<?php
$category = Session::get('category');
?>

<header class="row">
  <div class="twelve columns">
    <div class="pageHeader ten columns ">
      <h1 class="mainTitle">addon's type <span class="colorWord">{{$category->name}}</span></h1>
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
<?php
$addons = Session::get('addons');
?>
<content class="row">
  @foreach($addons as $addon)
  <?php
   $picture = Picture::where('addon_id', '=', $addon->id)->first();
  ?>
  @if($addon->visible == 1)
  <div id="addonLeft" class="addonCat three column">
    <a href="addon?id={{$addon->id}}" class="imgHolder" title="{{$addon->name}}">
      <div class="imageContainer">
      <img class=" postImage" title="{{$addon->name}}" src="{{$picture->location}}" width="260" height="200" style="display: inline; ">
      </div>
    </a>
    <div class="entryDetails">
      <header class="entryHeader">
        <h2 class="entryTitle">
          <a href="{{$addon->name}}" title="See {{$addon->name}} detail's" rel="bookmark">{{$addon->name}}</a>
        </h2>
        <div class="rateIt"><span></span>{{$addon->rating}}</div>
      </header>
      <p class="info">by {{$addon->author}}</p>
      <div class="entryTag">
        <ul>
          <li>
            <a href="#" rel="tag">tag</a>
          </li>
        </ul>
      </div>
    </div>
    <br/>
  </div>
  @endif
  @endforeach
</content>
@endif
</content>

@endsection

