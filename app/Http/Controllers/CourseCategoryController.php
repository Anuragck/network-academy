<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\CourseEnquiry;

class CourseCategoryController extends Controller
{
    public function addCategory(Request $request)
    {

        $request->validate([



            "category_name"  => 'required',

            "category_image"   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=500',


        ]);


        if ($request->id) {


            $category = CourseCategory::find($request->id);
        } else

            $category = new CourseCategory;

        $category->category_name = $request->category_name;




        if ($request->hasFile('category_image')) {




            $img_ext = $request->file('category_image')->getClientOriginalExtension();

            $size= $request->file('category_image')->getSize();



            $filename = $request->category_name  . time() . '.' . $img_ext;
            $path = $request->file('category_image')->move(public_path('uploads/category_images'), $filename); //image save public folder / uploads/category_upload

        }

        $category->category_image = $filename;


        $category->save();
        return 'success';
    }
    public function getCategory()
    {


        return CourseCategory::orderBy('id', 'DESC')->get();
    }

    public function getIndexCategory()
    {


        return CourseCategory::orderBy('id', 'DESC')->get();
    }


  public function getCourseTableCategories()
    {


        return CourseCategory::orderBy('id', 'DESC')->get();
    }






}
