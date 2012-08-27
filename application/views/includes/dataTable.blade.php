 <thead>
  <tr>
  	<th></th>
  	<?php $i = 0 ?>
  	<!-- Assigning DB column names to TH -->
  	@foreach($data as $row)
  		@while($i == 0)
      	@foreach($row as $cellId => $key)
        	<th>{{$cellId}}<span></span></th>
		@endforeach
		<?php $i++ ?>
		@endwhile
    @endforeach
  </tr>
</thead>
<tbody>
    @foreach($data as $row)
        <?php $rowId = $row['id'];?>
        <!-- Creating an array with the index names -->
        @foreach($row as $cellId => $key)
        	<?php $cellIds[] = $cellId;?>
		@endforeach

		<!-- Creating an array with the cell info -->
		@foreach($row as $cell)
			<?php $cells[] = $cell;?>
		@endforeach

		<!-- Creating the cells -->
        <tr id="{{$rowId}}" class="tr_edit">
        	<td>
         		{{Form::checkbox($rowId, '', '', array('id' => 'check_'.$rowId, 'class' => 'checkbox'));}}
        	</td>
            @for($i = 0; $i < sizeof($row); $i++)
	            <td class="td_edit">
	            	<span id="{{$cellIds[$i].'_'.$rowId}}" class="cell_text">{{$cells[$i]}}</span>
	            	{{Form::input('text', '', $cells[$i], array('class' => 'cell_edit_box', 'id' => $cellIds[$i].'_input_'.$rowId));}}
	            </td>
            @endfor
        </tr>
        <?php
        // Resetting the arrays
        $cellIds = [];
        $cells = [];
        ?>
  @endforeach
</tbody>