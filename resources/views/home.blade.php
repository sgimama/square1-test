@extends('master')
@section('title', 'Posts')
@section('content')
<div id="app" class="content">
    <post_list></post_list>
</div>
<script src="{{mix('assets/js/postList.js')}}"></script>
@endsection