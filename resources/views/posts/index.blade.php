
@extends('layouts.app')
@section('content')
    <div class="container m-5">
    <a href="{{ route('posts.create') }}" class="btn btn-success mb-5">Create Post</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <!-- <th scope="col">Description</th> -->
      <th scope="col">Posted By</th>
      <th scope="col">CreatedAt</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $post['id'] }}</th>
      <td>{{ $post->title }}</td>
      <!-- <td>{{ $post->description }}</td> -->
      <td>{{ $post->user ? $post->user->name : 'not exist'}}</td>
      
      <td>{{ $post->created_at->format('d-m-Y') }}</td>
      <td><a href="{{ route('posts.show',['post'=>$post->id]) }}" class="btn btn-primary">View Details</a>
          <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="btn btn-success">Edit</a>
          
        <form action="{{ route('posts.destroy',['post'=>$post->id]) }}" method="POST" class="d-inline">
      @csrf
      @method('DELETE')
      <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post ?')">Delete</button>
        </form>
      
      
              
      </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

    </div>
    @endsection