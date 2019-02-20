@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Cookie Name</td>
          <td>Cookie Description</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cookies as $cookie)
        <tr>
            <td>{{$cookie->id}}</td>
            <td>{{$cookie->name}}</td>
            <td>{{$cookie->description}}</td>
            <td><a href="{{ route('cookies.edit',$cookie->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('cookies.destroy', $cookie->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection