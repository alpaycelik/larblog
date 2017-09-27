@extends('frontend.app')
@section('icerik')
    <div role="main" class="main">
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="#">Forum</a></li>
                            <li class="active">Konu Ekle</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Konu Ekle</h1>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-sm mt-sm"><strong>Yeni</strong> Birşeyler</h2>
                    <form method="post" id="form" action="">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Ana Konu Seç</label>
                                    <select name="ana_baslik" class="form-control">
                                    @foreach($anabasliklar as $anabaslik)
                                        <option value="{{ $anabaslik->id }}">{{ $anabaslik->baslik }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Başlık</label>
                                    <input type="text" name="baslik" value="" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Etiketler</label>
                                    <input type="text" name="etiketler" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>İçerik </label>
                                    <textarea maxlength="5000" rows="10" class="form-control ckeditor" name="icerik" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Konu Ekle" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/ckeditor/config.js"></script>
    <script>
        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                beforeSerialize:function () {
                    for (instance in CKEDITOR.instances)CKEDITOR.instances[instance].updateElement();
                },
                success:function (response) {
                    swal(
                        response.baslik,
                        response.icerik,
                        response.durum
                    )
                }
            });
        });
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
@endsection