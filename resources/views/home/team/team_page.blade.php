@extends('home.home_master')

@section('home')
    <section class="lonyo-section-padding9">
        <div class="container">
            <div class="lonyo-section-title max-w616">
                <h2>Meet our brilliant team members</h2>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
                        <div class="lonyo-team-thumb">
                            <a href="single-team.html"><img src="{{ asset('frontend/assets/images/about-us/t1.png') }}"
                                    alt=""></a>
                        </div>
                        <div class="lonyo-team-content2">
                            <a href="single-team.html">
                                <h6>Michael Chen</h6>
                            </a>
                            <p>Chief Executive Officer</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-50 team-btn" data-aos="fade-up" data-aos-duration="700">
                <a href="contact-us.html" class="lonyo-default-btn team-btn2">Would you joint of our group?</a>
            </div>
        </div>
    </section>

    {{-- LAYOUT APPS --}}
    @include('home.homelayout.apps')
@endsection
