<?php

Route::group([

    'middleware' => 'api',

], function () {

    Route::post('login', 'UserManagementController@login');
    Route::post('logout', 'UserManagementController@logout');
    Route::post('refresh', 'UserManagementController@refresh');
    Route::post('me', 'UserManagementController@me');

    Route::post('sendPasswordResetLink','ForgotPasswordController@sendEmail');
    Route::post('resetPassword','ChangePasswordController@process');
    /// Staff
    Route::get('getDataStaff', 'HomeController@index');
    Route::get('getStaff', 'FormController@index');
    Route::get('getStaffById/{id}', 'FormController@getStaffById');
    Route::post('addStaff', 'FormController@staffAdd');
    Route::post('updateStaff/{id}', 'FormController@staffUpdate');
    Route::delete('deteleStaff/{id}', 'FormController@staffDelete');
    // chấm công
    Route::get('getChamCong', 'ChamCongController@getCham_Cong');
    // Calendar
    Route::get('calendar','HomeController@calendar');
});
