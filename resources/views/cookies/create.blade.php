@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Cookie
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cookies.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Cookie Name:</label>
              <input type="text" class="form-control" name="cookie_name"/>
          </div>
          <div class="form-group">
              <label for="price">Description:</label>
              <input type="text" class="form-control" name="cookie_description"/>
          </div>
          <div class="form-group">
              <label for="price">Email to notificate:</label>
              <input type="text" class="form-control" name="email"/>
          </div>

          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection