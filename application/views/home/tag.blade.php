@layout('layouts/modal')


@section('content')
<?php $tag = Session::get('tag');?>

<header class="row">
  <div class="twelve columns">
    <div class="pageHeader ten columns ">
      <h1 class="mainTitle">addon's type <span class="colorWord">{{$tag->name}}</span></h1>
    </div>
    <div class="two columns">
      <ul id="sortButton" class="clearfix">
        <li><p>order by:</p></li>
        <li class="current">
          <a class="date" href="?orderby=date" title="Sort addons by added date">by date</a>
        </li>
        <li>
          <a class="name" href="?orderby=title&amp;order=ASC" title="Sort addons by name">by name</a>
        </li>
        <li>
          <a class="rate" href="?r_sortby=highest_rated&amp;r_orderby=desc" title="Sort addons by rate">by rate</a>
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
   $addonTags = Addon::find($addon->id)->tags()->take(3)->get();
  ?>
  @if($addon->visible == 1)
  <div id="addonLeft" class="addonCat three column">
    <a href="addon?id={{$addon->id}}" class="imgHolder" title="{{$addon->name}}">
      <div class="imageContainer">
      <img class=" postImage" title="{{$addon->name}}" src="{{$picture->thumbcat}}" width="260" height="200" style="display: inline; ">
      </div>
    </a>
    <div class="entryDetails">
      <header class="entryHeader">
        <h2 class="entryTitle">
          <a href="addon?id={{$addon->id}}" title="See {{$addon->name}} detail's" rel="bookmark">{{$addon->name}}</a>
        </h2>

      </header>
      <p class="info">by {{$addon->author}}</p>
      <div class="entryTag">
        <ul>
          @foreach($addonTags as $addonTag)
            <li>
              {{HTML::link('tag?tag='.$addonTag->id, $addonTag->name, array('rel'=>'bookmark'))}}
            </li>
          @endforeach
        </ul>
      </div>
      <div class="rateIt"><span></span>{{$addon->rating}}</div>
    </div>
  </div>
  @endif
  @endforeach
</content>
@endif
</content>
@endsection

