<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>CRUD FORM</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6"> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif -->
<div class="container mt-3">
  <h2> form</h2>
  <form action=" "  method ="post">
    @csrf
    @method('PUT')
    <div class="mb-3 mt-3">
      <label for=" ">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$student->name}}">
      <!-- @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif -->
    </div>
    <div class="mb-3 mt-3">
      <label for=" ">Cetegory:</label>
      <input type="text" class="form-control" id="cetegory" placeholder="Enter cetegory" name="cetegory" value="{{$student->cetegory}}">
    </div>

    <div class="mb-3">
      <label for=" ">Price:</label>
      <input type="float" class="form-control" id="price" placeholder="Enter price" name="price" value="{{$student->price}}">
    </div>

    <div class="mb-3">
      <label for=" ">Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter image" name="image" value="{{$student->image}}">
    </div>

    <div class="mb-3">
            <label for=" ">Discription:</label>
            <input type="text" class="form-control" id="discription" placeholder="Enter discription" name="discription" value="{{$student->discription}}">
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
        <br />
  
    </div>

    <div class="mb-3">
      <label for=" ">quantity:</label>
      <input type="int" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity" value="{{$student->quantity}}">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
</body>
</html>