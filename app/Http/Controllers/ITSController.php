<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Page;
use Illuminate\Http\Request;

class ITSController extends Controller
{
  public function its()
  {
    $page = Page::where('route', 'its')->first();
    $page = Helper::connectPagesTexts($page);

    return view('pages.its', compact('page'));
  }

  public function adminIts()
  {
    $page = Page::where('route', 'its')->first();
    $page = Helper::connectPagesTexts($page);

    return view('admin.pages.its', compact('page'));
  }
}
