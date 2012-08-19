@layout('layouts/modal')

<?php
// Getting all the sessions
$lastAdded = Session::get('lastAdded');
$highestRated = Session::get('highestRated');
$selected = Session::get('selected');

// Selecting data from db
$lastAddedPic = Picture::where('addon_id', '=', $lastAdded->id)->first();
$lastAddedCat = Category::where('id', '=', $lastAdded->category_id)->first();
$lastAddedTags = Addon::find($lastAdded->id)->tags()->take(5)->get();
$highestRatedPic = Picture::where('addon_id', '=', $highestRated->id)->first();
$highestRatedCat = Category::where('id', '=', $highestRated->category_id)->first();
$highestRatedTags = Addon::find($highestRated->id)->tags()->take(5)->get();
$selectedPic = Picture::where('addon_id', '=', $selected->id)->first();
$selectedCat = Category::where('id', '=', $selected->category_id)->first();
$selectedTags = Addon::find($selected->id)->tags()->take(5)->get();

// var_dump($lastAddedTags);

// Getting the six first categories
$categories = Category::take(6)->get();

// Getting tags from DB
$tags = Tag::get();

// var_dump($tags);
?>

@section('content')
<div class="row">
  <div class="seven columns">
    <div class="twelve columns">
      <h2 class="mainTitle">addon by <span class="colorWord">category</span></h2>
    </div>

    <!-- Dynamic generation of categories -->
    @foreach($categories as $category)
    <div class="category four columns">
      <a href="category?cat={{$category->id}}"title="View addon list in {{Str::lower($category->name); $category->name}}">
        {{HTML::image($category->image, 'placeholder+image');}}
        <h2 class="catTitle">{{$category->name}}</h2>
        <p></p>
      </a>
    </div>
    @endforeach
  </div>

  <!-- Search Box -->
  <div class="five columns">
    <div id="search">
      {{Form::open('search', 'get', array('role'=>'search', 'id' => 'liveSearch'));}}
      {{Form::input('text', 's', '', array('id'=>'s', 'placeholder'=>'search an addon'));}}
      {{Form::input('submit', '', 'search', array('class'=>'small radius nice blue button'));}}
      {{Form::close();}}

    </div>
    <div id="searchHelper">
      <ul id="searchResults"></ul>
    </div>

    <!-- Tag cloud -->
    <div id="tagCloudArea" class="twelve columns">
      <h2 class="mainTitle">addon by <span class="colorWord">tags</span></h2>
      <div class="tagCloud">
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
            }

            ?>
          {{HTML::link('tag?tag='.$currentTag->id, $tag->name, array('style' => 'font-size: '.$tagSize.'em', 'class' =>'tag'));}}
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div id="featuredPost"class="twelve columns">
    <h2 class="sectionTitle"><span>featured</span></h2>

    <!-- Last added addon -->
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
              @foreach($lastAddedTags as $lastAddedTag)
              <li>
                {{HTML::link('tag?tag='.$lastAddedTag->id, $lastAddedTag->name, array('rel'=>'tag'));}}
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </article>
    </div>

    <!-- Highest rated addon -->
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
              @foreach($highestRatedTags as $highestRatedTag)
              <li>
                {{HTML::link('tag?tag='.$highestRatedTag->id, $highestRatedTag->name, array('rel'=>'tag'));}}
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </article>
    </div>

    <!-- Selected addon -->
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
              @foreach($selectedTags as $selectedTag)
              <li>
                {{HTML::link('tag?tag='.$selectedTag->id, $selectedTag->name, array('rel'=>'tag'));}}
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </article>
    </div>

  </div>
</div>

<!-- Scroll back to top tab -->
<div class="row">
  <div class="twelve columns" style="display: block; ">
    <div class="scrollToTop">
      <a href="#">ScrollTotop</a>
    </div>
  </div>
</div>
@endsection

