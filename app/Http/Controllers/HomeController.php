<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Advantage;
use App\Models\Company;
use App\Models\Product;
use App\Models\Project;

class HomeController extends Controller
{
  public function home()
  {
    $home = Helper::connectHomeTexts();

    $home['advantages'] = Advantage::where('trashed', false)->get();

    $home['products'] = Product::where('trashed', false)->get();

    $home['projects'] = Project::select(
      'id',
      'logo',
      'title',
      'description',
      'trashed',
    )->where('trashed', false)->take(3)->get();
    
    $home['companies'] = Company::where('trashed', false)->get();

    return view('pages.home', compact('home'));
  }

  public function adminHome()
  {
    $home = Helper::connectHomeTexts();

    $home['advantages'] = Advantage::where('trashed', false)->get();

    $home['products'] = Product::where('trashed', false)->get();

    $home['projects'] = Project::select(
      'id',
      'logo',
      'description',
      'trashed',
    )->where('trashed', false)->take(3)->get();

    $home['companies'] = Company::where('trashed', false)->get();

    return view('admin.pages.home', compact('home'));
  }
}
