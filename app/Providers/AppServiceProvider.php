<?php

namespace App\Providers;

use App\Helpers\Helper;
use App\Models\Page;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Schema::defaultStringLength(191);

    Paginator::useBootstrap();


    view()->composer(['layouts.master', 'admin.layouts.master', 'pages.home', 'admin.pages.home'], function ($view) {

      //! header data
      $header = Helper::connectHeadersTexts();
      $header['pages'] = Page::get();
      $header['products'] = Product::select(
        'id',
        'title',
        'trashed'
      )->where('trashed', false)->orderBy('title', 'asc')->get();

      //! footer data
      $footer = Helper::connectFootersTexts();
      $footer['products'] = Product::select(
        'id',
        'title',
        'trashed',
      )->where('trashed', false)->get();
      $footer['projects'] = Project::select(
        'id',
        'title',
        'trashed',
      )->where('trashed', false)->get();
      $footer['site-cards'] = Page::where('route', '!=', 'products')->get();

      return $view->with('route', \Route::currentRouteName())
        ->with([
          'header' => $header,
          'footer' => $footer,
        ]);
    });
  }
}
