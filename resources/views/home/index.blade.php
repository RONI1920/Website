@extends('home.home_master')

@section('home')
    @include('home.homelayout.slider')

    <!-- end hero -->
    <div class="lonyo-content-shape1">
        <img src="{{ asset('frontend/assets/images/shape/shape1.svg') }}" alt="">
    </div>

    @include('home.homelayout.features')
    <!-- end content -->


    @include('home.homelayout.clarifies')


    <!-- end content -->

    <div class="lonyo-section-padding4 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 order-lg-2">
                    <div class="lonyo-content-thumb" data-aos="fade-up" data-aos-duration="700">
                        <img src="{{ asset('frontend/assets/images/v1/content-thumb2.png') }}" alt="">
                    </div>
                </div>

                @include('home.homelayout.get_all')

            </div>
        </div>
        <div class="lonyo-content-shape2"></div>
    </div>
    <div class="lonyo-content-shape3">
        <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
    </div>
    <!-- end content -->

    <div class="lonyo-section-padding bg-heading position-relative sectionn">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="lonyo-video-thumb">
                        <img src="{{ asset('frontend/assets/images/v1/video-thumb.png') }}" alt="">
                        <a class="play-btn video-init" href="https://www.youtube.com/watch?v=fgZc7mAYIY8">
                            <img src="{{ asset('frontend/assets/images/v1/play-icon.svg') }}" alt="">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </a>
                    </div>
                </div>

                @include('home.homelayout.usability')

            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="500">
                        <div class="lonyo-process-number">
                            <img src="{{ asset('frontend/assets/images/v1/n1.svg') }}" alt="">
                        </div>
                        <div class="lonyo-process-title">
                            <h4>Connect Your Accounts</h4>
                        </div>
                        <div class="lonyo-process-data">
                            <p>Link your bank, credit card or investment accounts to automatically track transactions
                                and get a complete financial overview</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="700">
                        <div class="lonyo-process-number">
                            <img src="{{ asset('frontend/assets/images/v1/n2.svg') }}" alt="">
                        </div>
                        <div class="lonyo-process-title">
                            <h4>Set Budgets & Goals</h4>
                        </div>
                        <div class="lonyo-process-data">
                            <p>Define your spending limits and savings goals for categories like groceries, bills or
                                future investments to stay on track.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="900">
                        <div class="lonyo-process-number">
                            <img src="{{ asset('frontend/assets/images/v1/n3.svg') }}" alt="">
                        </div>
                        <div class="lonyo-process-title">
                            <h4>Monitor & Automate</h4>
                        </div>
                        <div class="lonyo-process-data">
                            <p>Check your financial dashboard for regular updates and set up automatic payments or
                                savings to simplify management.</p>
                        </div>
                    </div>
                </div>
                <div class="border-bottom" data-aos="fade-up" data-aos-duration="500"></div>
            </div>
        </div>
    </div>
    <div class="lonyo-content-shape1">
        <img src="{{ asset('frontend/assets/images/shape/shape3.svg') }}" alt="">
    </div>
    <!-- end video -->

    @include('home.homelayout.review')
    <!-- end testimonial -->


    @include('home.homelayout.answers')

    <div class="lonyo-content-shape3">
        <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
    </div>
    <!-- end faq -->

    @include('home.homelayout.apps')
    <!-- end cta -->
@endsection
