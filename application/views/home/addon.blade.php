@layout('layouts/modal')


@section('content')

@if(Session::has('addon'))
<?php
$addon = Session::get('addon');
$category = Session::get('category');
$picture = Picture::where('addon_id', '=', $addon->id)->first();
$tags = Session::get('tags')
 ?>
<content>

@if($addon->visible == 1)
<header class="row">
  <div class="twelve column">
    <hgroup class="mainTitle clearfix">
      <h2>addon's type <span class="colorWord">
        <a href="category?cat={{$category->id}}" title="View all posts in Graphics">{{$category->name}}</a></span>
      </h2>
      <h1>{{$addon->name}}</h1>
    </hgroup>
  </div>
</header>
<content class="row">
  <div class="soloEntry twelve column">
    <div class="row">
      <div class="five column">
        <img width="466" height="351" src="{{$picture->location}}" class="postImage" alt="{{$addon->name}}" title="{{$addon->name}}"/>
      </div>
      <div class="entryDetails four column">
        <dl class="clearfix">
          <dt>Author:</dt>
          <dd>{{$addon->author}}</dd>
          <dt>Tags:</dt>
          @foreach($tags as $tag)
             <dd class="entryTag clearfix">
              {{HTML::link('tag?tag='.$tag->id, $tag->name, array('rel'=>'bookmark'))}}
            </dd>
          @endforeach
          <dt>Version:</dt>
          <dd>
            {{$addon->version}}
          </dd>
        </dl>
      </div>
      <div class="three column">
      </div>
    </div>
    <br/>
    <br/>
    <div class="row">
      <div class="entryContent ten column">
        <p>Description:</p>
        <p>{{$addon->description}}</p>
      </div>
    </div>
    <br/>
    <br/>
  </div>
</content>
@endif
</content>
@endif

@endsection

