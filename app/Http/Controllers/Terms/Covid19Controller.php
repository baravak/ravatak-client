<?php

namespace App\Http\Controllers\Terms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class Covid19Controller extends Controller
{
    public function index(Request $request, $term, $subTerm = null)
    {
        $data = $request->all(['order', 'sort', 'status']);
        $data['term_slug'] = 'COVID19';
        $this->data->posts = Post::apiIndex($data);
        return $this->view($request, 'terms.covid19.index');
    }
}
