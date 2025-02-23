@extends('layouts.landing-page.master')
@section('title') {{ config('app.name') }} @endsection

@section('content')

    <!-- Page-wrapper-Start -->
  <div class="page_wrapper">

    <!-- Contact Us Section Start -->
    <section class="contact_section">
      <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
          <span class="title_badge">Contact us</span>
          <h2>Any query ? <span>let's talk</span></h2>
          <p>Lorem Ipsum is simply dummy text of the printing indus orem Ipsum <br> has been the industrys standard
            dummy
            text ever since.</p>
        </div>
        <ul class="contact_listing">
          <li data-aos="fade-up" data-aos-duration="1500">
            <span class="icon">
              <img src="{{ asset('images/landing-page/mail_icon.png') }}" alt="image">
            </span>
            <span class="lable">Email us</span>
            <a href="mailto:example@gmail.com">example@gmail.com</a>
          </li>
          <li data-aos="fade-up" data-aos-duration="1500" data-aos-delay="150">
            <span class="icon">
              <img src="{{ asset('images/landing-page/phone_icon.png') }}" alt="image">
            </span>
            <span class="lable">Call us</span>
            <a href="tel:1234567899">+1 123 456 7890</a>
          </li>
          <li data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
            <span class="icon">
              <img src="{{ asset('images/landing-page/location_icon.png') }}" alt="image">
            </span>
            <span class="lable">Our location</span>
            <a target="_blank" href="https://www.google.com/maps">Open Google Maps</a>
          </li>
        </ul>
      </div>
    </section>
    <!-- Contact Us Section End -->

    <!-- Contact Form Section Start -->
    <section class="contact_form white_text row_am" data-aos="fade-in" data-aos-duration="1500">
      <div class="contact_inner">
        <div class="container">
          <div class="dotes_blue"><img src="{{ asset('images/landing-page/blue_dotes.png') }}" alt="image"></div>
          <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <span class="title_badge">Message us</span>
            <h2>Drop a message us</h2>
            <p>Fill up form below, our team will get back soon</p>
          </div>
          <form data-aos="fade-up" data-aos-duration="1500">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Name *" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email *" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Company Name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select class="form-control">
                    <option value="">Country</option>
                    <option value="">India</option>
                    <option value="">USA</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Phone">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Website">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea class="form-control" placeholder="Comments"></textarea>
                </div>
              </div>
              <div class="col-md-8">
                <div class="coustome_checkbox">
                  <label for="term_checkbox">
                    <input type="checkbox" id="term_checkbox">
                    <span class="checkmark"></span>
                    I agree to receive emails, newsletters and promotional messages
                  </label>
                </div>
              </div>
              <div class="col-md-4 text-right">
                <div class="btn_block">
                  <button class="btn puprple_btn ml-0">Submit</button>
                  <div class="btn_bottom"></div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- Contact Form Section End -->

    <!-- Google Map Start -->
    <div class="map_block row_am" data-aos="fade-in" data-aos-duration="1500">
      <div class="container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103190.9858395081!2d-115.2979677164074!3d36.07597430119342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80beb782a4f57dd1%3A0x3accd5e6d5b379a3!2sLas%20Vegas%2C%20NV%2C%20USA!5e0!3m2!1sen!2sin!4v1691230337798!5m2!1sen!2sin"
          style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <!-- Google Map End -->

  </div>
  <!-- Page-wrapper-End -->

@endsection
