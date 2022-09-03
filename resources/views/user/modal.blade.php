<!-- All Modal Placed Here Start -->
@if(Auth::check() != true)
    <!-- Sign Up Modal Start -->
    <div class="modal fade common-modal " id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <h4 class="modal-title" id="signUpModalLabel">{{__('main.Create-an-account')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 ajax-alert">
                    <p class="already-have-account">{{__('main.Already-have-an-account')}} <a data-toggle="modal" href="#signInModal" class="color-green font-semi-bold">{{__('main.Sign-In')}}</a></p>
                    {{Form::open(['route' => 'sign_up_process', 'files' => true, 'data-handler'=>"showMessage" ,'class' => 'ajax'])}}

                    <div class="form-group">
                        <input class="form-control" placeholder="{{__('main.Email-Address')}}" name="email" type="email" required>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <input class="form-control" placeholder="{{__('main.First-name')}}" name="first_name" type="text" required>
                            </div>
                            <div class="col-12 col-lg-6">
                                <input class="form-control" placeholder="{{__('main.Last-name')}}" name="last_name" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control password" placeholder="{{__('main.Password')}}" type="password" name="password" required>
                        <span class="toggle cursor fas fa-eye pass-icon"></span>
                    </div>

                    <div class="form-group">
                        <input class="form-control password" placeholder="{{__('main.Confirm Password')}}" type="password" name="password_confirmation" required>
                        <span class="toggle cursor fas fa-eye pass-icon"></span>
                    </div>

                    <div class="terms-policy-box">
                        <label class="d-flex align-items-start">
                            <input type="checkbox" checked="checked" name="remember">
                            <span>{{__('main.account-agree')}} <a href="#" class="color-green">{{__('main.Privacy Policy')}}</a> and <a href="#" class="color-green">{{__('main.Terms of Service.')}}</a></span>
                        </label>
                    </div>

                    <div class="sign-up-button-part">
                        <button class="theme-button1 w-100">{{__('main.Sign Up')}}</button>
                    </div>

                    <div class="sign-up-social-part">
                        <p class="recaptcha-text">{{__('main.protected-recaptcha')}} <a href="#" class="color-green">{{__('main.Privacy Policy')}}</a> {{__('main.and')}} <a href="#" class="color-green">{{__('main.Terms of Service.')}}</a></p>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up Modal End -->
    <!-- Sign In Modal Start -->
    <div class="modal fade common-modal " id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0 ">
                    <h4 class="modal-title" id="signInModalLabel">{{__('main.Sign in')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 ajax-alert">
                    <p class="already-have-account">{{__('main.New user?')}} <a data-toggle="modal" href="#signUpModal" class="color-green font-semi-bold">{{__('main.Create-an-account')}}</a></p>
                    {{Form::open(['route' => 'login_process', 'files' => true, 'data-handler'=>"showMessage" ,'class' => 'ajax'])}}

                    <div class="form-group">
                        <input class="form-control" placeholder="{{__('main.Email-Address')}}" name="email" type="email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control password" placeholder="{{__('main.Password')}}" name="password" type="password" required>
                        <span class="toggle cursor fas fa-eye pass-icon"></span>
                    </div>
                    <div class="sign-up-button-part">
                        <a class="forget-pass-btn color-green border-0 font-semi-bold" data-toggle="modal" href="#forgetPasswordModal">{{__('main.Forgot-password')}}</a>
                        <button type="submit"  class="theme-button1">{{__('main.Sign-In')}}</button>
                    </div>
                    <div class="sign-up-social-part">
                        <p class="recaptcha-text">{{__('main.protected-recaptcha')}} <a href="#" class="color-green">{{__('main.Privacy Policy')}}</a>
                            {{__('main.and')}} <a href="#" class="color-green">{{__('main.Terms of Service.')}}</a></p>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In Modal End -->

    <!-- Forget Password Modal Start -->
    <div class="modal fade common-modal" id="forgetPasswordModal" tabindex="-1" aria-labelledby="forgetPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <h4 class="modal-title" id="forgetPasswordModalLabel">{{__('main.Forget Password')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 ajax-alert">
                    <p class="already-have-account">{{__('main.We will send reset code in this email.')}}</p>
                {{Form::open(['route' => 'send_forgot_mail', 'files' => true, 'data-handler'=>"showMessage"])}}
                        <!-- forget-pass-box form -->
                        <div class="form-group">
                            <input class="form-control" placeholder="{{__('main.Email-Address')}}" name="email" type="email" required>
                        </div>
                        <div class="sign-up-button-part">
                            <button type="submit" class="theme-button1">{{__('main.Submit')}}</button>
                        </div>
                        <!-- forget-pass-box form -->
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
    <!-- Forget Password Modal End -->
@endif
@if(Auth::check() == true)
    <!-- Main Item Preview Pop Up Modal Start -->
    <div class="modal fade common-modal" id="mainItemPreviewModal" tabindex="-1" aria-labelledby="mainItemPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <p class="modal-title" id="mainItemPreviewModalLabel">{{__('main.Preview')}}</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <!-- main item slider start -->
                    <div class="main-item">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="main-item-content-part">
                                    <h2 class="section-heading" id="service-title">{{__('main.Item Name')}}</h2>
                                    <div class="main-item-views-love d-flex align-items-center justify-content-between">
                                        <div class="main-item-views-part d-flex align-items-center">
                                            <span>{{__('main.Views: 0')}}</span>
                                            <span>{{__('main.In stock:')}} <span id="in-stock-item">{{__('0')}}</span></span>
                                        </div>
                                        <div class="main-item-love-part">
                                            <button class="color-red"><i class="far fa-heart"></i></button> <span class="font-weight-bold color-heading">{{__('0')}}</span>
                                        </div>
                                    </div>
                                    <!-- Main Item Leftside Box Start -->
                                    <div class="main-item-leftside-box">
                                        <div class="current-bid-box">
                                            <p class="font-weight-bold color-heading">{{__('main.Price')}}</p>
                                            <div class="bid-price-box">
                                                <h2><span id="price-dollar-service">{{__('0.00')}}</span> <span class="bid-small-price">{{__('in USD')}}</span></h2>
                                            </div>
                                        </div>
                                        <div class="owner-creator-box">
                                            <div class="owner-box">
                                                <img src="{{ isset(Auth::user()->photo) ? asset(IMG_USER_VIEW_PATH.Auth::user()->photo) : Avatar::create(Auth::user()->first_name.' '.Auth::user()->last_name)->toBase64()}}" alt="{{__('main.owner')}}">
                                                <h6>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h6>
                                                <p>{{__('main.Owner')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Main Item Leftside Box End -->
                                    <!-- Main Item Leftside Box Start -->
                                    <div class="main-item-leftside-box">
                                        <div class="highest-bid-box d-flex align-items-center justify-content-between">
                                            <div class="highest-box-item d-flex align-items-center">
                                                <img src="{{asset('assets/user/img/main-item-img/'.'color-icon.png')}}" alt="{{__('main.bid')}}">
                                                <div class="highest-box-text">
                                                    <p>{{__('main.Color')}}</p>
                                                    <h6 id="product-color">{{__('main.Color')}}</h6>
                                                </div>
                                            </div>
                                            <div class="highest-box-item d-flex align-items-center">
                                                <img src="{{asset('assets/user/img/main-item-img/'.'country-icon.png')}}" alt="{{__('main.bid')}}">
                                                <div class="highest-box-text">
                                                    <p>{{__('main.Origin')}}</p>
                                                    <h6 id="product-origin">{{__('main.Origin')}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main-item-btn-box">
                                            <button class="theme-button1 w-100 disabled">{{__('main.Purchase Now')}}</button>
                                            <button class="theme-button2 w-100 disabled">{{__('main.Place a Bid')}}</button>
                                        </div>
                                    </div>
                                    <!-- Main Item Leftside Box End -->
                                </div>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="main-item-img-part position-relative d-flex justify-content-center">
                                    <div class="main-item-img">
                                        <img src="{{asset('assets/user/img/main-item-img/'.'create-new-preview.jpg')}}" id="target2" alt="{{__('main.item')}}">
                                    </div>
                                    <!-- Countdown box start -->
                                    <div class="countdown-box position-absolute">
                                        <span class="bg-green time-remaining">{{__('main.Expired Date')}}</span>
                                        <div class="countdown">
                                            <div class="timer-down-wrap"><span id="hours1">{{__('06')}}</span><span class="timing-title">{{__('main.Hrs')}}</span></div>
                                            <div class="timer-down-wrap"><span id="minutes1">{{__('35')}}</span><span class="timing-title">{{__('main.Min')}}</span></div>
                                            <div class="timer-down-wrap"><span id="seconds1">{{__('54')}}</span><span class="timing-title">{{__('main.Sec')}}</span></div>
                                        </div>
                                    </div>
                                    <!-- Countdown box end -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- main item slider end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Main Item Preview Pop Up Modal End -->
@endif
<!-- Purchase1 modal start -->
@if (isset($service))
    <div class="modal fade common-modal purchase-inner-modal" id="purchase1Modal" tabindex="-1" aria-labelledby="purchase1ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <h4 class="modal-title" id="purchase1ModalLabel">{{__('menu.Checkout')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <!-- Change Price Modal Box Start -->
                    <div class="change-price-box checkout-content-box">
                        <div class="purchasing-process-box align-items-center d-none" id="purchase-loader">
                            <div class="steps__icon purchasing-process-left">
                                <div class="loader-circle"></div>
                            </div>
                            <div class=" purchasing-process-right">
                                <h6 class="steps__info">{{__('menu.Purchasing')}}</h6>
                                <div class="steps__text">{{__('menu.send-transaction-text')}}</div>
                            </div>
                        </div>
                        <div id="checkout-event" class="ajax-alert">
                            @if ($service->type == 1)
                                <p class="preview-inner-modal-info">{{__('menu.You-have-to-pay ').visual_number_format($service->price_dollar).__(' USD')}}</p>
                                {{Form::open(['route' => 'user_product_purchase', 'files' => true, 'data-handler'=>"showMessage" ,'class' => 'ajax'])}}
                            @elseif($service->type == 2)
                                {{Form::open(['route' => 'user_product_bid', 'files' => true, 'data-handler'=>"showMessage" ,'class' => 'ajax'])}}
                            @endif
                                <input type="hidden" value="{{$service->id}}" name="service_id" id="service_id">
                                <input type="hidden" value="{{Auth::id()}}" name="user_id" id="user_id">
                                <input type="hidden" name="coin_type" id="coin_type">
                                <input type="hidden" name="coin_id" id="coin_id">
                                <input type="hidden" name="conversion_rate" id="conversion_rate">
                                <input type="hidden" name="coin_amount" id="on_balance">
                                <input type="hidden" name="on_service_fee" id="on_service_fee" value="{{serviceChargeBuyer($service->price_dollar)}}">
                                <input type="hidden" name="on_receiver_fee" id="on_receiver_fee" value="{{serviceChargeSeller($service->price_dollar)}}">
                                <input type="hidden" name="service_charge_coin" id="service_charge_coin">
                                <input type="hidden" name="receiver_charge_coin" id="receiver_charge_coin">
                                <input type="hidden" name="final_pay" id="final_pay">
                                <input type="hidden" value="{{route('change_price_to_coin')}}" id="change-coin">
                                @if ($service->type == 1)
                                    <input type="hidden" value="{{$service->price_dollar}}" name="price" id="price">
                                @elseif($service->type == 2)
                                    <div class="form-group">
                                        <label for="">{{hasPreviousBid($service->id) == 1 ? __('menu.iba') : __('main.Bid Amount')}}</label>
                                        <input type="number" min="1" step="0.00000001" placeholder="{{__('main.Amount')}}" class="form-control" value="" name="price" id="price">
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="">{{__('menu.Coin')}}</label>
                                    <select name="wallet_id" id="wallet_id" class="form-control">
                                        <option value="0">{{__('menu.select-coin')}}</option>
                                        @foreach (coinListUser() as $wallet)
                                            <option value="{{$wallet->id}}">{{$wallet->coin->full_name.' ('.$wallet->coin->coin_type.')'}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>{{__('menu.Your-balance')}}</td>
                                    <th scope="row" id="my-balance">-</th>
                                </tr>
                                <tr>
                                    <td>{{__('menu.Product-Price')}}</td>
                                    <th scope="row" id="balance">-</th>
                                </tr>
                                <tr>
                                    <td>{{__('menu.Service-fee')}}</td>
                                    <th scope="row" id="service-fee">-</th>
                                </tr>
                                <tr>
                                    <td>{{__('menu.You-have-to-pay')}}</td>
                                    <th scope="row" id="pay">-</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="preview-inner-modal-btn">
                            <button class="theme-button1 w-100" type="submit">{{__('menu.I-understand-continue')}}</button>
                            <button class="theme-button2 w-100">{{__('menu.Cancel')}}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                    <!-- Change Price Modal Box End -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade common-modal purchase-inner-modal" id="purchaseNotModal" tabindex="-1" aria-labelledby="purchaseNotModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <h4 class="modal-title" id="purchaseNotModalLabel">{{__('menu.Alert')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <!-- Change Price Modal Box Start -->
                    <div class="change-price-box checkout-content-box">
                        <div class="purchasing-process-box align-items-center" id="purchase-loader">

                            <div class=" purchasing-process-right">
                                <h6 class="steps__info">{{__('menu.This-is-your-product')}}</h6>
                                <div class="steps__text text-danger">{{__('menu.restrict-purchase-message')}}</div>
                            </div>
                        </div>
                    </div>
                    <!-- Change Price Modal Box End -->
                </div>
            </div>
        </div>
    </div>
@endif
<!-- Purchase1 modal end -->
<!-- Purchase3 modal start -->
<div class="modal fade common-modal purchase-inner-modal" id="purchase3Modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <!-- Change Price Modal Box Start -->
                <div class="change-price-box checkout-content-box">
                    <div class="purchase-done-box">
                        <h3>{{__('menu.Yeah!')}}</h3>
                        <p>{{__('menu.successfully-purchased-coinz')}}
                        </p>
                    </div>
                    <div class="purchase-status-table p-3">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>{{__('menu.Status')}}</td>
                                <th scope="row">{{__('menu.Transaction-ID')}}</th>
                            </tr>
                            <tr>
                                <td class="color-green">{{__('menu.Processing')}}</td>
                                <th scope="row">{{__('0msx836930...87r398')}}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Change Price Modal Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Purchase3 modal end -->
<div class="modal fade common-modal purchase-inner-modal" id="notAuthModal" tabindex="-1" aria-labelledby="notAuthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h4 class="modal-title" id="purchaseNotModalLabel">{{__('menu.Alert')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <!-- Change Price Modal Box Start -->
                <div class="change-price-box checkout-content-box">
                    <div class="purchasing-process-box align-items-center" id="purchase-loader">

                        <div class=" purchasing-process-right">
                            <h6 class="steps__info">{{__('menu.Please-login-first!')}}</h6>
                            <div class="steps__text">{{__('menu.login-first')}}<br><br><a data-dismiss="modal" data-toggle="modal" href="#signInModal" class="theme-button1 nav-upload" id="login-first">{{__('main.Login-Now')}}</a></div>
                        </div>
                    </div>
                </div>
                <!-- Change Price Modal Box End -->
            </div>
        </div>
    </div>
</div>
<!-- All Modal Placed Here End -->

