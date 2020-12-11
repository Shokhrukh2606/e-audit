<div class="modal modal-black fade" id="breaking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('auditor.breaking')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="modal-content">
        
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            {{lang('breaking_blank')}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="tim-icons icon-simple-remove"></i>
        </button>
      </div>
      <div class="modal-body">
      		<div class="form-group">
            	<input type="file" name="reason" required class="form-control"
            	style="position: static;opacity: 1"
            	>
            </div>
            <div class="form-group">
               <input type="hidden" id="blank_id" name="blank_id">
            </div>
            
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            {{lang('close')}}
        </button>
       	 <button  class="btn btn-primary">
            {{lang('breaking_blank')}}
        </button>
      </div>
       
    </div>
    </form>
  </div>
</div>
<div class="card">
	<div class="card-header">
		
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<th>BLANK</th>
				<th>{{lang('action')}}</th>
			</thead>
			@foreach($blanks as $blank)
			<tr>
				<td>BLANK {{$blank->id}}</td>
				<td>
					<button type="button" 
				        	class="btn btn-link btn-danger"
					    onclick="change_modal({{$blank->id}})"
					    data-toggle="modal"
					    data-target="#breaking_modal"

					>
					    {{lang('breaking_blank')}}
				    </button>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
<script>
	function change_modal(id){
		document.getElementById('blank_id').value=id;
	}
</script>