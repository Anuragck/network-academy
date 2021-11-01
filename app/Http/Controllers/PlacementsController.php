<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class PlacementsController extends Controller
{
    public function getPlacements(){
        $placements =  Testimonial::where('section_bit', '2')->orderBy('id', 'DESC')->get();
        return $placements;
    }
}
