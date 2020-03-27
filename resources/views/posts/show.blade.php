@extends('layouts.app')
@section('content')
<!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->description}}</p>
        </div>
      </div> -->
      <div class="card text-center">
  <div class="card-header">
  <h3 class="card-title">{{$post->title}}</h3>
  </div>
  <div class="card-body">
   
    <p class="card-text">{{$post->description}}</p>
    <!-- <footer class="blockquote-footer">{{ $post->user ? $post->user->name : 'not exist'}}<cite title="Source Title"> {{ $post->user ? $post->user->email : 'not exist'}}</cite></footer> -->
    <h5 class="card-title">Posted by {{ $post->user ? $post->user->name : 'not exist'}}</h5>
    <p class="card-text">{{ $post->user ? $post->user->email : 'not exist'}}</p>
    <p class="card-text">{{ $post->user ? $post->user->created_at : 'not exist'}}</p>
    <p class="card-text">{{ $post->user->getCreatedAtAttribute() }}</p>
    <!-- \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') -->
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    
  </div>
</div>
@endsection