<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ITSController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\PublicationsController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//! =>> page routes
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::get('/publications', [PublicationsController::class, 'publications'])->name('publications');
Route::get('/publications/read/{id}', [PublicationsController::class, 'publicationsRead'])->name('publications.read');

Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');

Route::get('/services', [ServicesController::class, 'services'])->name('services');
Route::get('/services-download', [ServicesController::class, 'download'])->name('services.download');

Route::get('/products/read/{id}', [ProductsController::class, 'productsRead'])->name('products.read');

Route::get('/its', [ITSController::class, 'its'])->name('its');
//! <<= page routes

//! =>> main routes
Route::post('/feedback', [MainController::class, 'feedback'])->name('feedback');

Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');
//! <<= main routes

// =>> admin panel routes
Route::group(['middleware' => ['AuthCheck']], function () {
  // =>> page routes
  Route::get('/login', [MainController::class, 'login'])->name('login');

  Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');

  Route::get('/admin/about', [AboutController::class, 'adminAbout'])->name('admin.about');

  Route::get('/admin/publications', [PublicationsController::class, 'adminPublications'])->name('admin.publications');
  Route::get('/admin/publications/create', [PublicationsController::class, 'adminPublicationsCreate'])->name('admin.publications.create');
  Route::get('/admin/publications/read/{id}', [PublicationsController::class, 'adminPublicationsRead'])->name('admin.publications.read');
  Route::get('/admin/publications/update/{id}', [PublicationsController::class, 'adminPublicationsUpdate'])->name('admin.publications.update');

  Route::get('/admin/projects', [ProjectsController::class, 'indexAdmin'])->name('admin.projects');
  Route::get('/admin/projects/create', [ProjectsController::class, 'createProject'])->name('admin.projects.create');
  Route::get('/admin/projects/update', [ProjectsController::class, 'editProject'])->name('admin.projects.edit');

  Route::get('/admin/services', [ServicesController::class, 'adminServices'])->name('admin.services');
  Route::post('/services/change-file', [ServicesController::class, 'changeFile'])->name('services.change.file');

  Route::get('/admin/products/create', [ProductsController::class, 'createProduct'])->name('admin.products.create');
  Route::get('/admin/products/edit', [ProductsController::class, 'editProduct'])->name('admin.products.edit');
  Route::get('/admin/products/read/{id}', [ProductsController::class, 'adminProductsRead'])->name('admin.products.read');
  Route::get('/admin/products/delete-content', [ProductsController::class, 'deleteProductContent']);

  Route::get('/admin/its', [ITSController::class, 'adminIts'])->name('admin.its');
  // <<= page routes

  // =>> admin routes
  Route::post('/texts', [AdminController::class, 'texts'])->name('texts');
  Route::post('/pages', [AdminController::class, 'pages'])->name('pages');

  Route::post('/products/store', [ProductsController::class, 'storeProduct'])->name('products.store');
  Route::post('/products/update', [ProductsController::class, 'updateProduct'])->name('products.update');
  Route::post('/products/delete', [ProductsController::class, 'deleteProduct'])->name('products.delete');

  Route::post('/advantages', [AdminController::class, 'advantages'])->name('advantages');
  Route::post('/companies', [AdminController::class, 'companies'])->name('companies');

  Route::post('/projects/store', [ProjectsController::class, 'storeProject'])->name('projects.store');
  Route::post('/projects/update', [ProjectsController::class, 'updateProject'])->name('projects.update');
  Route::post('/projects/delete', [ProjectsController::class, 'deleteProject'])->name('projects.delete');

  Route::post('/success-steps', [AdminController::class, 'successSteps'])->name('success.steps');
  Route::post('/members', [AdminController::class, 'members'])->name('members');
  Route::post('/certificate', [AdminController::class, 'certificates'])->name('certificates');

  Route::post('/publications/create', [PublicationsController::class, 'createPublications'])->name('publications.create');
  Route::post('/publications/update', [PublicationsController::class, 'updatePublications'])->name('publications.update');
  Route::post('/publications/delete', [PublicationsController::class, 'deletePublications'])->name('publications.delete');

  Route::post('/img-tempstore', [AdminController::class, 'imgTempstore']);
  // <<= admin routes
});
// <<= admin panel routes


Route::permanentRedirect('/about-us', '/about');
Route::permanentRedirect('/contacts', '/#contacts');
Route::permanentRedirect('/1s-upravlenie-torgovlej-8', '/products/read/4');
Route::permanentRedirect('/javljaetsja-li-povyshenie-okladov-povodom-dlja-podachi-szv-td', '/publications/read/2');
Route::permanentRedirect('/1s-dokumentooborot-8', '/products/read/3');
