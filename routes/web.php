<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App'], function () {

    Route::group(['namespace' => 'Livewire'], function () {
        // Route::middleware(['auth', 'auth.basic'])->group(function () {
        Route::group(['namespace' => 'Backend'], function () {
            Route::prefix('backend')->group(function () {
                // Route::get('/home', Home::class);

                Route::group(['namespace' => 'Dashboard'], function () {
                    Route::get('/dashboard', Index::class)->name('backend.dashboard');
                });

                Route::group(['namespace' => 'Master'], function () {
                    Route::prefix('master')->group(function () {
                        Route::group(['namespace' => 'Barang'], function () {
                            Route::prefix('barang')->group(function () {
                                Route::get('/', Index::class)->name('backend.master.barang.index');
                                Route::post('/getTable', 'Index@getTable')->name('backend.master.barang.index.data.table');
                            });
                        });
                    });
                });
            });
        });
        // });

        Route::group(['namespace' => 'Frontend'], function () {

            Route::group(['namespace' => 'Auth'], function () {
                Route::prefix('auth')->group(function () {

                    //             Route::get('/logout', 'Login@logout')->name('frontend.auth.logout');

                    Route::middleware('guest')->group(function () {
                        Route::prefix('login')->group(function () {
                            Route::get('/', Login::class)->name('frontend.auth.login');
                        });

                        //                 Route::prefix('register')->group(function () {
                        //                     Route::get('/', Register::class)->name('frontend.auth.register');
                        //                 });

                        //                 Route::group(['namespace' => 'ForgotPass'], function () {
                        //                     Route::prefix('forgot_pass')->group(function () {
                        //                         Route::get('/', Index::class)->name('frontend.auth.forgot_pass');
                        //                         Route::get('/reset-password/{token}', Reset::class)->name('frontend.auth.password.reset');
                        //                     });
                        //                 });
                    });
                });
            });

            //     Route::group(['namespace' => 'Portal'], function () {
            //         Route::prefix('portal')->group(function () {
            //             Route::group(['namespace' => 'Home'], function () {
            //                 Route::get('/', Index::class)->name('frontend.portal.home.index');
            //             });
            //         });
            //     });
        });
    });
});


Route::get('/', function () {
    return view('welcome');
});
