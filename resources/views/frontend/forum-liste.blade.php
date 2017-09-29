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
                        <h1>{{ $anabaslik->baslik }} Listesi</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts">
                        @php($konular = $anabaslik->forumkonu()->paginate(5))
                        @foreach($konular as $konu)
                        @if(($konu->goster == '1') ||(Auth::check() && Auth::user()->yetki() > 0))
                        <article id="konu-{{ $konu->id }}" class="post post-large" style="margin-bottom: 10px;">
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
                                    <span><i class="fa fa-comments"></i>By <a href="#">12 Comments</a></span>
                                    @if(Auth::check() && Auth::user()->yetki() > 0)
                                        <span><i class="fa fa-trash" aria-hidden="true"></i> <a href="#" onclick="konusil('sil', '{{ $konu->id }}')">Konuyu Sil</a></span>
                                        @if($konu->goster == '1')
                                            <span><i class="fa fa-eye-slash" aria-hidden="true"></i> <a href="#" onclick="konusil('gizle', '{{ $konu->id }}')">Konuyu Gizle</a></span>
                                        @else
                                            <span><i class="fa fa-eye" aria-hidden="true"></i> <a href="#" onclick="konusil('goster', '{{ $konu->id }}')">Konuyu Göster</a></span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </article>
                        @endif
                        @endforeach
                    </div>
                    {{ $konular->links() }}
                </div>
                @include('frontend.forum-side-bar')
            </div>
        </div>
    </div>
@endsection
@section('js')
    @if(Auth::check() && Auth::user()->yetki() > 0)
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
                        if(response.durum == 'success' && durum == 'sil'){
                            $("#konu-"+id).slideUp();
                        }
                        if(response.durum == 'success' && durum == 'gizle'){
                            $("#konu-"+id).hide().fadeIn('fast');
                        }
                        if(response.durum == 'success' && durum == 'goster'){
                            $("#konu-"+id).hide().fadeIn('fast');
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
    @endif
@endsection
@section('css')
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
@endsection