<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;

use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{

    public function AddProduct()
    {
        $categories = Category::with(['subcategories.subsubcategories'])->latest()->get();
//        dd($categories);
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));

    }

    public function StoreProduct(Request $request)
    {

        $request->validate([
            'digital_file' => 'mimes:pdf|max:2048',
            'product_thumbnail' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
            'multi_img' => 'required|array',
            'multi_img.*' => 'mimes:jpeg,png,jpg,zip,pdf|max:2048'
        ]);

        $digitalItem = null;
        if ($file = $request->file('digital_file')) {
            $destinationPath = 'upload/pdf';

            $digitalItem = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $digitalItem);
        }

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $destinationPath = 'upload/products/thumbnail/';

        Image::make($image)->resize(917, 1000)->save($destinationPath . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,

            'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        ////////// Multiple Image Upload Start ///////////

        if ($request->hasFile('multi_img')) {
            $images = $request->file('multi_img');
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
                $uploadPath = 'upload/products/multi-image/' . $make_name;

                MultiImg::insert([

                    'product_id' => $product_id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),

                ]);
            }
        }

        ////////// Een Multiple Image Upload Start ///////////

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);


    } // end method


    public function ManageProduct()
    {

        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }


    public function EditProduct($id)
    {

        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products', 'multiImgs'));

    }


    public function ProductDataUpdate(Request $request)
    {

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);


    }


/// Multiple Image Update
    public function MultiImageUpdate(Request $request)
    {
        $request->validate([
            'product_thumbnail' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
            'multi_img' => 'required|array',
            'multi_img.*' => 'mimes:jpeg,png,jpg,zip,pdf|max:2048'
        ]);

        $imgs = $request->file('multi_img') ?? [];

        $pro_id = $request->id;

        if (empty($imgs)) {
            return back()->with('error', 'No images uploaded.');
        }

        foreach ($imgs as $img) {

            $imgDel = MultiImg::find($pro_id);

            if (file_exists($imgDel)) {
                unlink($imgDel->photo_name);
            }

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

//            MultiImg::updateOrCreate(
//                ['product_id' => $pro_id],
//                [
//                    'photo_name' => $uploadPath,
//                    'updated_at' => now(),
//                ]
//            );

        }

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    /// Product Main Thumbnail Update ///
    public function ThumbnailImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }


        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Image Thumbnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


    //// Multi Image Delete ////
    public function MultiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);

        if (file_exists($oldimg)) {
            unlink($oldimg->photo_name);
        }
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        if (file_exists($product->product_thumbnail)) {
            unlink($product->product_thumbnail);
        }

        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// end method


    // product Stock
    public function ProductStock()
    {

        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }


}
