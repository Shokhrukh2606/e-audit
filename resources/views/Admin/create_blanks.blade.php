<div class="card">
	<div class="card-header">
		<h3>Create Blanks</h3>
	</div>
	<div class="card-body">
		<form action="{{url()->current()}}" method="POST">
			@csrf
			<div class="form-group">
			<input 
			  type="number" 
			  placeholder="Quantity" 
			  class="form-control" 
			  name="quantity"
			>
			</div>
			<button class="btn btn-simple btn-success">Create</button>
		</form>
	</div>
</div>