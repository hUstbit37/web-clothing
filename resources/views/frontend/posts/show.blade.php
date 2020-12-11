@extends('layouts.frontend.master')

@section('page_title', $post->meta_title ?? $post->name)
@section('page_desc', $post->meta_desc ?? $post->name)
@section('meta_keyword', $post->meta_keyword ?? $post->name)

@section('main_content')
<div class="subDetail" style="margin-bottom: 25px">
    <div class="container">
        <a href="/" title="Trang chủ">Trang chủ</a> /
        <a href="">{{ $post->title }}</a>
    </div>
</div>
<div class="container">
    <div class="item">
        <h2 style="font-size: 28px; text-align: center; font-weight: bold; margin-bottom: 15px">{{ $post->title }}</h2>
        <div class="detail">
            {{ $post->content }}
        </div>
    </div>
</div>


@endsection

