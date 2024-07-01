<!--================ Start Footer Area =================-->
<footer class="footer-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        ut labore dolore
                        magna aliqua.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay update with our latest</p>
                    <div>

                        <form novalidate="true" action="{{ route('subscriber.store') }}" method="post"
                            class="form-inline">
                            @csrf
                            @session('status')
                            <div class="alert alert-success">{{ session('status') }}</div>
                            @endsession

                            <div class="d-flex flex-row">
                                <input class="form-control" name="email" placeholder="Enter Email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                    type="email" value="{{ old('email') }}">

                                <button type="submit" class="click-btn btn btn-default"><span
                                        class="lnr lnr-arrow-right"></span></button>

                                <!-- <div class="col-lg-4 col-md-4">
                                            <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                                        </div>  -->
                            </div>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instragram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <li><img src="{{ asset('assets') }}/img/instagram/i1.jpg" alt=""></li>
                        <li><img src="{{ asset('assets') }}/img/instagram/i2.jpg" alt=""></li>
                        <li><img src="{{ asset('assets') }}/img/instagram/i3.jpg" alt=""></li>
                        <li><img src="{{ asset('assets') }}/img/instagram/i4.jpg" alt=""></li>
                        <li><img src="{{ asset('assets') }}/img/instagram/i5.jpg" alt=""></li>
                        <li><img src="{{ asset('assets') }}/img/instagram/i6.jpg" alt=""></li>
                        <li><img src="{{ asset('assets') }}/img/instagram/i7.jpg" alt=""></li>
                        <li><img src="{{ asset('assets') }}/img/instagram/i8.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://www.facebook.com/Ibrahim3zazy">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://wa.me/+2001145452440">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart"
                    aria-hidden="true"></i> by <a href="https://ibarhim3zazy.github.io/My_Contacts/"
                    target="_blank">Ibrahim 3zazy</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</footer>
<!--================ End Footer Area =================-->