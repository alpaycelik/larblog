@extends('frontend.app')
@section('icerik')
    <div role="main" class="main">

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Pages</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Login</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <h4 class="heading-primary text-uppercase mb-md">Ben zaten üyeyim</h4>
                                        <form action="{{ route('login') }}" id="frmSignIn" method="post">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>E-mail Adresi</label>
                                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <a class="pull-right" href="#">(Şifreni mi unuttun?)</a>
                                                        <label>Şifre</label>
                                                        <input type="password" name="password" value="" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
															<span class="remember-box checkbox">
																<label for="remember">
																	<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Beni Hatırla
																</label>
															</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="submit" value="Giriş" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <h4 class="heading-primary text-uppercase mb-md">KAYIT OL</h4>
                                        <form action="{{ route('register') }}" id="frmSignUp" method="post">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>İsminiz</label>
                                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>E-mail</label>
                                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>Şifre</label>
                                                        <input type="password" name="password" value="" class="form-control input-lg" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Şifre Tekrar</label>
                                                        <input type="password" value="" name="password_confirmation" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" value="Kayı Ol" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
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
@section('js')
    
@endsection
@section('css')
    
@endsection