<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Page;
use App\Models\PubCat;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
  public function publications(Request $request)
  {
    $page = Page::where('route', 'publications')->first();

    $page = Helper::connectPagesTexts($page);

    $category = $request->category;
    if ($category) {
      $page['publications'] = Publication::where('trashed', false)->where('category_id', $category)->paginate(6);
      return view('pages.publications.index', compact('page', 'category'));
    } else {
      $page['publications'] = Publication::where('trashed', false)->paginate(6);
      return view('pages.publications.index', compact('page'));
    }

  }

  public function publicationsRead(Request $request)
  {
    $publication = Publication::find($request->id);
    $publication['page'] = Page::where('route', 'publications')->first()->title;
    $publications = Publication::where('trashed', false)->where('category_id', $publication->category_id)->get();

    return view('pages.publications.read', compact('publication', 'publications'));
  }

  public function adminPublications(Request $request)
  {
    $page = Page::where('route', 'publications')->first();

    $page = Helper::connectPagesTexts($page);

    $category = $request->category;
    if ($category) {
      $page['publications'] = Publication::where('trashed', false)->where('category_id', $category)->paginate(6);
      return view('admin.pages.publications.index', compact('page', 'category'));
    } else {
      $page['publications'] = Publication::where('trashed', false)->paginate(6);
      return view('admin.pages.publications.index', compact('page'));
    }
  }

  public function adminPublicationsCreate(Request $request)
  {
    $categories = PubCat::where('trashed', false)->get();

    return view('admin.pages.publications.create', compact('categories'));
  }

  public function adminPublicationsRead(Request $request)
  {
    $publication = Publication::find($request->id);
    $publication['page'] = Page::where('route', 'publications')->first()->title;
    $publications = Publication::where('trashed', false)->where('category_id', $publication->category_id)->get();

    return view('admin.pages.publications.read', compact('publication', 'publications'));
  }

  public function adminPublicationsUpdate(Request $request)
  {
    $publication = Publication::find($request->id);
    $categories = PubCat::where('trashed', false)->get();

    return view('admin.pages.publications.update', compact('publication', 'categories'));
  }
  // post routes
  public function createPublications(Request $request)
  {
    $request->validate([
      'category' => 'required',
      'author' => 'required',
      'title' => 'required',
      'content' => 'required',
    ]);

    $publication = new Publication();
    $publication->category_id = $request->category;
    $publication->author = $request->author;
    $publication->title = $request->title;
    $publication->content = $request->content;

    try {
      $publication->save();
      return back()->with('success', 'Публикация успешно добавлена');
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function updatePublications(Request $request)
  {
    $request->validate([
      'category' => 'required',
      'author' => 'required',
      'title' => 'required',
      'content' => 'required',
    ]);

    $publication = Publication::find($request->id);
    $publication->category_id = $request->category;
    $publication->author = $request->author;
    $publication->title = $request->title;
    $publication->content = $request->content;

    try {
      $publication->save();
      return redirect(route('admin.publications.read', $publication->id))->with('success', 'Публикация успешно редактирована');
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function deletePublications(Request $request)
  {
    $publication = Publication::find($request->id);
    $publication->trashed = true;
    $publication->save();

    return redirect(route('admin.publications'))->with('success', 'Публикация успешно удалена!');
  }
}
