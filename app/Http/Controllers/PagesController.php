<?php

namespace NetPortal\Http\Controllers;

use Illuminate\Http\Request;

use NetPortal\Http\Requests;
use NetPortal\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
        $people = [
            'Taylor Otwell', 'Dayle Rees', 'Eric Barnes'
        ];

        return view('pages.about', compact('people'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
