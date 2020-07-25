@extends('layouts.frontLayout')

@section('body')
    <section>
        <div class="carousel">
            !! Promotional Add !!
        </div>
    </section>

    <section>
        @if(Auth::check() && Auth::user()->is_verified == 1)
        <shopping-chart csrf="{{csrf_token()}}"
                        :product_list="{{json_encode(session()->get('product_list'))}}"
                        user="{{Auth::user()->name}}"
        ></shopping-chart>
            @endif
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

    <section id="contact" class="preFooter">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12 col-md-6 preFooter_info">
                    <img class="" src="images/logo.ico" alt="">
                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s</p>
                    <div class="preFooter">
                        <h4 class="text-left">Location</h4>
                        <hr>
                        <div class="row">
                            <div class="col-2 ft-body_logo"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="col-10 ft-body_text">PO Box 16122 Collins Street, West Victoria 8007, Australia</div>
                        </div>

                        <div class="row">
                            <div class="col-2 ft-body_logo"><i class="fas fa-phone"></i></div>
                            <div class="col-10 ft-body_text">+880-254-6666</div>

                        </div>

                        <div class="row">
                            <div class="col-2 ft-body_logo"><i class="far fa-envelope"></i></div>
                            <div class="col-10 ft-body_text">rabbialrabbi@gmail.com</div>

                        </div>
                    </div>



                    <div class="row ft-parents">
                        <div class="col-3 ft-child">
                            <div class="ft-wraper"><i class="fab fa-facebook-f"></i></div>
                        </div>
                        <div class="col-3 ft-child">
                            <div class="ft-wraper"><i class="fab fa-twitter"></i></div>
                        </div>
                        <div class="col-3 ft-child">
                            <div class="ft-wraper"><i class="fab fa-instagram"></i></div>
                        </div>
                        <div class="col-3 ft-child">
                            <div class="ft-wraper"><i class="fab fa-youtube"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 preFooter_msg">
                    <form action="{{route('message.store')}}" method="post" >
                        @csrf
                        <div class="contact_form-body ">
                            <div class="row justify-content-center pt-5">
                                <h3>Sent Message</h3>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="name" placeholder="Name"  required>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="email" placeholder="Email"  required>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-sm-12 col-md-8">
                                    <textarea name="message" id="" rows="6" placeholder="Message" required></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-sm-12 col-md-8"><input style="color: #ff7700;font-weight: bolder" type="submit" value="Send" ></div>
                            </div>
                            <div class=" row justify-content-center" ><span class="message"></span></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <section class="footer">

        <div class="copyright">
            All Right Reserved @ rabbialrabbi@gmail.com
        </div>

    </section>
@endsection
