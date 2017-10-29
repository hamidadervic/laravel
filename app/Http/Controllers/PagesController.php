<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index() {
    	return view('pages.index');
    }

    public function about() {
    	return view('pages.about');
    }

    public function services() {
    	$services = array(
               'title' => 'All services',
               'services' => ['Web design', 'Web development', 'Programming']
    		);
    	
    	return view('pages.services')->with('services',$services);
    }
}
