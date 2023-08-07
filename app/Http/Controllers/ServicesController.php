<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Page;
use App\Models\Text;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
  public function services()
  {
    $page = Page::where('route', 'services')->first();

    $page = Helper::connectPagesTexts($page);

    return view('pages.services', compact('page'));
  }

  public function adminServices()
  {
    $page = Page::where('route', 'services')->first();

    $page = Helper::connectPagesTexts($page);

    return view('admin.pages.services', compact('page'));
  }

  public function download()
  {
    $fileName = Text::where('caption', 'services-file')->first()->text;
    $file = public_path('files/' . $fileName);

    $extension = pathinfo($file, PATHINFO_EXTENSION);

    $headers = array(
      'Content-Type: application/' . $extension,
    );

    return response()->download($file, $fileName, $headers);
  }

  public function changeFile(Request $request)
  {

    $file = $request->file('file');
    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

    $text = Text::where('caption', 'services-file')->first();
    $text->text = $fileName;
    $text->save();

    try {
      $file->move(public_path('files'), $fileName);
      return back()->with('success', 'Файл успешно изменен!');
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
