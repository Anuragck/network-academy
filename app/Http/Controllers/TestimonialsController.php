<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function addTestimonial(Request $request)
    {




        $request->validate([
            "testimonial_name"  => 'required',
            'designation' => 'required',
            'testimonial_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:200|dimensions:min_width=400,min_height=400,max_width=430,max_height=430',
            'description' => 'required',
        ]);


        if ($request->id) {


            $testimonials = Testimonial::find($request->id);
        } else

            $testimonials = new Testimonial;

        if ($request->section == 'testimonial') {
            $testimonials->section_bit = '1';
        }
        if ($request->section == 'placements') {
            $testimonials->section_bit = '2';
        }
        $testimonials->name = $request->testimonial_name;
        $testimonials->designation = $request->designation;
        $testimonials->description = $request->description;



        if ($request->hasFile('testimonial_image')) {

            $filename = $request->file('testimonial_image')->getClientOriginalName();



            if ($filename != $testimonials->testimonial_image) {


                $img_ext = $request->file('testimonial_image')->getClientOriginalExtension();
                $filename = $request->testimonial_name  . time() . '.' . $img_ext;
                $path = $request->file('testimonial_image')->move(public_path('uploads/testimonials_images'), $filename); //image save public folder / uploads/testimonials_images
            }
        }

        $testimonials->testimonial_image = $filename;
        $testimonials->save();
        return 'success';
    }

    public function getTestmonial(Request $request)
    {

        $testimonials =  Testimonial::orderBy('id', 'DESC');
        return $testimonials->paginate(7);
    }

    public function deleteTestimonial(Request $request)
    {
        $res = Testimonial::find($request->id)->delete();
        if ($res) {
            return 'success';
        }
    }
}
