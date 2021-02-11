@extends('master')
@section('title', 'My posts')
@section('content')
<div id="app" class="content">
    <post_list mypost></post_list>
</div>
<script src="{{mix('assets/js/postList.js')}}"></script>
@endsection