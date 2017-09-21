@extends('frontend.app')
@section('icerik')
    <div role="main" class="main">

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>About Us</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="word-rotator-title">
                        The New Way to <strong>
									<span class="word-rotate" data-plugin-options="{'delay': 2000}">
										<span class="word-rotate-items">
											<span>success.</span>
											<span>advance.</span>
											<span>progress.</span>
										</span>
									</span>
                        </strong>
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10">
                    <p class="lead">
                        <span class="alternative-font">{{ $hakkimizda->kisa_yazi }}</span>

                    </p>
                </div>
                <div class="col-md-2">
                    <a href="/iletisim" class="btn btn-lg btn-primary mt-xl">Bize Ulaşın!</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <h3 class="heading-primary"><strong>BİZ</strong> KİM MİZ?</h3>
                   <p>{{ $hakkimizda->icerik }}</p>
                </div>
                <div class="col-md-4">
                    <div class="featured-box featured-box-primary">
                        <div class="box-content">
                            <h4 class="text-uppercase">Behind the scenes</h4>
                            <ul class="thumbnail-gallery" data-plugin-lightbox data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
                                <li>
                                    <a title="Benefits 1" href="/frontend/img/benefits/benefits-1.jpg">
												<span class="thumbnail mb-none">
													<img src="/frontend/img/benefits/benefits-1-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 2" href="/frontend/img/benefits/benefits-2.jpg">
												<span class="thumbnail mb-none">
													<img src="/frontend/img/benefits/benefits-2-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 3" href="/frontend/img/benefits/benefits-3.jpg">
												<span class="thumbnail mb-none">
													<img src="/frontend/img/benefits/benefits-3-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 4" href="/frontend/img/benefits/benefits-4.jpg">
												<span class="thumbnail mb-none">
													<img src="/frontend/img/benefits/benefits-4-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 5" href="/frontend/img/benefits/benefits-5.jpg">
												<span class="thumbnail mb-none">
													<img src="/frontend/img/benefits/benefits-5-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 6" href="/frontend/img/benefits/benefits-6.jpg">
												<span class="thumbnail mb-none">
													<img src="/frontend/img/benefits/benefits-6-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="push-top"><strong>VİZYONUMUZ</strong></h3>
                </div>
            </div>
            <div class="featured-box featured-box-primary">
                <div class="box-content">
                    <p>{{ $hakkimizda->vizyon }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="push-top"><strong>MİSYONUMUZ</strong></h3>
                </div>
            </div>
            <div class="featured-box featured-box-primary">
                <div class="box-content">
                    <p>{{ $hakkimizda->misyon }}</p>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('js')

@endsection
@section('css')

@endsection