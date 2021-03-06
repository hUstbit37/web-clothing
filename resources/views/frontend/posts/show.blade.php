@extends('layouts.frontend.master')

@section('page_title', $post->meta_title ?? $post->title)
@section('page_desc', $post->meta_desc ?? $post->title)
@section('meta_keyword', $post->meta_keyword ?? $post->title)

@section('main_content')
<div class="subDetail" style="margin-bottom: 25px">
    <div class="container">
        <a href="/" title="Trang chủ">Trang chủ</a> /
        <a href="">{{ $post->title }}</a>
        <div class="titlePrimary-line"></div>
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

