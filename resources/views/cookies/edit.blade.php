@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Cookie
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
      <form method="post" action="{{ route('cookies.update', $cookie->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Cookie Name:</label>
          <input type="text" class="form-control" name="cookie_name" value={{ $cookie->name }} />
        </div>
        <div class="form-group">
          <label for="price">Cookie Price :</label>
          <input type="text" class="form-control" name="cookie_description" value={{ $cookie->description }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection