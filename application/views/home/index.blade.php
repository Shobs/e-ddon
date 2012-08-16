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

// Creating Tag object with tags data

$tags = new Tag;

$addonTag = $tags->addons()->pivot()->first();
var_dump($addonTag);
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
          <div> <!-- World cloud division -->
            <h2></h2> <!-- title -->
            <div class="tagList">
              <a href="#" class="tag-link-13" title="2 topics" style="font-size: 10.1176470588pt;">achievements</a>
              <a href="#" class="tag-link-20" title="1 topic" style="font-size: 8pt;">action bars</a>
              <a href="#" class="tag-link-12" title="30 topics" style="font-size: 22pt;">artwork</a>
              <a href="#" class="tag-link-10" title="4 topics" style="font-size: 12.7058823529pt;">audio &amp; video</a>
              <a href="#" class="tag-link-32" title="2 topics" style="font-size: 10.1176470588pt;">bags &amp; inventory</a>
              <a href="#" class="tag-link-11" title="22 topics" style="font-size: 20.4705882353pt;">boss encounters</a>
              <a href="#" class="tag-link-35" title="4 topics" style="font-size: 12.7058823529pt;">buffs &amp; debuffs</a>
              <a href="#" class="tag-link-23" title="3 topics" style="font-size: 11.5294117647pt;">chat &amp; communication</a>
              <a href="#" class="tag-link-30" title="1 topic" style="font-size: 8pt;">class</a>
              <a href="#" class="tag-link-15" title="7 topics" style="font-size: 15.0588235294pt;">combat</a>
              <a href="#" class="tag-link-22" title="2 topics" style="font-size: 10.1176470588pt;">companions</a>
              <a href="#" class="tag-link-27" title="12 topics" style="font-size: 17.5294117647pt;">data export</a>
              <a href="#" class="tag-link-19" title="5 topics" style="font-size: 13.6470588235pt;">development tools</a>
              <a href="#" class="tag-link-17" title="21 topics" style="font-size: 20.2352941176pt;">guild</a>
              <a href="#" class="tag-link-26" title="1 topic" style="font-size: 8pt;">libraries</a>
              <a href="#" class="tag-link-16" title="4 topics" style="font-size: 12.7058823529pt;">mail</a>
              <a href="#" class="tag-link-29" title="2 topics" style="font-size: 10.1176470588pt;">map &amp; minimap</a>
              <a href="#" class="tag-link-28" title="5 topics" style="font-size: 13.6470588235pt;">minigames</a>
              <a href="#" class="tag-link-21" title="3 topics" style="font-size: 11.5294117647pt;">miscellaneous</a>
              <a href="#" class="tag-link-33" title="3 topics" style="font-size: 11.5294117647pt;">plugins</a>
              <a href="#" class="tag-link-14" title="13 topics" style="font-size: 18pt;">quest &amp; leveling</a>
              <a href="#" class="tag-link-31" title="2 topics" style="font-size: 10.1176470588pt;">roleplay</a>
              <a href="#" class="tag-link-34" title="3 topics" style="font-size: 11.5294117647pt;">tooltip</a>
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

