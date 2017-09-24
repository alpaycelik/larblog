@extends('backend.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Blog Ekle</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <table class="table" id="table">
                                    <thead>
                                    <tr>
                                        <th class="col-md-2 col-xs-2">#</th>
                                        <th class="col-md-8 col-xs-8>Kategori</th>
                                        <th class="col-md-2 col-xs-2>Sil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kategoriler as $kategori)
                                        <tr>
                                            <th scope="row">{{ $kategori->id }}</th>
                                            <td>{{ $kategori->ad }}</td>
                                            <td><button onclick="sil(this, '{{ $kategori->id }}');" class="btn btn-danger btn-xs">Sil</button></td>
                                        </tr>
                                        @foreach($kategori->children as $altkategori)
                                            <tr>
                                                <th scope="row">{{ $altkategori->id }}</th>
                                                <td>{{ $kategori->ad }}-->{{ $altkategori->ad }}</td>
                                                <td><button onclick="sil(this, '{{ $altkategori->id }}');" class="btn btn-danger btn-xs">Sil</button></td>
                                            </tr>
                                            @foreach($altkategori->children as $altaltkategori)
                                                <tr>
                                                    <th scope="row">{{ $altaltkategori->id }}</th>
                                                    <td>{{ $kategori->ad }}-->{{ $altkategori->ad }}-->{{ $altaltkategori->ad }}</td>
                                                    <td><button onclick="sil(this, '{{ $altaltkategori->id }}');" class="btn btn-danger btn-xs">Sil</button></td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>

    <script>
        function sil(r,id){
            var sira = r.parentNode.parentNode.rowIndex;
            swal({
                title: 'Silmek istediğinizden emin misiniz?',
                text: 'Sidiğinizde geri dönüşümü olmayacaktır',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'İptal',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, Sil'
            }).then(function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "post",
                    url: '',
                    data: {
                        'id': id,
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
                            document.getElementById("table").deleteRow(sira);
                        }
                        swal(
                            response.baslik,
                            response.icerik,
                            response.durum
                        );
                    }
                })
            })
        }
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
@endsection