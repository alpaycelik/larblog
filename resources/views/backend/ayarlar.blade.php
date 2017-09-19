@extends('backend.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Plain Page</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">



            <div class="x_content">


                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#genel_ayarlar" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Genel Ayarlar</a>
                        </li>
                        <li role="presentation" class=""><a href="#iletisim_ayarlari" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">İletişim Ayarları</a>
                        </li>
                        <li role="presentation" class=""><a href="#sosyal_medya" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Sosyal Medya</a>
                        </li>
                        <li role="presentation" class=""><a href="#google_api" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Google API</a>
                        </li>
                        <li role="presentation" class=""><a href="#mail_ayarlari" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Mail Ayarları</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="genel_ayarlar" aria-labelledby="home-tab">
                            <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Site Başlığı</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="title" class="form-control col-md-7 col-xs-12" name="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keywords">Site Anahtar Kelimeler</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="keywords" name="keywords" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Site Açıklaması</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="description" id="description" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="control-label col-md-3 col-sm-3 col-xs-12">Site Adresi</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="url" id="description" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="genel_ayarlar" class="btn btn-success">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div role="tabpanel" class="tab-pane fade" id="iletisim_ayarlari" aria-labelledby="profile-tab">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefon">Telefon</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="telefon" class="form-control col-md-7 col-xs-12" name="telefon">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm">GSM</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="gsm" name="gsm" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="faks" class="control-label col-md-3 col-sm-3 col-xs-12">Faks</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="faks" class="form-control col-md-7 col-xs-12" type="text" name="faks">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="adres" class="control-label col-md-3 col-sm-3 col-xs-12">Adres</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="adres" class="form-control col-md-7 col-xs-12" type="text" name="adres">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="il" class="control-label col-md-3 col-sm-3 col-xs-12">İl</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="il" class="form-control col-md-7 col-xs-12" type="text" name="il">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ilce" class="control-label col-md-3 col-sm-3 col-xs-12">İlçe</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="ilce" class="form-control col-md-7 col-xs-12" type="text" name="ilce">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="iletisim_ayarlar"  class="btn btn-success">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="sosyal_medya" aria-labelledby="profile-tab">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook">Facebook</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="facebook" class="form-control col-md-7 col-xs-12" name="facebook">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter">Twitter</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="twitter" name="twitter" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="instagram" class="control-label col-md-3 col-sm-3 col-xs-12">Instagram</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="instagram" class="form-control col-md-7 col-xs-12" type="text" name="instagram">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="youtube" class="control-label col-md-3 col-sm-3 col-xs-12">Youtube</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="youtube" class="form-control col-md-7 col-xs-12" type="text" name="youtube">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="sosyal_medya"  class="btn btn-success">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="google_api" aria-labelledby="profile-tab">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="google">Google Hesabı</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="google" class="form-control col-md-7 col-xs-12" name="google">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="recapctha">Google Recapctha</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="recapctha" name="recapctha" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="maps" class="control-label col-md-3 col-sm-3 col-xs-12">Google Maps</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="maps" class="form-control col-md-7 col-xs-12" type="text" name="maps">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="analystic" class="control-label col-md-3 col-sm-3 col-xs-12">Google Analystic</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="analystic" class="form-control col-md-7 col-xs-12" type="text" name="analystic">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="google_api"  class="btn btn-success">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="mail_ayarlari" aria-labelledby="profile-tab">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_user">Kullanıcı Adı</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="smtp_user" class="form-control col-md-7 col-xs-12" name="smtp_user">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="smtp_password">Şifre</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="smtp_password" name="smtp_password" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="smtp_host" class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Host</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="smtp_host" class="form-control col-md-7 col-xs-12" type="text" name="smtp_host">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="smtp_port" class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Port</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="smtp_port" class="form-control col-md-7 col-xs-12" type="text" name="smtp_port">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="mail_ayarlari"  class="btn btn-success">Kaydet</button>
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
        </div>
    </div>
@endsection
<!-- iCheck -->
<link href="/backend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- PNotify -->
<link href="/backend/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="/backend/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="/backend/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
@section('css')

@endsection

@section('js')
    <!-- bootstrap-progressbar -->
    <script src="/backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/backend/vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <script src="/backend/vendors/pnotify/dist/pnotify.js"></script>
    <script src="/backend/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="/backend/vendors/pnotify/dist/pnotify.nonblock.js"></script>
@endsection