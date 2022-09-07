<?php

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=> ['auth','admin']],function () {

    Route::get('dashboard', 'DashboardController@adminDashboard')->name('admin_dashboard');
    Route::get('profile', 'UserController@adminProfile')->name('admin_profile');
    Route::post('user-profile-update', 'UserController@UserProfileUpdate')->name('admin_user_profile_update')->middleware('isDemo.admin');
    Route::post('upload-profile-image', 'UserController@uploadProfileImage')->name('upload_profile_image')->middleware('isDemo.admin');
    Route::get('users', 'UserController@adminUsers')->name('admin_users');
    Route::get('user-profile', 'UserController@adminUserProfile')->name('admin_user_profile');
    Route::post('user-add', 'UserController@UserAddEdit')->name('admin_user_add_edit');
    Route::get('user-edit', 'UserController@UserEdit')->name('admin_user_edit');
    Route::get('user-delete-{id}', 'UserController@adminUserDelete')->name('admin_user_delete')->middleware('isDemo.admin');
    Route::get('user-suspend-{id}', 'UserController@adminUserSuspend')->name('admin_user_suspend');
    Route::get('user-active-{id}', 'UserController@adminUserActive')->name('admin_user_active');
    Route::get('user-remove-gauth-set-{id}', 'UserController@adminUserRemoveGauth')->name('admin_user_remove_gauth');
    Route::get('user-email-verify-{id}', 'UserController@adminUserEmailVerified')->name('admin_user_email_verify');
    Route::get('deleted-users', 'UserController@adminDeletedUser')->name('admin_deleted_user')->middleware('isDemo.admin');

    Route::get('wallet-list', 'TransactionController@adminWalletList')->name('admin_wallet_list');
    Route::get('deposit-history', 'TransactionController@depositHistory')->name('deposit_history');

    Route::get('pending-withdrawal', 'TransactionController@adminPendingWithdrawal')->name('admin_pending_withdrawal');
    Route::get('rejected-withdrawal', 'TransactionController@adminRejectedWithdrawal')->name('admin_rejected_withdrawal');
    Route::get('active-withdrawal', 'TransactionController@adminSuccessWithdrawal')->name('admin_success_withdrawal');
    Route::get('accept-pending-withdrawal-{id}', 'TransactionController@adminAcceptPendingWithdrawal')->name('admin_accept_pending_withdrawal');
    Route::get('reject-pending-withdrawal-{id}', 'TransactionController@adminRejectPendingWithdrawal')->name('admin_reject_pending_withdrawal');


    Route::get('general-settings', 'SettingsController@adminSettings')->name('admin_settings');
    Route::get('payment-methods', 'SettingsController@adminPaymentSetting')->name('admin_payment_setting');
    Route::post('change-payment-methods', 'SettingsController@changePaymentMethodStatus')->name('change_payment_method_status')->middleware('isDemo.admin');
    Route::post('common-settings', 'SettingsController@adminCommonSettings')->name('admin_common_settings')->middleware('isDemo.admin');
    Route::post('save-payment-settings', 'SettingsController@adminSavePaymentSettings')->name('admin_save_payment_settings')->middleware('isDemo.admin');
    Route::post('email-save-settings', 'SettingsController@adminSaveEmailSettings')->name('admin_save_email_settings')->middleware('isDemo.admin');

    //Coin settings
    Route::get('coin-list','CoinController@adminCoinList')->name('coin_list');
    Route::get('coin-add','CoinController@adminCoinAdd')->name('coin_add');
    Route::get('coin-edit-{id}','CoinController@adminCoinEdit')->name('coin_edit');
    Route::post('coin-save','CoinController@adminCoinSave')->name('coin_save')->middleware('isDemo.admin');

    Route::get('api-settings','CoinController@adminApiSettings')->name('api_settings');
    Route::post('api-settings-save','CoinController@adminApiSettingsSave')->name('api_settings_save')->middleware('isDemo.admin');


    //  Withdrawal Limit Settings
    Route::get('withdrawal-coin-settings', 'WithdrawalCoinLimitSettingController@withdrawalCoinLimit')->name('withdrawal_coin_settings');
    Route::post('withdrawal-limit-save', 'WithdrawalCoinLimitSettingController@withdrawalLimitSave')->name('withdrawal_limit_save')->middleware('isDemo.admin');
    Route::get('update-withdrawal-limit/{id}', 'WithdrawalCoinLimitSettingController@updateWithdrawalLimit')->name('update_withdrawal_limit');
    Route::get('delete-withdrawal-limit/{id}', 'WithdrawalCoinLimitSettingController@deleteWithdrawalLimit')->name('delete_withdrawal_limit')->middleware('isDemo.admin');
    Route::post('update-withdrawal-limit-process/{id}', 'WithdrawalCoinLimitSettingController@updateWithdrawalLimitProcess')->name('update_withdrawal_limit_process')->middleware('isDemo.admin');

    // Subscribers
    Route::get('subscriber-list', 'SubscriberController@subscriberList')->name('admin_subscriber_list');
    Route::get('subscriber-mail/{id}', 'SubscriberController@subscriberMail')->name('admin_subscriber_mail');
    Route::post('subscriber-mail/reply', 'SubscriberController@subscriberMailReply')->name('admin_subscriber_mail_reply')->middleware('isDemo.admin');
    // contacts
    Route::get('contact-list', 'SubscriberController@contactList')->name('admin_contact_list');

    // Categories
    Route::get('category-list', 'CategoryController@categoryList')->name('admin_category_list');
    Route::get('add-category', 'CategoryController@addCategory')->name('admin_add_category');
    Route::post('store-category', 'CategoryController@storeCategory')->name('admin_store_category')->middleware('isDemo.admin');
    Route::get('edit-category/{id}', 'CategoryController@editCategory')->name('admin_edit_category');
    Route::post('update-category/{id}', 'CategoryController@updateCategory')->name('admin_update_category')->middleware('isDemo.admin');
    Route::get('delete-category/{id}', 'CategoryController@deleteCategory')->name('admin_delete_category')->middleware('isDemo.admin');

    // News
    Route::get('news-list', 'NewsController@newsList')->name('admin_news_list');
    Route::get('add-news', 'NewsController@addNews')->name('admin_add_news');
    Route::post('store-news', 'NewsController@storeNews')->name('admin_store_news')->middleware('isDemo.admin');
    Route::get('edit-cnews/{id}', 'NewsController@editNews')->name('admin_edit_news');
    Route::post('update-news/{id}', 'NewsController@updateNews')->name('admin_update_news')->middleware('isDemo.admin');
    Route::get('delete-news/{id}', 'NewsController@deleteNews')->name('admin_delete_news')->middleware('isDemo.admin');

    // Service
    Route::get('service-list', 'ServiceController@serviceList')->name('admin_service_list');
    Route::get('add-service', 'ServiceController@addService')->name('admin_add_service');
    Route::get('edit-service/{id}', 'ServiceController@editService')->name('admin_edit_service');
    Route::post('update-service/{id}', 'ServiceController@updateService')->name('admin_update_service')->middleware('isDemo.admin');
    Route::get('approve-service/{id}', 'ServiceController@approveService')->name('admin_approve_service')->middleware('isDemo.admin');
    Route::get('cancel-service/{id}', 'ServiceController@cancelService')->name('admin_cancel_service')->middleware('isDemo.admin');
    Route::get('update-service-slider/{id}', 'ServiceController@updateServiceSlider')->name('admin_update_service_slider')->middleware('isDemo.admin');

    // Bid
    Route::get('show-bid/{id}', 'ServiceController@showBid')->name('admin_show_bid');
    Route::get('bid-success/{service_id}/{id}', 'ServiceController@bidSuccess')->name('admin_bid_success')->middleware('isDemo.admin');

    //Slider
    Route::get('slider/', 'SettingsController@slider')->name('admin_slider');
    Route::post('slider-update', 'SettingsController@sliderUpdate')->name('admin_slider_update')->middleware('isDemo.admin');

    //Contents
    Route::get('contents/', 'SettingsController@contents')->name('admin_contents');
    Route::post('contents-update', 'SettingsController@contentsUpdate')->name('admin_contents_update')->middleware('isDemo.admin');

    //Counters
    Route::get('counters/', 'SettingsController@counters')->name('admin_counters');
    Route::post('counters-update', 'SettingsController@countersUpdate')->name('admin_counters_update')->middleware('isDemo.admin');

    //FAQ
    Route::get('faq-heading', 'FaqController@faqHeading')->name('admin_faq_heading');
    Route::get('faq-heading-edit/{id}', 'FaqController@faqHeadingEdit')->name('admin_faq_heading_edit');
    Route::post('faq-heading-update/{id}', 'FaqController@faqHeadingUpdate')->name('admin_faq_heading_update')->middleware('isDemo.admin');

    Route::get('faq-content', 'FaqController@faqContent')->name('admin_faq_content');
    Route::get('faq-content-add', 'FaqController@faqContentAdd')->name('admin_faq_content_add');
    Route::post('faq-content-store', 'FaqController@faqContentStore')->name('admin_faq_content_store')->middleware('isDemo.admin');
    Route::get('faq-content-edit/{id}', 'FaqController@faqContentEdit')->name('admin_faq_content_edit');
    Route::post('faq-content-update/{id}', 'FaqController@faqContentUpdate')->name('admin_faq_content_update')->middleware('isDemo.admin');
    Route::get('faq-content-delete/{id}', 'FaqController@faqContentDelete')->name('admin_faq_content_delete');

    //Transactions
    Route::get('transaction-settings', 'TransactionController@transactionSettings')->name('admin_transaction_settings');
    Route::post('service-charge-update', 'TransactionController@serviceChargeUpdate')->name('admin_service_charge_update')->middleware('isDemo.admin');
    Route::get('all-transaction', 'TransactionController@allTransaction')->name('admin_all_transaction');

    //SEO Settings
    Route::get('seo-settings', 'SeoController@seoSettings')->name('admin_seo_settings');
    Route::post('update-seo', 'SeoController@updateSEO')->name('admin_update_seo');

    //Cache
    Route::get('cache-configuration', 'CacheController@cacheConfiguration')->name('admin_cache_configuration');
    Route::post('update-cdn', 'CacheController@updateCDN')->name('admin_update_cdn');
    Route::get('clear-cache', 'CacheController@cacheClear')->name('admin_cache_clear');

    //Earnings
    Route::get('platform-earnings', 'TransactionController@platformEarnings')->name('admin_platform_earnings');

    //Languages
    Route::get('all-languages', 'LanguageController@allLanguages')->name('admin_all_languages');
    Route::post('language-update/{id}', 'LanguageController@languageUpdate')->name('admin_language_update');
    Route::post('language-store', 'LanguageController@languageStore')->name('admin_language_store');
    Route::get('language-delete/{id}', 'LanguageController@languageDelete')->name('admin_language_delete');


});
