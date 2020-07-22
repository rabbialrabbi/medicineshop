@extends('layouts.frontLayout')

@section('body')
    <section>
        <div class="carousel">
            !! Promotional Add !!
        </div>
    </section>

    <section>
        <shopping-chart csrf="{{csrf_token()}}"
                        :product_list="{{json_encode(session()->get('product_list'))}}"
                        user="{{Auth::user()->name}}"
        ></shopping-chart>
    </section>

    <section class="prod">
        <div class="container">

            <div class="header">
                <p>PRODUCT</p>
                <div class="u-line"></div>
            </div>

            <product-list :product_list="{{$productList}}"></product-list>


        </div>

    </section>

    <section id="service" class="service">
        <div class="container">

            <div class="header">
                <p>SERVICES</p>
                <div class="u-line"></div>
            </div>

            <div class="container">
                <div class="row vision_parent">
                    <div class="col-12 col-md-6 col-lg-3 vision_child">
                        <div class="row p-3 ">
                            <div class="col-3">
                                <img src="images/icon1.png" alt="Free Deleviry">
                            </div>
                            <div class="col-9">
                                <h6>Free Delivery</h6>
                                <p>Over Amount of total $100</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 vision_child">
                        <div class="row p-3">
                            <div class="col-3">
                                <img src="images/icon2.png" alt="Free Deleviry">
                            </div>
                            <div class="col-9">
                                <h6>Product Return</h6>
                                <p>If goods have problems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 vision_child">
                        <div class="row p-3">
                            <div class="col-3">
                                <img src="images/icon3.png" alt="Free Deleviry">
                            </div>
                            <div class="col-9">
                                <h6>Secure Payment</h6>
                                <p>100% Secure Payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 vision_child">
                        <div class="row p-3">
                            <div class="col-3">
                                <img src="images/icon4.png" alt="Free Deleviry">
                            </div>
                            <div class="col-9">
                                <h6>24/7 Support</h6>
                                <p>Delicated Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">

            </div>

        </div>

        <div class="copyright">
            All Right Reserved @ rabbialrabbi@gmail.com
        </div>

    </section>
@endsection
