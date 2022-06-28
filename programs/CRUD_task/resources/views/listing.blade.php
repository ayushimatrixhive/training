
@extends('layouts.app')
@section('content')
<div class="container">
            <div class =""> 
            <table class="table table-striped table-dark"  id="myTable">
            <thead>
            @if(session()->has('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">cetegory</th>
                <th scope="col">price</th>
                <th scope="col">image</th>
                <th scope="col">discription</th>
                <th scope="col">status</th>
                <th scope="col">quantity</th>
                <th scope="col">Action </th>
                <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <th>{{$student->id}}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->cetegory}}</td>
                    <td>{{$student->price}}</td>
                    <td><img src="{{ asset('uploads/students/'.$student->image) }}" style="height: 100px; width: 150px;"></td>
                    <td>{{$student->discription}}</td>
                    <td>{{$student->status}}</td>
                    <td>{{$student->quantity}}</td>
                    <td> <a href="{{url('/edit',$student->id )}}" class="btn btn-info btn-sm">Edit</a></td>
                    <td> <a href="{{url('/delete',$student->id )}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>

    @endsection
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script>
			$(document).ready( function () {
				$('#myTable').DataTable();

			} );
		</script>
<!-- </body>

</html> -->