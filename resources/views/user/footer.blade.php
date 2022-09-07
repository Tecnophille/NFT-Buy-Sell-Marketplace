<!-- Footer Start -->
<footer class="footer-area position-relative">
    <!-- footer elements start -->
    <img src="{{asset('assets/user/img/footer-img/'. 'footer-rect-shape.png')}}" alt="{{__('main.shape')}}" class="footer-rect-shape position-absolute">
    <img src="{{asset('assets/user/img/footer-img/'. 'footer-dot1.png')}}" alt="{{__('main.dot')}}" class="footer-dot1 position-absolute">
    <img src="{{asset('assets/user/img/footer-img/'. 'footer-dot2.png')}}" alt="{{__('main.dot')}}" class="footer-dot2 position-absolute">
    <img src="{{asset('assets/user/img/footer-img/'. 'footer-dot3.png')}}" alt="{{__('main.dot')}}" class="footer-dot3 position-absolute">
    <!-- footer elements end -->
    <div class="container">
        <!-- .footer-widget-area -->
        <div class="row footer-top-part section-p-t-b-100">
            <div class="col-12 col-sm-3 col-md-3 col-lg-4">
                <div class="footer-widget footer-about">
                    <img src="{{is_null($allsetting['logo']) || $allsetting['logo'] == '' ? asset(IMG_STATIC_PATH. 'logo.png') : asset(IMG_PATH. $allsetting['logo'])}}" alt="{{$allsetting['app_title']}}">
                    <p>{{__('main.New-Creative-Text')}}</p>
                </div>
            </div>
            <div class="col-12 col-sm-5 col-md-5 col-lg-4">
                <div class="footer-widget">
                    <h6>{{__('main.Links')}}</h6>
                    <div class="footer-links d-flex">
                        <ul>
                            <li><a href="{{route('discover')}}">{{__('main.Discover')}}</a></li>
                            <li><a href="{{route('how-it-works')}}">{{__('main.FAQ')}}</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{route('contact')}}">{{__('main.Contact-Us')}}</a></li>
                            @if(Auth::check() != true)
                                <li><button data-toggle="modal" data-target="#signInModal">{{__('main.Sign-In')}} </button></li>
                                <li><button data-toggle="modal" data-target="#signUpModal">{{__('main.Sign-Up')}}</button></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                <div class="footer-widget footer-newsletter">
                    <h6>{{__('main.Join-Newsletter')}}</h6>
                    <p>{{__('main.Join-Newsletter-Text')}}
                    </p>
                    <div class="footer-links">
                        {{Form::open(['route' => 'subscriber_store', 'files' => false, 'data-handler'=>"showMessage" ,'class' => 'ajax'])}}
                            <div class="form-group position-relative mb-2">
                                <input type="email" class="form-control" id="email-address" name="email_address" placeholder="{{__('main.Enter-your-email')}}">
                                <button type="submit" class="position-absolute"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        {{Form::close()}}
                        <small class="ajax-alert"></small>
                    </div>
                </div>
            </div>
        </div>
        <!--copyright-text-->
        <div class="row">
            <div class="col-md-12">
                <div class="copyright-wrapper d-flex justify-content-center align-items-center">
                    <div class="copyright-text">
                        <p>{{$allsetting['copyright_text'].' '.$allsetting['app_title'].__('main.rights-reserved-text')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
