<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Company;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
  public function index()
  {
    $page = Page::where('route', 'projects')->first();
    $page = Helper::connectPagesTexts($page);
    $page['projects'] = Project::where('trashed', false)->latest()->get();

    $home = Helper::connectHomeTexts();
    $home['companies'] = Company::where('trashed', false)->get();

    return view('pages.projects', compact('page', 'home'));
  }

  public function indexAdmin()
  {
    $page = Page::where('route', 'projects')->first();
    $page = Helper::connectPagesTexts($page);
    $page['projects'] = Project::where('trashed', false)->latest()->get();

    $home = Helper::connectHomeTexts();
    $home['companies'] = Company::where('trashed', false)->get();

    return view('admin.pages.projects.index', compact('page', 'home'));
  }

  public function createProject(Request $request)
  {
    $page = Page::where('route', 'projects')->first();

    return view('admin.pages.projects.create', compact('page'));
  }

  public function storeProject(Request $request)
  {
    $request->validate([
      'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:10',
      'title' => 'required',
      'description_title' => 'required',
      'description' => 'required|max:500',
      'content' => 'required',
    ]);

    $project = new Project();

    $file = $request->file('logo');
    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
    $path = public_path('img/companies');
    $file->move($path, $fileName);

    $project->logo = $fileName;
    $project->title = $request->title;
    $project->description_title = $request->description_title;
    $project->description = $request->description;
    $project->content = $request->content;

    try {
      $project->save();
      return back()->with('success', 'Публикация успешно добавлена');
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function editProject(Request $request)
  {
    $page = Page::where('route', 'projects')->first();
    $project = Project::find($request->id);

    return view('admin.pages.projects.edit', compact('page', 'project'));
  }

  public function updateProject(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'description_title' => 'required',
      'description' => 'required|max:500',
      'content' => 'required',
    ]);

    $project = Project::find($request->id);


    $file = $request->file('logo');
    if ($file) {
      $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
      $path = public_path('img/companies');
      $file->move($path, $fileName);
      $project->logo = $fileName;
    }

    $project->title = $request->title;
    $project->description_title = $request->description_title;
    $project->description = $request->description;
    $project->content = $request->content;

    try {
      $project->save();
      return redirect(route('admin.projects'))->with('success', 'Публикация успешно добавлена');
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function deleteProject(Request $request)
  {
    $project = Project::find($request->id);
    $project->trashed = true;

    try {
      $project->save();
      return 'success';
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
