<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Certificate;
use App\Models\Member;
use App\Models\Page;
use App\Models\SuccessStep;

class AboutController extends Controller
{
  public function about()
  {
    $page = Page::where('route', 'about')->first();

    $page = Helper::connectPagesTexts($page);

    $page['success-steps'] = SuccessStep::where('trashed', false)->get();

    $page['members'] = Member::where('trashed', false)->get();

    $page['certificates'] = Certificate::where('trashed', false)->get();

    return view('pages.about', compact('page'));
  }

  public function adminAbout()
  {
    $page = Page::where('route', 'about')->first();

    $page = Helper::connectPagesTexts($page);

    $page['success-steps'] = SuccessStep::where('trashed', false)->get();

    $page['members'] = Member::where('trashed', false)->get();

    $page['certificates'] = Certificate::where('trashed', false)->get();

    return view('admin.pages.about', compact('page'));
  }
}
