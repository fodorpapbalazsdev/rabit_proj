<?php
Route::set('users', function () {
    UsersController::CreateView('users');
});

Route::set('advertisements', function () {
    AdvertisementsController::CreateView('advertisements');
});

Route::set('index', function () {
    IndexController::CreateView('index');
});