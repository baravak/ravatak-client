<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Term;

class TermPostController extends Controller
{
    public function index(Request $request, $term, $subTerm = null)
    {
        $this->data->global->title = 'زبان‌زد | ویژه‌نامه ';
        $data = [];
        $data['title'] = $term;
        $data['parent_id'] = 'T966663';
        $this->data->term = (new Term)->execute('%s/find', $data);
        $this->data->terms = Term::apiIndex(['parent' => $this->data->term->id]);
        $term = $this->data->term;
        if($subTerm)
        {
            $this->data->subTerm = Term::apiShow(substr($subTerm, 5));
            $term = $this->data->subTerm;
        }

        $data = $request->all(['order', 'sort', 'status']);
        $this->data->global->title = 'زبان‌زد | ویژه‌نامه ' . __($this->data->term->title);
        $data['primary_term'] = $term->id;
        $data['order'] = 'id';
        $data['sort'] = 'ASC';

        $this->data->posts = Post::apiIndex($data);
        return $this->view($request, 'terms.index');
    }

    public function show(Request $request, $term, Post $post)
    {
        $data['title'] = $term;
        $data['parent_id'] = 'T966663';
        $this->data->term = (new Term)->execute('%s/find', $data);
        $this->data->terms = Term::apiIndex(['parent' => $this->data->term->id]);
        $this->data->post = $post;
        return $this->view($request, 'terms.show');
    }
}
