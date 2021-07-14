<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function facts(){
        return view('pages.facts');
    }

    public function portfolio(){
        return view('pages.portfolio');
    }

    public function resume(){
        return view('pages.resume');
    }

    public function services(){
        return view('pages.services');
    }

    public function skills(){
        return view('pages.skills');
    }

    public function testimonials(){
        return view('pages.testimonials');
    }

    public function dashboard() {
        return view('pages.dashboard.index');
    }
}
