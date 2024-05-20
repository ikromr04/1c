<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VacancyController extends Controller
{
  public function index()
  {
    $page['vacancies'] = Vacancy::where('trashed', false)->latest()->get();

    return view('pages.vacancies', compact('page'));
  }

  public function indexAdmin()
  {
    $page['vacancies'] = Vacancy::where('trashed', false)->latest()->get();

    $home = Helper::connectHomeTexts();

    return view('admin.pages.vacancies.index', compact('page', 'home'));
  }

  public function createVacancy()
  {
    return view('admin.pages.vacancies.create');
  }

  public function storeVacancy(Request $request)
  {
    $request->validate([
      'description' => 'required',
      'content' => 'required',
    ]);

    $vacancy = new Vacancy();
    $vacancy->description = $request->description;
    $vacancy->content = $request->content;

    try {
      $vacancy->save();
      return back()->with('success', 'Вакансия успешно добавлена');
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function editVacancy(Request $request)
  {
    $vacancy = Vacancy::find($request->id);

    return view('admin.pages.vacancies.edit', compact('vacancy'));
  }

  public function updateVacancy(Request $request)
  {
    $request->validate([
      'description' => 'required',
      'content' => 'required',
    ]);

    $vacancy = Vacancy::find($request->id);
    $vacancy->description = $request->description;
    $vacancy->content = $request->content;

    try {
      $vacancy->save();
      return redirect(route('admin.vacancies'))->with('success', 'Вакансия успешно сохранена');
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function send(Request $request)
  {
    $file = $request->file('cv');

    Mail::send('emails.cv', [
      'title' => $request->title,
    ], function ($message) use ($file) {
      $message->to('info@kit.tj');
      $message->subject('Отклик на вакансию');

      $message->attach(
        $file->getRealPath(),
        array(
          'as' => $file->getClientOriginalName(), // If you want you can chnage original name to custom name
          'mime' => $file->getMimeType()
        )
      );
    });

    return back()->with('success', 'Ваше резюме успешно отправлена');;
  }

  public function deleteVacancy(Request $request)
  {
    $vacancy = Vacancy::find($request->id);
    $vacancy->trashed = true;

    try {
      $vacancy->save();
      return 'success';
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
