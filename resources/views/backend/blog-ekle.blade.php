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
                                <form method="post" id="form" data-parsley-validate class="form-horizontal form-label-left">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="resimler" class="control-label col-md-3 col-sm-3 col-xs-12">Resimler</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="file" name="resimler[]" id="resimler" multiple class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    {{ Form::bsText('baslik', 'Başlık') }}
                                    {{ Form::bsText('etiketler', 'Etiketler') }}
                                    <div class="form-group">
                                        <label for="icerik" class="control-label col-md-3 col-sm-3 col-xs-12">İçerik</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea name="icerik" id="icerik" class= "form-control col-md-7 col-xs-12 ckeditor" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Kaydet</button>
                                        </div>
                                    </div>
                                </form>
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
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/ckeditor/config.js"></script>
    <script>
        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                beforeSubmit:function () {
                    swal({
                        title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                        text: 'Yükleniyor lütfen bekleyiniz..!',
                        showConfirmButton: false
                    });
                },
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