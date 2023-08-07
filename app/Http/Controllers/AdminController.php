<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\imgTemp;
use App\Models\Member;
use App\Models\Page;
use App\Models\SuccessStep;
use App\Models\Text;
use Illuminate\Http\Request;
use Image;

class AdminController extends Controller
{
  public function texts(Request $request)
  {
    // update text
    $text = Text::where('caption', $request->caption)->first();
    $text->text = $request->text;

    if ($request->caption == 'how-began-text') {
      $text->save();
      return back();
    }

    try {
      $text->save();
      return 'success';
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function pages(Request $request)
  {
    // update page
    $page = Page::find($request->pageID);
    $page->title = $request->title;

    try {
      $page->save();
      return 'success';
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function advantages(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $advantage = new Advantage();
        $advantage->content = $request->content;

        try {
          $advantage->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;

      case 'update':
        $advantage = Advantage::find($request->id);
        $advantage->content = $request->content;

        try {
          $advantage->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;

      case 'delete':
        $advantage = Advantage::find($request->id);
        $advantage->trashed = true;

        try {
          $advantage->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;
    }
  }

  public function companies(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $company = new Company();

        $file = $request->file('logo');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('img/companies');
        $file->move($path, $fileName);

        $company->logo = $fileName;
        $company->site = $request->site;
        $company->title = $request->title;
        $company->category = $request->category;

        try {
          $company->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;

      case 'update':
        $company = Company::find($request->id);

        $file = $request->file('logo');
        if ($file) {
          $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
          $path = public_path('img/companies');
          $file->move($path, $fileName);

          $company->logo = $fileName;
        }

        $company->site = $request->site;
        $company->title = $request->title;
        $company->category = $request->category;

        try {
          $company->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;

      case 'delete':
        $company = Company::find($request->id);
        $company->trashed = true;

        try {
          $company->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;
    }
  }

  public function imgTempstore(Request $request)
  {
    $file = $request->file('file');
    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

    $imgTemp = imgTemp::first();

    if ($imgTemp) {
      $path = public_path('img/tempstore/' . $imgTemp->filename);
      if (file_exists($path)) {
        unlink($path);
      }
      $imgTemp->filename = $fileName;
      $imgTemp->save();
      $path = public_path('img/tempstore');
      $file->move($path, $fileName);
      return $fileName;
    } else {
      $imgTemp = new imgTemp();
      $imgTemp->filename = $fileName;
      $imgTemp->save();
      $path = public_path('img/tempstore');
      $file->move($path, $fileName);
      return $fileName;
    }
  }

  public function successSteps(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $step = new SuccessStep();
        $step->text = $request->text;

        try {
          $step->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;

      case 'update':
        $step = SuccessStep::find($request->id);
        $step->text = $request->text;

        try {
          $step->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;

      case 'delete':
        $step = SuccessStep::find($request->id);
        $step->trashed = true;

        try {
          $step->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;
    }
  }

  public function members(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $member = new Member();

        $file = $request->file('avatar');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('img/members');
        $file->move($path, $fileName);

        $member->avatar = $fileName;
        $member->name = $request->name;
        $member->position = $request->position;

        try {
          $member->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;

      case 'update':
        $member = Member::find($request->id);

        $file = $request->file('avatar');
        if ($file) {
          $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
          $path = public_path('img/members');
          $file->move($path, $fileName);

          $member->avatar = $fileName;
        }

        $member->name = $request->name;
        $member->position = $request->position;

        try {
          $member->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;

      case 'delete':
        $member = Member::find($request->id);
        $member->trashed = true;

        try {
          $member->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;
    }
  }

  public function certificates(Request $request)
  {
    switch ($request->action) {
      case 'create':
        $certificate = new Certificate();

        $img = $request->file('img');
        $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
        $path = public_path('img/certificates');
        
        $imgThumb = Image::make($img->getRealPath());
        $imgThumb->resize(228, 323);
        $imgThumb->save(public_path('img/certificates/thumbs/' . $imgName));
        
        $img->move($path, $imgName);
        $certificate->img = $imgName;

        try {
          $certificate->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;
      case 'update':
        $certificate = Certificate::find($request->id);

        $img = $request->file('img');
        $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
        $path = public_path('img/certificates');

        $imgThumb = Image::make($img->getRealPath());
        $imgThumb->resize(228, 323);
        $imgThumb->save(public_path('img/certificates/thumbs/' . $imgName));

        $img->move($path, $imgName);
        $certificate->img = $imgName;

        try {
          $certificate->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;
      case 'delete':
        $certificate = Certificate::find($request->id);
        $certificate->trashed = true;

        try {
          $certificate->save();
          return 'success';
        } catch (\Throwable $th) {
          return $th;
        }
        break;
    }
  }
}
