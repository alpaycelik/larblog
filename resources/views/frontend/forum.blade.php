@extends('frontend.app')
@section('icerik')
    <div role="main" class="main">
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Forum</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts">
                    <article class="post post-large" style="background-color:gainsboro; margin-bottom:25px; margin-left:20px;">
                        <div class="post-content">
                            <h2 style="padding-left:30px;"><a href="blog-post.html">Başlık</a></h2>
                            <p style="margin: 0 0 10px; padding-left:30px;">İÇERİK</p>
                            <hr class="hr" style="margin:5px 0;">

                            <article class="post post-large" style="margin-bottom: 0;">
                                <div class="post-date">
                                    <span class="day">10</span>
                                    <span class="month">10</span>
                                </div>
                                <div class="post-content">
                                    <h2><a href="blog-post.html">Başlık</a></h2>
                                    <div class="post-meta">
                                        <span><i class="fa fa-user"></i>By <a href="#">John Doe</a></span>
                                        <span><i class="fa fa-tag"></i> <a href="#">Duis</a>,<a href="#">News</a></span>
                                        <span><i class="fa fa-comments"></i>By <a href="#">12 Comments</a></span>
                                    </div>
                                </div>
                            </article>
                            <article class="post post-large" style="margin-bottom: 0;">
                                <div class="post-date">
                                    <span class="day">10</span>
                                    <span class="month">10</span>
                                </div>
                                <div class="post-content">
                                    <h2><a href="blog-post.html">Başlık</a></h2>
                                    <div class="post-meta">
                                        <span><i class="fa fa-user"></i>By <a href="#">John Doe</a></span>
                                        <span><i class="fa fa-tag"></i> <a href="#">Duis</a>,<a href="#">News</a></span>
                                        <span><i class="fa fa-comments"></i>By <a href="#">12 Comments</a></span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </article>
                    <article class="post post-large" style="background-color:gainsboro; margin-bottom:25px; margin-left:20px;">
                            <div class="post-content">
                                <h2 style="padding-left:30px;"><a href="blog-post.html">Başlık</a></h2>
                                <p style="margin: 0 0 10px; padding-left:30px;">İÇERİK</p>
                                <hr class="hr" style="margin:5px 0;">

                                <article class="post post-large" style="margin-bottom: 0;">
                                    <div class="post-date">
                                        <span class="day">10</span>
                                        <span class="month">10</span>
                                    </div>
                                    <div class="post-content">
                                        <h2><a href="blog-post.html">Başlık</a></h2>
                                        <div class="post-meta">
                                            <span><i class="fa fa-user"></i>By <a href="#">John Doe</a></span>
                                            <span><i class="fa fa-tag"></i> <a href="#">Duis</a>,<a href="#">News</a></span>
                                            <span><i class="fa fa-comments"></i>By <a href="#">12 Comments</a></span>
                                        </div>
                                    </div>
                                </article>
                                <article class="post post-large" style="margin-bottom: 0;">
                                    <div class="post-date">
                                        <span class="day">10</span>
                                        <span class="month">10</span>
                                    </div>
                                    <div class="post-content">
                                        <h2><a href="blog-post.html">Başlık</a></h2>
                                        <div class="post-meta">
                                            <span><i class="fa fa-user"></i>By <a href="#">John Doe</a></span>
                                            <span><i class="fa fa-tag"></i> <a href="#">Duis</a>,<a href="#">News</a></span>
                                            <span><i class="fa fa-comments"></i>By <a href="#">12 Comments</a></span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </article>
                        <ul class="pagination pagination-lg pull-right">
                            <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                @include('frontend.forum-side-bar')
            </div>
        </div>
    </div>
@endsection
@section('js')
    
@endsection
@section('css')
    
@endsection