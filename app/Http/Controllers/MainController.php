<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Mail\FeedbackMail;
use App\Mail\TestDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function check(Request $request)
  {
    // Find admin by login
    $admin = Admin::where('login', $request->login)->first();
    // Match the passwords
    if ($admin && Hash::check($request->password, $admin->password)) {
      $request->session()->put('admin', $admin->id);
      return redirect(route('admin.home'));
    }
    return back()->with('fail', 'Мы не узнаем ваш адрес для входа');
  }

  public function logout()
  {
    if (session()->has('admin')) {
      session()->pull('admin');
      return redirect(route('home'));
    }
  }

  public function feedback(Request $request)
  {
    $details = [
      'name' => $request->name,
      'phone' => $request->phone,
    ];

    if (Mail::failures()) {
      return 'fail';
    } else {
      // Mail::to('diis@orienpharm.tj')->send(new FeedbackMail($details));
      Mail::to('info@kit.tj')->send(new FeedbackMail($details));
      return 'success';
    }
  }

  public function testDrive(Request $request)
  {
    $details = [
      'model' => $request->model,
      'dealer' => $request->dealer,
      'name' => $request->name,
      'tel' => $request->tel,
    ];

    return $details;

    if (Mail::failures()) {
      return 'fail';
    } else {
      // Mail::to('diis@orienpharm.tj')->send(new FeedbackMail($details));
      Mail::to('ikromr04@gmail.com')->send(new TestDrive($details));
      return 'success';
    }
  }
}
