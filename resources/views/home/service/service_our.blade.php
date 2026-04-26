@extends('home.home_master')

@section('home')
    <div class="breadcrumb-wrapper light-bg">
        <div class="container">

            <div class="breadcrumb-content">
                <h1 class="breadcrumb-title pb-0">Services</h1>
                <div class="breadcrumb-menu-wrapper">
                    <div class="breadcrumb-menu-wrap">
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><img src="{{ asset('frontend/assets/images/blog/right-arrow.svg') }}" alt="right-arrow">
                                </li>
                                <li aria-current="page">Services</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End breadcrumb -->

    <section class="lonyo-section-padding7">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="lonyo-content-thumb2" data-aos="fade-right" data-aos-duration="700">
                        <img src="{{ asset('frontend/assets/images/v2/content1.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="lonyo-default-content pl-50" data-aos="fade-up" data-aos-duration="700">
                        <h2>It clarifies all strategic financial decisions</h2>
                        <p class="data">With this tool, you can say goodbye to overspending, stay on track with your
                            savings goals, and say goodbye to financial worries. Get ready for a clearer view of your
                            finances like never before!</p>
                        <div class="mt-50">
                            <div class="lonyo-faq-wrap1">
                                <div class="lonyo-faq-item open" data-aos="fade-up" data-aos-duration="500">
                                    <div class="lonyo-faq-header">
                                        <h4>Real-Time Expense Tracking:</h4>
                                        <div class="lonyo-active-icon">
                                            <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}"
                                                alt="">
                                            <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="lonyo-faq-body">
                                        <p>Users can set budget limits for different categories. This tool provides visual
                                            insights such as graphs to show how much has been spent.</p>
                                    </div>
                                </div>
                                <div class="lonyo-faq-item" data-aos="fade-up" data-aos-duration="700">
                                    <div class="lonyo-faq-header">
                                        <h4>Comprehensive Financial Overview:</h4>
                                        <div class="lonyo-active-icon">
                                            <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}"
                                                alt="">
                                            <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="lonyo-faq-body">
                                        <p>Users can set budget limits for different categories. This tool provides visual
                                            insights such as graphs to show how much has been spent.</p>
                                    </div>
                                </div>
                                <div class="lonyo-faq-item" data-aos="fade-up" data-aos-duration="900">
                                    <div class="lonyo-faq-header">
                                        <h4>Stress-Reducing Automation:</h4>
                                        <div class="lonyo-active-icon">
                                            <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}"
                                                alt="">
                                            <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="lonyo-faq-body">
                                        <p>Users can set budget limits for different categories. This tool provides visual
                                            insights such as graphs to show how much has been spent.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end content -->

    <div class="lonyo-section-padding10 position-relative">
        <div class="container">
            <div class="lonyo-section-title center">
                <h2>Features that make spending smarter</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="lonyo-service-wrap light-bg">
                        <div class="lonyo-service-title">
                            <h4>Expense Tracking</h4>
                            <img src="{{ asset('frontend/assets/images/v1/feature1.svg') }}" alt="">
                        </div>
                        <div class="lonyo-service-data">
                            <p>Allows users to record and categorize daily transactions such as income, expenses, bills, and
                                savings.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="lonyo-service-wrap light-bg">
                        <div class="lonyo-service-title">
                            <h4>Budgeting Tools</h4>
                            <img src="{{ asset('frontend/assets/images/v1/feature2.svg') }}" alt="">
                        </div>
                        <div class="lonyo-service-data">
                            <p>Provides visual insights like graphs or pie charts to show how much is spent versus the
                                budgeted amount.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="lonyo-service-wrap light-bg">
                        <div class="lonyo-service-title">
                            <h4>Investment Tracking</h4>
                            <img src="{{ asset('frontend/assets/images/v1/feature3.svg') }}" alt="">
                        </div>
                        <div class="lonyo-service-data">
                            <p>For users interested in investing, finance apps often provide tools to track stocks, bonds or
                                mutual funds.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="lonyo-service-wrap light-bg">
                        <div class="lonyo-service-title">
                            <h4>Tax Management</h4>
                            <img src="{{ asset('frontend/assets/images/v1/feature4.svg') }}" alt="">
                        </div>
                        <div class="lonyo-service-data">
                            <p>This tool integrate with tax software to help users prepare for tax season, deduct expenses,
                                and file returns.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="lonyo-service-wrap light-bg">
                        <div class="lonyo-service-title">
                            <h4>Bill Management</h4>
                            <img src="{{ asset('frontend/assets/images/v1/feature5.svg') }}" alt="">
                        </div>
                        <div class="lonyo-service-data">
                            <p>Tracks upcoming bills, sets reminders for due dates, and enables easy payments via
                                integration with online banking</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="lonyo-service-wrap light-bg">
                        <div class="lonyo-service-title">
                            <h4>Security Features</h4>
                            <img src="{{ asset('frontend/assets/images/v1/feature6.svg') }}" alt="">
                        </div>
                        <div class="lonyo-service-data">
                            <p>Provides bank-level encryption to ensure user data and financial information remain safe, MFA
                                and biometric logins.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="lonyo-service-wrap light-bg">
                        <div class="lonyo-service-title">
                            <h4>Debt Management</h4>
                            <img src="{{ asset('frontend/assets/images/v1/feature7.svg') }}" alt="">
                        </div>
                        <div class="lonyo-service-data">
                            <p>Plan and monitor loan repayments, credit card balances, and strategies to pay off debt
                                faster.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="lonyo-service-wrap light-bg">
                        <div class="lonyo-service-title">
                            <h4>Savings Management</h4>
                            <img src="{{ asset('frontend/assets/images/v1/feature8.svg') }}" alt="">
                        </div>
                        <div class="lonyo-service-data">
                            <p>Set and track your financial goals, such as building an emergency fund or saving for a big
                                purchase or saving for future.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="lonyo-service-wrap light-bg">
                        <div class="lonyo-service-title">
                            <h4>Insights & Reports</h4>
                            <img src="{{ asset('frontend/assets/images/v1/feature6.svg') }}" alt="">
                        </div>
                        <div class="lonyo-service-data">
                            <p>Access detailed reports and visualizations to understand your financial health and trends for
                                real-time syncing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    <div class="lonyo-section-padding3 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 order-lg-2">
                    <div class="lonyo-faq-thumb" data-aos="fade-left" data-aos-duration="700">
                        <img src="{{ asset('frontend/assets/images/v2/faq-thumb.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="lonyo-default-content pr-50" data-aos="fade-up" data-aos-duration="700">
                        <h2>Get all your financial updates in one place</h2>
                        <p class="data">This feature ensures you can easily stay on top of your finances by consolidating
                            all updates into a single dashboard.</p>
                        <div class="mt-50" data-aos="fade-up" data-aos-duration="900">
                            <ul class="tabs">
                                <li class="active-tab">
                                    <img src="{{ asset('frontend/assets/images/v1/tv.svg') }}" alt="">
                                    <h4>Unified Dashboard</h4>
                                </li>
                                <li>
                                    <img src="{{ asset('frontend/assets/images/v1/alerm.svg') }}" alt="">
                                    <h4>Real-Time Updates</h4>
                                </li>
                            </ul>
                            <ul class="tabs-content">
                                <li>
                                    View all your accounts, transactions & investments in one central location. See every
                                    credit & debit transaction as it happens across all your accounts. Get a complete view
                                    of your expenses with expense categories.
                                </li>
                                <li>
                                    This feature ensures you can easily stay on top of your finances by consolidating all
                                    updates into a single dashboard.View all your accounts, transactions iew of your
                                    expenses with expense categories.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end tab -->

    {{-- ANSWER --}}
    @include('home.homelayout.answers')

    {{-- APP --}}
    @include('home.homelayout.apps')
@endsection
