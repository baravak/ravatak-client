<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $this->data->stories = Story::apiIndex($request->all(['order', 'sort', 'status']));
        return $this->view($request, 'home');
    }

    public function show(Request $request, Story $story)
    {
        $this->data->story = $story;
        return $this->view($request, 'show');
    }
}
