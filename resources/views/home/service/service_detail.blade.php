@extends('home.home_master')

@section('home')
    <div class="breadcrumb-wrapper light-bg">
        <div class="container">

            <div class="breadcrumb-content">
                <h1 class="breadcrumb-title pb-0">Service Details</h1>
                <div class="breadcrumb-menu-wrapper">
                    <div class="breadcrumb-menu-wrap">
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><img src="{{ asset('frontend/assets/images/blog/right-arrow.svg') }}" alt="right-arrow">
                                </li>
                                <li aria-current="page">Service Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End breadcrumb -->

    <section class="lonyo-section-padding9 overflow-hidden">
        <div class="container">
            <div class="lonyo-section-title" data-aos="fade-up" data-aos-duration="700">
                <img src="{{ asset('frontend/assets/images/service/dashboard.png') }}" alt="">
            </div>
            <div class="lonyo-default-content max-1100 pb-35">
                <h2>Key Features of expense tracking:</h2>
                <p>Expense tracking is a core feature of finance apps that helps users monitor and categorize their
                    spending. It
                    provides a clear picture of where your money goes, enabling smarter financial decisions and better
                    budgeting.
                </p>
                <div class="text text2">
                    <p><span>1. Automatic Transaction Syncing:</span> Link your bank accounts and credit cards to
                        automatically
                        import transactions in real-time.</p>
                    <p><span>2. Categorization of Expenses:</span> Transactions are sorted into categories like food,
                        transportation, utilities, and entertainment, making it easy to understand spending patterns.</p>
                    <p><span>3. Customizable Categories:</span> Create custom categories tailored to your lifestyle for a
                        more
                        personalized tracking experience.</p>
                    <p><span>4. Spending Trends Analysis:</span>Get insights into your spending habits through monthly
                        summaries,
                        trends, and charts.</p>
                    <p><span>5. Searchable Transaction History:</span> Easily find past transactions with a searchable
                        history,
                        ensuring you never lose track of specific expenses.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="lonyo-hero-dashbord" data-aos="fade-right" data-aos-duration="700">
                        <img src="{{ asset('frontend/assets/images/hero/dashboard.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="lonyo-video-thumb2" data-aos="fade-left" data-aos-duration="700">
                        <img src="{{ asset('frontend/assets/images/hero/video1.png') }}" alt="">
                        <a class="play-btn video-init" href="https://www.youtube.com/watch?v=fgZc7mAYIY8">
                            <img src="{{ asset('frontend/assets/images/shape/play-icon.svg') }}" alt="">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="lonyo-default-content max-1100 pt-40">
                <h2>Key Features of expense tracking:</h2>
                <p>Integration Feature means any Service feature that collects metrics by means other than through an OSCI,
                    has
                    an interface for displaying information collected via an OSCI that is separate from the Service's or
                    exports
                    metrics to other Google or third party products or services.</p>
                <ul>
                    <li><span>Improved Financial Awareness:</span> Know exactly where your money is going.</li>
                    <li><span>Better Budgeting:</span> Use detailed data to set realistic budgets and control overspending.
                    </li>
                    <li><span>Savings Optimization:</span> Identify unnecessary expenses to redirect funds toward savings.
                    </li>
                    <li><span>Effortless Organization:</span> Automate the tracking process and reduce manual bookkeeping
                        efforts.
                    </li>
                </ul>
                <p class="text3">Whether you're managing personal finances or tracking business expenses, an expense
                    tracking
                    service ensures you stay on top of your financial goals effortlessly.</p>
            </div>
        </div>
    </section>
    <!-- end content -->

    <div class="lonyo-content-shape">
        <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
    </div>

    {{-- APP --}}

    @include('home.homelayout.apps')
@endsection
