@layout('layouts/modal')

<?php
// Getting all the sessions
$lastAdded = Session::get('lastAdded');
$highestRated = Session::get('highestRated');
$selected = Session::get('selected');

// Selecting data from Sessions
$lastAddedPic = Picture::where('addon_id', '=', $lastAdded->id)->first();
$lastAddedCat = Category::where('id', '=', $lastAdded->category_id)->first();
$highestRatedPic = Picture::where('addon_id', '=', $highestRated->id)->first();
$highestRatedCat = Category::where('id', '=', $highestRated->category_id)->first();
$selectedPic = Picture::where('addon_id', '=', $selected->id)->first();
$selectedCat = Category::where('id', '=', $selected->category_id)->first();

// Getting tags from DB
$tags = Tag::get();

// var_dump($tags);
?>

@section('content')
<div class="row">
  <div class="seven columns">
    <div class="twelve columns">
      <h2 class="mainTitle">addon by <span class="colorWord">type</span></h2>
    </div>
    <div class="four columns">
      <a href="category?cat=1" title="View addon list in Economy">
        {{HTML::image('http://placehold.it/180x180', 'placeholder+image');}}
        <h2 class="catTitle">Economy</h2> <!-- category name -->
        <p></p> <!-- category description -->
      </a>
    </div>
    <div class="four columns">
      <a href="category?cat=2" title="View addon list in Gathering">
        {{HTML::image('http://placehold.it/180x180', 'placeholder+image');}}
        <h2 class="catTitle">Gathering</h2>
        <p></p>
      </a>
    </div>
    <div class="four columns">
      <a href="category?cat=3" title="View addon list in Interface" >
        {{HTML::image('http://placehold.it/180x180', 'placeholder+image');}}
        <h2 class="catTitle">Interface</h2>
        <p></p>
      </a>
    </div>
    <div class="four columns">
      <a href="category?cat=4" title="View addon list in PVP" >
        {{HTML::image('http://placehold.it/180x180', 'placeholder+image');}}
        <h2 class="catTitle">PVP</h2>
        <p></p>
      </a>
    </div>
    <div class="four columns">
      <a href="category?cat=5" title="View addon list in Raiding" >
        {{HTML::image('http://placehold.it/180x180', 'placeholder+image');}}
        <h2 class="catTitle">Raiding</h2>
        <p></p>
      </a>
    </div>
    <div class="four columns">
      <a href="category?cat=6" title="View addon list in Vanity" >
        {{HTML::image('http://placehold.it/180x180', 'placeholder+image');}}
        <h2 class="catTitle">Vanity</h2>
        <p></p>
      </a>
    </div>
  </div>


      <div class="five columns">
        <div id="search">
          {{Form::open('#', 'get', array('role'=>'search'));}}
          {{Form::search('search', '', array('id'=>'s', 'placeholder'=>'search an addon'));}}
          {{Form::input('submit', '', 'search', array('class'=>'small radius nice blue button'));}}
          {{Form::close();}}
        </div>
        <div class="twelve columns">
          <h2 class="mainTitle">addon by <span class="colorWord">tags</span></h2>
          <div class="tagCloud"> <!-- World cloud division -->
            <div class="tagsList">
              @foreach($tags as $tag)
                <?php $currentTag = Tag::where('id', '=', $tag->id)->first();?>
                @if($currentTag->frequency != 0)
                  <?php
                  if (($tag->frequency)/10 < 1) {
                    $tagSize = ($tag->frequency)/10 + 1;
                  }elseif (($tag->frequency)/10 > 2 ) {
                    $tagSize = 2;
                  }else{
                    $tagSize = ($tag->frequency)/10;
                  }?>
                  {{HTML::link('#', $tag->name, array('style' => 'font-size: '.$tagSize.'em', 'class' =>'tag'));}}
                @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
      <div id="featuredPost"class="twelve columns"> <!-- Featured addons -->
        <h2 class="sectionTitle"><span>featured</span></h2>
        <div class="four columns">
          <h3 class="featuredSectionTitle">last <span class="colorWord">added</span></h3>
          {{HTML::link('category?cat=7', 'see all »', array('class'=>'linkPage btColor2', 'title'=>'see all the last added addons'));}}
          <article id="#"> <!-- post number -->
            <a href="addon?id={{$lastAdded->id}}" class="imgHolder">
              {{HTML::image( $lastAddedPic->thumbfeat , $lastAdded->name , array('title'=> $lastAdded->name, 'class' => 'postImage'));}}
            </a>
            <div class="entryDetails">
              <header class="entryHeader">
                <h2 class="entryTitle">
                  {{HTML::link('addon?id='.$lastAdded->id, $lastAdded->name, array('rel'=>'bookmark'));}}
                </h2>
              </header>
              <p class="info">by {{$lastAdded->author}}, in
                {{HTML::link('category?cat='.$lastAdded->category_id, $lastAddedCat->name, array('rel'=>'section'));}}
              </p>
              <div class="entryTag">
                <ul>
                  <li>
                    {{HTML::link('#', 'tag', array('rel'=>'tag'));}}
                  </li>
                  <li>
                    {{HTML::link('#', 'tag', array('rel'=>'tag'));}}
                  </li>
                </ul>
              </div>
            </div>
          </article>
        </div>
         <div class="four columns">
          <h3 class="featuredSectionTitle">highest <span class="colorWord">rated</span></h3>
          {{HTML::link('category?cat=8', 'see all »', array('class'=>'linkPage btColor2', 'title'=>'see all the highest rated addons'));}}
          <article id="#">
            <a href="addon?id={{$highestRated->id}}" class="imgHolder">
              {{HTML::image($highestRatedPic->location , $highestRated->name, array('title'=>'placeholder', 'class' => 'postImage'));}}
            </a>
            <div class="entryDetails"> <!-- entry details -->
              <header class="entryHeader">
                <h2 class="entryTitle"> <!-- entry title -->
                  {{HTML::link('addon?id='.$highestRated->id, $highestRated->name, "addon's name", array('rel'=>'bookmark'));}}
                </h2>
              </header>
              <p class="info">by {{$highestRated->author}}, in
                {{HTML::link('category?cat='.$highestRated->category_id, $highestRatedCat->name, array('rel'=>'section'));}}
              </p>
              <div class="entryTag">
                <ul>
                  <li>
                    {{HTML::link('#', 'tag', array('rel'=>'tag'));}}
                  </li>
                  <li>
                    {{HTML::link('#', 'tag', array('rel'=>'tag'));}}
                  </li>
                </ul>
              </div>
            </div>
          </article>
        </div>
         <div class="four columns">
          <h3 class="featuredSectionTitle">eddon <span class="colorWord">selected</span></h3>
          <article id="#">
            <a href="addon?id={{$selected->id}}" class="imgHolder">
              {{HTML::image( $selectedPic->location, $selectedPic->name, array('title'=> $selectedPic->name, 'class' => 'postImage'));}}
            </a>
            <div class="entryDetails"> <!-- entry details -->
              <header class="entryHeader">
                <h2 class="entryTitle"> <!-- entry title -->
                  {{HTML::link('addon?id='.$selected->id, $selected->name, array('rel'=>'bookmark'));}}
                </h2>
              </header>
              <p class="info">by {{$selected->author}}, in
                {{HTML::link('category?cat='.$selected->category_id, $selectedCat->name, array('rel'=>'section'));}}
              </p>
              <div class="entryTag">
                <ul>
                  <li>
                    {{HTML::link('#', 'tag', array('rel'=>'tag'));}}
                  </li>
                  <li>
                    {{HTML::link('#', 'tag', array('rel'=>'tag'));}}
                  </li>
                </ul>
              </div>
            </div>
          </article>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="twelve columns" style="display: block; ">
        <div class="scrollToTop">
        <a href="#">ScrollTotop</a>
        </div>
      </div>
    </div>
@endsection

