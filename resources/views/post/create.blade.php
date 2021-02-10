@extends('master')
@section('title', 'New Post')
@section('content')
<div id="app" class="content">
    <new_post></new_post>
</div>
<script src="{{mix('assets/js/newPost.js')}}"></script>
@endsection