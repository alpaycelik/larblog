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
                        @foreach($anabasliklar as $anabaslik)
                        <article class="post post-large" style="background-color:gainsboro; margin-bottom:25px; margin-left:20px;">
                            <div class="post-content">
                                <h2 style="padding-left:30px;"><a href="/forum/{{ $anabaslik->slug }}">{{ $anabaslik->baslik }}</a></h2>
                                <p style="margin: 0 0 10px; padding-left:30px;">{{ $anabaslik->kisa_aciklama }}</p>
                                <hr style="margin:5px 0; background-image: linear-gradient(to right, transparent, #337ab7, transparent);">
                                @foreach($anabaslik->forumkonu->take('4') as $konu)
                                    <article id="konu-{{ $konu->id }}" class="post post-large" style="margin-bottom: 0px;">
                                        <div class="post-content">
                                            <div class="post-date">
                                                @php(setlocale(LC_TIME, "turkish"))
                                                <span class="day">{{ $konu->created_at->formatLocalized('%d') }}</span>
                                                <span class="month">{{ $konu->created_at->formatLocalized('%b') }}</span>
                                            </div>
                                            <h2><a href="/forum/{{ $anabaslik->slug }}/{{ $konu->slug }}">{{ $konu->baslik }}</a></h2>
                                            <div class="post-meta">
                                                <span><i class="fa fa-user"></i>By <a href="#">{{ $konu->user->name }}</a></span>
                                                <span><i class="fa fa-tag"></i>
                                                    @php($e = $konu->etiketler)
                                                        @php($etiketler = explode(',', $e))
                                                            @foreach($etiketler as $etiket)
                                                                <a href="/forum/etiket/{{ str_slug($etiket) }}">{{ $etiket }}</a>
                                                            @endforeach
                                                </span>
                                                <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                                                @if(Auth::check() && Auth::user()->yetki() > 0)
                                                    <span><i class="fa fa-trash" aria-hidden="true"></i> <a href="#" onclick="konusil('sil', '{{ $konu->id }}')">Konuyu Sil</a></span>
                                                    <span><i class="fa fa-eye" aria-hidden="true"></i> <a href="#">Konuyu Gizle / Göster</a></span>
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </article>
                        @endforeach
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
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>
    <script>
        function konusil(durum, id){
            swal({
                title: 'Silmek istediğinizden emin misiniz?',
                text: 'Sidiğinizde geri dönüşümü olmayacaktır',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'İptal',
                confirmButtonColor: '#f44336',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, Sil'
            }).then(function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "post",
                    url: '/forum/konu-sil',
                    data: {
                        'id': id,
                        'durum' : durum,
                        '_token': CSRF_TOKEN
                    },
                    beforeSubmit:function () {
                        swal({
                            title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                            text: 'Yükleniyor lütfen bekleyiniz...',
                            showConfirmButton: false
                        })
                    },
                    success: function(response){
                        if(response.durum == 'success'){
                            $("#konu-"+id).slideUp();
                        }
                        /* swal(
                            response.baslik,
                            response.icerik,
                            response.durum
                        ); */
                    }
                })
            })
        }
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
@endsection