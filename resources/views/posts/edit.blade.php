@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('posts.update',['post'=>$post->id]) }}">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title" type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea  name="description"  class="form-control" id="" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Users</label>
    <select name="user_id" class="form-control">
    @foreach($users as $user)
      <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Save Updates</button>
</form>
@endsection