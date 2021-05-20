@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				@if(Session::has('message'))
					<div class="alert alert-success">
						{{Session::get('message')}}
					</div>
				@endif
				<div class="card mt-5">
					<div class="card-header">
						Create A new Book
					</div>
					<div class="card-body">	

						<form action="{{route('book.store')}}"method="post" enctype="multipart/form-data">
							@csrf
							<label>Name of book</label>
							<input type="text" name="name" class="form-control">
							@if($errors->has('name'))
								<span class="text-danger">{{$errors->first('name')}}</span>	
							@endif	
							<br>
							<label>Description of book</label>
							<textarea name="description" class="form-control"></textarea>
							@if($errors->has('description'))
								<span class="text-danger">{{$errors->first('description')}}</span>	
							@endif
							<br>
							<label>Category of book</label>
							<select name="category" class="form-control">
								<option value="fiction">Fiction</option>
								<option value="non-fiction">Non-Fiction</option>
								<option value="biography">Biography</option>
							</select>
							@if($errors->has('category'))
								<span class="text-danger">{{$errors->first('category')}}</span>	
							@endif
							<label>Image of book</label>
							<input type="file" name="image" class="form-control">
							@if($errors->has('image'))
								<span class="text-danger">{{$errors->first('image')}}</span>	
							@endif
							<br>	
							<input type="submit" value="Submit" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


