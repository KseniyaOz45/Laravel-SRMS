<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $randomTestimonials = Testimonial::inRandomOrder()->limit(5)->get();
        return view('index', compact('randomTestimonials'));
    }
}
