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
                    <h1>Bize Ulaşın</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->

    <div class="container">

        <div class="row">
            <div class="col-md-6">

                <div class="alert alert-success hidden mt-lg" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>

                <div class="alert alert-danger hidden mt-lg" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                    <span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
                </div>

                <h2 class="mb-sm mt-sm"><strong>Bize</strong> Ulaşın</h2>
                <form id="contactForm" action="php/contact-form.php" method="POST">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Adınız *</label>
                                <input type="text" value="" data-msg-required="Lütfen adınızı giriniz." maxlength="100" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="col-md-6">
                                <label>E-mail Adresiniz *</label>
                                <input type="email" value="" data-msg-required="Lütfen e-mail adresinizi giriniz." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Konu</label>
                                <input type="text" value="" data-msg-required="Lütfen konuyu giriniz." maxlength="100" class="form-control" name="subject" id="subject" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Mesaj *</label>
                                <textarea maxlength="5000" data-msg-required="Lütfen mesajı giriniz." rows="10" class="form-control" name="message" id="message" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Mesajı Gönder" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">

                <h4 class="heading-primary">Bize <strong>Ulaşmak İçin</strong></h4>
                <ul class="list list-icons list-icons-style-3 mt-xlg">
                    <li><i class="fa fa-map-marker"></i> <strong>Adres:</strong> {{ $ayarlar->adres }} {{ $ayarlar->il }}/{{ $ayarlar->ilce }}</li>
                    <li><i class="fa fa-phone"></i> <strong>Telefon:</strong> {{ $ayarlar->tel }}</li>
                    <li><i class="fa fa-phone"></i> <strong>Faks:</strong> {{ $ayarlar->faks }}</li>
                    <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:{{ $ayarlar->mail }}">{{ $ayarlar->mail }}</a></li>
                </ul>

                <hr>

                <h4 class="heading-primary">Sosyal <strong>Medya</strong></h4>
                <ul class="header-social-icons social-icons">
                    <li class="social-icons-facebook"><a href="{{ $ayarlar->facebook }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li class="social-icons-twitter"><a href="{{ $ayarlar->twitter }}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li class="social-icons-instagram"><a href="{{ $ayarlar->instagram }}" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                    <li class="social-icons-youtube"><a href="/{{ $ayarlar->youtube }}" target="_blank" title="Instagram"><i class="fa fa-youtube"></i></a></li>
                </ul>

            </div>

        </div>

    </div>

</div>
@endsection

@section('css')

@endsection

@section('js')

@endsection