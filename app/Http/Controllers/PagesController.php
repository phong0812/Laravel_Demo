<?php
namespace App\Http\Controllers;

use Illuminate\Http\Requests;

/**
 * 
 */
class PagesConTroller extends Controller
{
	
	public function home()
	{
		return view('home');
	}
    
    public function contact()
    {
    	return view('tickets.create');
    }

    public function about()
    {
    	return view('about');
    }
}