<?php

Route::group(['prefix'=>'user','namespace'=>'user','middleware'=> ['auth','user', '2fa']],function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('user-profile', 'UserController@userProfile')->name('user_profile');
    Route::get('edit-profile', 'UserController@editProfile')->name('edit_profile');
    Route::get('my-collections', 'UserController@myCollections')->name('my_collections');
    Route::get('my-collection-data', 'UserController@myCollectionData')->name('my_collection_data');
    Route::get('my-created-data', 'UserController@myCreatedData')->name('my_created_data');
    Route::get('my-like-data', 'UserController@myLikeData')->name('my_like_data');
    Route::get('following-data', 'UserController@followingData')->name('following_data');
    Route::get('follower-data', 'UserController@followerData')->name('follower_data');
    Route::get('on-sales-data', 'UserController@onSalesData')->name('on_sales_data');
    Route::post('update-profile', 'UserController@updateProfile')->name('update_profile')->middleware('isDemo');
    Route::post('update-cover-photo', 'UserController@updateCoverPhoto')->name('update_cover_photo')->middleware('isDemo');
    Route::get('follow-seller/{id}', 'UserController@followSeller')->name('follow_seller');
    Route::get('unfollow-seller/{id}', 'UserController@unfollowSeller')->name('unfollow_seller');

    Route::get('service/create', 'ServiceController@serviceCreate')->name('service_create');
    Route::post('service/store', 'ServiceController@serviceStore')->name('service_store')->middleware('isDemo');
    Route::get('service/edit/{id}', 'ServiceController@serviceEdit')->name('service_edit');
    Route::post('service/update/{id}', 'ServiceController@serviceUpdate')->name('service_update')->middleware('isDemo');
    Route::get('service/delete/{id}', 'ServiceController@serviceDelete')->name('service_delete')->middleware('isDemo');
    Route::get('/product-to-admin/{id}', 'ServiceController@productToAdmin')->name('product_to_admin')->middleware('isDemo');
    Route::post('resell-service/{service_id}', 'ServiceController@resellService')->name('resell_service')->middleware('isDemo');

    Route::get('my-service-data', 'ServiceController@myServiceData')->name('my_service_data');
    Route::post('user-product-purchase', 'ServiceController@userProductPurchase')->name('user_product_purchase')->middleware('isDemo');
    Route::post('user-product-bid', 'ServiceController@userProductBid')->name('user_product_bid')->middleware('isDemo');

    Route::get('my-wallets', 'WalletController@myWallets')->name('my_wallets');
    Route::get('activity-log/{coin_id}', 'WalletController@activityLog')->name('activity_log');
    Route::get('my-earnings', 'WalletController@myEarnings')->name('my_earnings');
    Route::get('my-earnings_bid', 'WalletController@myEarningsBid')->name('my_earnings_bid');
    Route::post('get-wallet-address', 'WalletController@getWalletAddress')->name('get_wallet_address')->middleware('isDemo');
    Route::get('purchase-history', 'DashboardController@purchaseHistory')->name('purchase_history');
    Route::get('bid-history', 'DashboardController@bidHistory')->name('bid_history');
    Route::post('get-wallet-address', 'WalletController@getWalletAddress')->name('get_wallet_address')->middleware('isDemo');
    Route::post('withdrawal-coin', 'WalletController@withdrawal')->name('withdrawal_coin')->middleware('isDemo');
    Route::post('withdrawal-two-fa-coin', 'WalletController@withdrawalTwoFactorAuthentication')->name('withdrawal_two_fa_coin')->middleware('isDemo');
    Route::get('deposit-data', 'WalletController@depositData')->name('deposit_data');
    Route::get('withdraw-data', 'WalletController@withdrawData')->name('withdraw_data');
    Route::get('settings', 'SettingsController@settings')->name('settings');
    Route::post('enable-google-2fa', 'SettingsController@enableGoogle2FA')->name('enable_google_2fa')->middleware('isDemo.admin');
    Route::post('complete-google-2fa', 'SettingsController@completeGoogle2FA')->name('complete_google_2fa')->middleware('isDemo.admin');
    Route::post('disable-google-2fa', 'SettingsController@disableGoogle2FA')->name('disable_google_2fa')->middleware('isDemo.admin');

});


Route::group(['middleware'=> ['auth']], function () {
    Route::post('/upload-profile-image', 'user\ProfileController@uploadProfileImage')->name('upload_profile_image')->middleware('isDemo');
    Route::post('/user-profile-update', 'user\ProfileController@userProfileUpdate')->name('user_profile_update')->middleware('isDemo');
    Route::post('/phone-verify', 'user\ProfileController@phoneVerify')->name('phone_verify')->middleware('isDemo');
    Route::get('/send-sms-for-verification', 'user\ProfileController@sendSMS')->name('send_SMS')->middleware('isDemo');
    Route::post('change-password-save', 'user\ProfileController@changePasswordSave')->name('change_password_save')->middleware('isDemo');
});
