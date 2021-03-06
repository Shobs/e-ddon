@layout('layouts/frame')


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
          <a href={{URL::to('category?cat='.$category->id);}} title="View all posts in Graphics">{{$category->name}}</a></span>
        </h2>
        <h1>{{$addon->name}}</h1>
      </hgroup>
    </div>
  </header>
  <content class="row">
    <div class="soloEntry twelve column">
      <div class="row">
        <div class="five column">
          <img width="466" height="351" src="{{URL::to($picture->location);}}" class="postImage" alt="{{$addon->name}}" title="{{$addon->name}}"/>
        </div>
        <div class="seven columns">
        <div class="entryDetails seven column">
          <dl class="clearfix">
            <dt>Author:</dt>
            <dd>{{$addon->author}}</dd>
            <dt>Version:</dt>
            <dd>
              {{$addon->version}}
            </dd>
            <dt>Tags:</dt>
            @foreach($tags as $tag)
            <dd class="entryTag clearfix">
              {{HTML::link('tag?tag='.$tag->id, $tag->name, array('rel'=>'bookmark'))}}
            </dd>
            @endforeach
          </dl>
        </div>
        <div class="five column">

          </div>
          <div class="twelve columns">
            <br>
            <br>
            <br>
            <br>
            {{HTML::link('download?id='.$addon->id, 'Download addon', array('class'=>'small radius nice blue button', 'title'=>'Download addon'));}}

          </div>
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

