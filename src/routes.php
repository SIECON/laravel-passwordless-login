<?php

use Grosv\LaravelPasswordlessLogin\LaravelPasswordlessLoginController;
use Grosv\LaravelPasswordlessLogin\HandleAuthenticatedUsers;
use Illuminate\Support\Facades\Route;

Route::domains(config('laravel-passwordless-login.routes_domain', null))
    ->get(
        config('laravel-passwordless-login.login_route').'/{uid}',
        [LaravelPasswordlessLoginController::class, 'login']
    )
    ->middleware(config('laravel-passwordless-login.middleware', ['web', HandleAuthenticatedUsers::class]))->name(config('laravel-passwordless-login.login_route_name'));

Route::domains(config('routes_domain', null))->get('/laravel_passwordless_login_redirect_test_route', [LaravelPasswordlessLoginController::class, 'redirectTestRoute'])->middleware('auth');
Route::domains(config('routes_domain', null))->get('/laravel_passwordless_login_redirect_overridden_route', [LaravelPasswordlessLoginController::class, 'redirectTestRoute'])->middleware('auth');
