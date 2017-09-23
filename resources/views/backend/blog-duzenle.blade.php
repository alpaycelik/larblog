@extends('backend.app')
@section('icerik')
    @php
        $sayi = 0;
    @endphp
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Blog Düzenle</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                @foreach($resimler = Storage::disk('uploads')->files('img/blog/'.$bloglar->slug) as $resim)
                                    <div class="col-md-55">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img style="width: 100%; display: block;" src="/uploads/{{ $resim }}"
                                                     alt="image"/>
                                                <div class="mask">
                                                    <div class="tools tools-bottom">
                                                        <form action="" id="form" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="resim" value="{{ $resim }}">
                                                            <input type="hidden" name="sayi" value="{{ $sayi }}">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                        class="fa fa-times"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $sayi++;
                                    @endphp
                                @endforeach
                            </div>
                            <form method="post" id="form" data-parsley-validate class="form-horizontal form-label-left">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="resimler" class="control-label col-md-3 col-sm-3 col-xs-12">Yeni Resim
                                        Ekle</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" name="resimler[]" id="resimler" multiple
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                {{ Form::bsText('baslik', 'Başlık', $bloglar->baslik, ['required' => 'required']) }}
                                {{ Form::bsText('kisaicerik', 'Kısa Açıklama', $bloglar->kisaicerik, ['required' => 'required']) }}
                                {{ Form::bsText('etiketler', 'Etiketler', $bloglar->etiketler, ['required' => 'required']) }}
                                <div class="form-group">
                                    <label for="icerik" class="control-label col-md-3 col-sm-3 col-xs-12">İçerik</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="icerik" id="icerik"
                                                  class="form-control col-md-7 col-xs-12 ckeditor" cols="30" rows="10"
                                                  required>{{ $bloglar->icerik }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Düzenle</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
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
                        beforeSerialize: function () {
                            for (instance in CKEDITOR.instances) CKEDITOR.instances[instance].updateElement();
                        },
                        success: function (response) {
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