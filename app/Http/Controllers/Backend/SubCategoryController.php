<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {

        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory', 'categories'));

    }


    public function SubCategoryStore(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ], [
            'category_id.required' => 'Please select Any option',
            'subcategory_name.required' => 'Input SubCategory Name',
        ]);


        SubCategory::create([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),

        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory', 'categories'));

    }

    public function SubCategoryUpdate(Request $request)
    {

        $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),

        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);

    }


    public function SubCategoryDelete($id)
    {

        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    /////////////// That for SUB->SUBCATEGORY ////////////////

    public function SubSubCategoryView()
    {

//        $subsubcategories = SubSubCategory::with(['category', 'subcategory'])->get();
        $categories = Category::with(['subcategories.subsubcategories'])->get();
//        dd($subsubcategories);
        return view('backend.category.sub_subcategory_view', compact( 'categories'));

    }


    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)
            ->orderBy('subcategory_name', 'ASC')
            ->get();

        return json_encode($subcat);
    }


    public function GetSubSubCategory($subcategory_id)
    {

        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)
            ->orderBy('subsubcategory_name', 'ASC')
            ->get();
        return json_encode($subsubcat);
    }


    public function SubSubCategoryStore(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name' => 'required',
        ], [
            'category_id.required' => 'Please select Any option',
            'subsubcategory_name.required' => 'Input SubSubCategory Name',
        ]);


        SubSubCategory::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower(str_replace(' ', '-', $request->subsubcategory_name)),

        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function SubSubCategoryEdit($id)
    {
//        $categories = Category::orderBy('category_name', 'ASC')->get();
        $categories = Category::with(['subcategories.subsubcategories'])->orderBy('category_name', 'ASC')->get();
//        $subcategories = SubCategory::orderBy('subcategory_name', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name', 'ASC')->pluck('subcategory_name', 'id');
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit', compact('categories', 'subcategories', 'subsubcategories'));

    }


    public function SubSubCategoryUpdate(Request $request)
    {

        $subsubcat_id = $request->id;

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower(str_replace(' ', '-', $request->subsubcategory_name)),

        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subsubcategory')->with($notification);

    }


    public function SubSubCategoryDelete($id)
    {

        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


}
