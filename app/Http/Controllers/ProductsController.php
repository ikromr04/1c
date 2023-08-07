<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use App\Models\ProductsContent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class ProductsController extends Controller
{
  public function productsRead($id)
  {
    $product = Product::find($id);
    $productPage = Page::where('route', 'products')->first();

    return view('pages.products.read', compact('product', 'productPage'));
  }

  public function adminProductsRead($id)
  {
    $product = Product::find($id);
    $productPage = Page::where('route', 'products')->first();

    return view('admin.pages.products.read', compact('product', 'productPage'));
  }

  public function createProduct()
  {
    $productPage = Page::where('route', 'products')->first();

    return view('admin.pages.products.create', compact('productPage'));
  }

  public function storeProduct(Request $request)
  {
    $product = new Product();
    if ($request->file('picture')) {
      $file = $request->file('picture');
      $filename = uniqid() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('img/products'), $filename);

      $product->picture = $filename;
    }
    $product->title = $request->title;
    $product->description = $request->description;
    try {
      $product->save();
    } catch (\Throwable $th) {
      return $th;
    }

    $contents = json_decode($request->contents);
    if (count($contents) > 0) {
      foreach ($contents as $content) {
        $table = new ProductsContent();
        $table->product_id = $product->id;
        $table->content = $content;
        try {
          $table->save();
        } catch (\Throwable $th) {
          return $th;
        }
      }
    }
    return back()->with('success', 'Продукт успешно добавлен');
  }

  public function upload_simditor_photo(Request $request)
  {
    $file = $request->file('simditor_photo');
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();

    $file->move(public_path('img/products/simditor'), $filename);

    return [
      "success" => true,
      "msg" => "success",
      "file_path" => '/img/products/simditor/' . $filename,
    ];
  }

  public function editProduct(Request $request)
  {
    $product = Product::find($request->id);
    $productPage = Page::where('route', 'products')->first();

    return view('admin.pages.products.edit', compact('product', 'productPage'));
  }

  public function updateProduct(Request $request)
  { 
    $product = Product::find($request->id);
    if ($request->file('picture') && $request->file('picture') != $product->picture) {
      $file = $request->file('picture');
      $filename = uniqid() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('img/products'), $filename);

      $product->picture = $filename;
    }
    $product->title = $request->title;
    $product->description = $request->description;
    try {
      $product->save();
    } catch (\Throwable $th) {
      return $th;
    }

    $contentsEdit = json_decode($request->contents_edit);
    if (count($contentsEdit) > 0) {
      foreach ($contentsEdit as $content) {
        $table = ProductsContent::find($content->id);
        $table->content = $content->content;
        try {
          $table->save();
        } catch (\Throwable $th) {
          return $th;
        }
      }
    }

    $contents = json_decode($request->contents);
    if (count($contents) > 0) {
      foreach ($contents as $content) {
        $table = new ProductsContent();
        $table->product_id = $product->id;
        $table->content = $content;
        try {
          $table->save();
        } catch (\Throwable $th) {
          return $th;
        }
      }
    }
    return back()->with('success', 'Продукт успешно редактирован');
  }

  public function deleteProductContent(Request $request)
  {
    $content = ProductsContent::find($request->id);
    try {
      $content->delete();
      return 'success';
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function deleteProduct(Request $request)
  {
    $product = Product::find($request->productID);
    $product->trashed = true;

    try {
      $product->save();
      return 'success';
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
