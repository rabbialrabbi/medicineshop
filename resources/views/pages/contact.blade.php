@extends('layouts.frontLayout')
@section('contact-active','active')
@section('body')

    <div class="container about-header">
        <h1>Contact</h1>
        <hr class="about-uline">

        <div class="row contact">
            <div class="col-sm-12 col-md-6">
                <h3 class="contact-header">Office Address</h3>
                <p class="contact-row">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, vitae.</p>
                <p class="contact-row">Lorem ipsum dolor sit amet, consectetur</p>
                <p class="contact-row">Lorem ipsum dolor sit amet</p>
                <p class="contact-row">Lorem ipsum dolor sit amet, consectetur</p>
            </div>
            <div class="col-sm-12 col-md-6">
                <h3 class="contact-header">Factory Address</h3>
                <p class="contact-row">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, vitae.</p>
                <p class="contact-row">Lorem ipsum dolor sit amet, consectetur</p>
                <p class="contact-row">Lorem ipsum dolor sit amet</p>
                <p class="contact-row">Lorem ipsum dolor sit amet, consectetur</p>
            </div>


        </div>

        <div class="row mt-5 pt-5">
            <div class="col-sm-12 col-md-6 contact-map">
                <div  width=100% alt="Map" style="outline: 2px solid lightgrey;height: 250px">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 contact-form">
                <form action="{{route('message.store')}}" method="post" >
                    @csrf
                    <div class="contact_form-body ">
                        <div class="row justify-content-center">
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
@endsection
