@layout('layouts/frame')


@section('content')
<?php $user = Auth::user();?>

<div class="row">
  <div class="nine columns">

    <h1 class="mainTitle">your <span class="colorWord">Addons</span></h1>
    <div class="userInfo clearfix">
      <div class="userEntry">
        <h3 class="entryTitle">Welcome, <span class="colorWord">{{$user->firstname}}</span></h3>
        <p>Feel free to add, modify or delete your addons</p>
      </div>
    </div>
    @if(Session::has('userAddons'))
    <?php
    $addons = Session::get('userAddons');
    ?>
    <content class="row">
      @foreach($addons as $addon)
      <?php
      $picture = Picture::where('addon_id', '=', $addon->id)->first();
      $tags = Addon::find($addon->id)->tags()->take(3)->get();
      ?>
      @if($addon->visible == 1)
      <div id="addonLeft" class="addonCat three column">
        <a href={{URL::to('addon?id='.$addon->id);}} class="imgHolder" title="{{$addon->name}}">
          <div class="imageContainer">
            <img class=" postImage" title="{{$addon->name}}" src="{{URL::to($picture->thumbcat)}}" width="260" height="200" style="display: inline; ">
          </div>
        </a>
        <div class="entryDetails">
          <header class="entryHeader">
            <h2 class="entryTitle">
              <a href={{URL::to('addon?id='.$addon->id);}} title="See {{$addon->name}} detail's" rel="bookmark">{{$addon->name}}</a>
            </h2>
          </header>
          <p class="info">by {{$addon->author}}</p>
          <div class="entryTag">
            <ul>
              @foreach($tags as $tag)
              <li>
                {{HTML::link('tag?tag='.$tag->id, $tag->name, array('rel'=>'bookmark'));}}
              </li>
              @endforeach
            </ul>
          </div>
          <div class="rateIt"><span></span>{{$addon->rating}}</div>
        </div>
      </div>
      @endif
      @endforeach
      @else
      You have no addons!
    </content>
    @endif


  </div>

  <div class="three columns">
    <div>
      <ul id="sortButton" class="clearfix">
        <li><p>order by:</p></li>
        @include('includes.order')
      </ul>
    </div>
    <div id="secondary" class="widgetArea" role="complementary">
      @include('includes.menu')
    </div>
  </div>
</div>
@endsection

