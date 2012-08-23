@layout('layouts/frame')


@section('content')

@if(Session::has('addon'))
<?php
$addon = Session::get('addon');
$category = Session::get('category');
$picture = Picture::where('addon_id', '=', $addon->id)->first();
?>
<content>

  @if($addon->visible == 1)
  <div class="row">
    <div class="ten column">
      <hgroup class="mainTitle clearfix">
        <h2>Modify your <span class="colorWord">Addon</span></h2>
      </hgroup>
      <content class="row">
        <div class="soloEntry twelve column">
          <div class="row">
            {{Form::open_for_files('profile/modify?id='.$addon->id, 'post');}}
            <div id="profileTextarea" class="seven column">
              <img width="466" height="351" src="{{URL::to($picture->location);}}" class="postImage" alt="{{$addon->name}}" title="{{$addon->name}}"/>
              <p>
                {{Form::label('addonDescription', "Addon's description", array('class' => 'label', 'required' => 'required'));}}
                {{Form::textarea('addonDescription', $addon->description, array('class' => 'widgEditor', 'id' => 'profileTextBox'));}}
              </p>
            </div>
            <div class="entryDetails userForm five column">
              <p>
                {{Form::label('addonName', "Addon's name", array('class' => 'label'));}}<span>{{$errors->first('addonName')}}</span>
                {{Form::input('text', 'addonName', '', array('size' => '40', 'placeholder' => $addon->name));}}
              </p>
              <p>
                {{Form::label('addonVersion', "Addon's version", array('class' => 'label'));}}
                {{Form::input('text', 'addonVersion', '', array('size' => '40', 'placeholder' => $addon->version));}}
              </p>
              <p>
                {{Form::label('addonAuthor', "Addon's author", array('class' => 'label'));}}<span>{{$errors->first('addonAuthor')}}</span>
                {{Form::input('text', 'addonAuthor', '', array('size' => '40', 'placeholder' => $addon->author));}}
              </p>
              <p>
                {{Form::label('addonProfile', 'Addon (.zip format only)', array('class' => 'label'));}}<span>{{$errors->first('addonProfile')}}</span>
                {{Form::hidden('MAX_FILE_SIZE', 3145728);}}
                {{Form::file('addonProfile', array('id'=>'addonProfile'));}}
                <div id="fakeAddonProfile"></div>
              </p>
              <p>
                {{Form::label('pictureProfile', 'Picture (.jpg format only)', array('class' => 'label'));}}<span>{{$errors->first('pictureProfile')}}</span>
                {{Form::hidden('MAX_FILE_SIZE', 500000);}}
                {{Form::file('pictureProfile', array('id'=>'pictureProfile'));}}
                <div id="fakePictureProfile"></div>
              </p>
              <p>
                {{Form::label('category', 'Category', array('class' => 'label'));}}<span>{{$errors->first('category')}}</span>
                <div class="select">
                  {{Form::select('category', array('' => '', '1' => 'Economy', '2' => 'Interface', '3' => 'Professions', '4' => 'PVP', '5' => 'Raiding', '6' => 'Vanity'), $category->id, array('id' => 'addonCategory'));}}
                </div>
              </p>
              <br>
              <br>
              <p>
                <input type="submit" value="Modify" class="small radius nice blue button btRight">
              </p>
            </div>
            {{Form::close();}}
          </div>
          <br/>
          <br/>
          <div class="row">
            <div class="entryContent twelve column">
              <p>Description:</p>
              <p>{{$addon->description}}</p>
            </div>
          </div>
          <br/>
          <br/>
        </div>
      </div>
      <div class="two column">
        <div id="secondary" class="widgetArea" role="complementary">
          @include('includes.menu')
        </div>
      </div>
    </div>
  </content>
  @endif
</content>
@endif

@endsection

