
@extends('layouts.app')
@section('content')
<div class="container mt-3">
 	 <h2>Update form</h2>
  	<form action=" "   method ="post"  enctype="multipart/form-data">
  	  @csrf
   	 @method('PUT')
				<div class="mb-3 mt-3">
					<label for=" ">Name</label>
					<input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$student->name}}">
					<span style="color :red"> @error('name'){{$message}}@enderror</span>
				</div>

				<div class="mb-3 mt-3">
					<label for=" ">Cetegory:</label>
					<select name="cetegory" id="cetegory" class="form-control" value="{{$student->cetegory}}">
					<option value=" ">Select cetegory</option>
						@foreach ($category as $stu)
								<option value="{{$stu->name}}">{{$stu->name}}</option>
						@endforeach
				</select> 
				<!-- <input type="text" class="form-control" id="cetegory" placeholder="Enter cetegory" name="cetegory"> -->
					<span style="color :red"> @error('cetegory'){{$message}}@enderror</span>
				</div>

				<div class="mb-3 mt-3">
					<label for=" ">Sab Category:</label>
					<select name="sab_category" id="sab_category" class="form-control" value="{{$student->sab_category}}">
					<option value=" ">Select sab_category</option>
						@foreach ($sab_category as $stu)
						<option value="{{$stu->name}}">{{$stu->name}}</option>
						@endforeach
					</select> 
						<!-- <input type="text" class="form-control" id="cetegory" placeholder="Enter cetegory" name="cetegory"> -->
						<span style="color :red"> @error('sab_cetegory'){{$message}}@enderror</span>
				</div>

				<div class="mb-3">
					<label for=" ">Price:</label>
					<input type="float" class="form-control" id="price" placeholder="Enter price" name="price" value="{{$student->price}}">
					<span style="color :red"> @error('price'){{$message}}@enderror</span>
				</div>

				<div class="mb-3">
					<label for=" ">Image:</label>
					<input type="file" class="form-control" id="image" placeholder="Enter image" name="image" value="{{$student->image}}">
					<span style="color :red"> @error('image'){{$message}}@enderror</span>
				</div>

				<div class="mb-3">
					<label for=" ">Discription:</label>
					<input type="text" class="form-control" id="discription" placeholder="Enter discription" name="discription" value="{{$student->discription}}">
					<span style="color :red"> @error('discription'){{$message}}@enderror</span>
				</div>

				<div class="mb-3">
					<label for=" ">Status:</label>
					<input type="text" class="form-control" id="status" placeholder="Enter status" name="status" value="{{$student->status}}">
					<br/>
						<input type="radio" name="status" id="active">
						<label for="active">active</label>
						<!-- <br /> -->
						<input type="radio" name="status" id="inactive">
						<label for="inactive">inactive</label>
						<br/>
				</div>

				<div class="mb-3">
					<label for=" ">quantity:</label>
					<input type="int" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity" value="{{$student->quantity}}">
					<span style="color :red"> @error('quantity'){{$message}}@enderror</span>
				</div>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>
		</div>
    </body>
</html>
@endsection