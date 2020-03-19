<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;

class TermPostController extends Controller
{
    public function index(Request $request, $term, $subTerm = null)
    {
        if($term){
            if($cTerm = config('terms.'. $term))
            {
                $class = new $cTerm($request);
                return $class->index($request, $term, $subTerm);
            }
            else {
                abort(404);
            }
        }
        abort(404);
    }
}
