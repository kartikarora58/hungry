@extends('user.layouts.userApp')
@section('content')
<style type="text/css">
	.in:focus{
		border:1.5px solid red !important;
		outline: none !important;
	}
</style>
<div class="container-fluid">
	 <!-- Start Address -->
        <div class="food__contact">
            <div class="food__contact__wrapper d-flex flex-wrap flex-lg-nowrap">
                <!-- Start Single Contact -->
                <div class="contact">
                    <div class="ct__icon">
                        <i class="fa fa-phone" area-hidden="true"></i>
                    </div>
                    <div class="ct__address">
                        <p><a href="tel:+91-8968888193">+91-8968888193</a></p>
                        <p><a href="tel:+91-8360215749">+91-8360215749</a></p>
                    </div>
                </div>
                <!-- End Single Contact -->
                <!-- Start Single Contact -->
                <div class="contact">
                    <div class="ct__icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="ct__address">
                        <p>Guru Nanak Dev Engineering College,Ludhiana,Punjab</p>
                    </div>
                </div>
                <!-- End Single Contact -->
                <!-- Start Single Contact -->
                <div class="contact">
                    <div class="ct__icon">
                        <i class="fa fa-envelope" area-hidden="true"></i>
                    </div>
                    <div class="ct__address">
                        <p><a href="#">info@gmail.com</a></p>
                    </div>
                </div>
                <!-- End Single Contact -->
            </div>
        </div>
        <br>
        <br>
        <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3424.927835315525!2d75.85737245042034!3d30.860695381502435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a828f09011b15%3A0xbf3f5b51dcc81b12!2sGuru%20Nanak%20Dev%20Engineering%20College!5e0!3m2!1sen!2sin!4v1587969454141!5m2!1sen!2sin" width=100% height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
        <!-- End Address -->
        <section class="food__contact__form bg--white section-padding--lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__wrap">
                            <h2>Get In Touch With Hungry Tiffins</h2>
                            <div class="contact__form__inner">
                                <form id="contact-form" action="#" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                            <input class="in"  type="text" name="name" placeholder="Your Name">
                                            <input class="in" type="email" name="email" placeholder="E-mail">
                                            <input class="in" type="text" name="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box message">
                                            <textarea class="in" name="message"  placeholder="Message*"></textarea>
                                        </div>
                                    </div>
                                    <div class="contact-btn">
                                        <button type="submit" class="food__btn">submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="form-output">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

	
</div>
@endsection