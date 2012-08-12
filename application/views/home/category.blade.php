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
  <?php
  $id = $addon->id;
  $name = $addon->name;
  $author = $addon->author;
  $rating = $addon->rating;
  $category = $addon->category;
  $visible = $addon->visible;
  ?>
  @if($visible == 1)
  <div id="addonLeft" class="addonCat three column">
    <a href="<?php echo 'adddon/'.$id?>" class="imgHolder" title="<?php echo $name?>">
      <img class="attachment-post-thumbnail postImage" title="Japonizer" src="http://www.toolmarklets.com/wp-content/uploads/2012/01/japonizer-286x211.jpg" width="260" height="200" style="display: inline; ">
    </a>
    <div class="entryDetails">
      <header class="entryHeader">
        <h2 class="entryTitle">
          <a href="<?php echo 'adddon/'.$id ?>" title="See <?php echo $name?> detail's" rel="bookmark"><?php echo $name?></a>
        </h2>
        <div class="rateIt"><span></span><?php echo $rating?></div>
      </header>
      <p class="info">by <?php echo $author?></p>
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

