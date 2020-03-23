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
        $data = $request->all(['page']);
        $data['order'] = 'id';
        $data['sort'] = 'ASC';
        if ($subTerm)
        {
            $this->data->subTerm = Term::apiShow($subTerm);
            $term = $this->data->subTerm;
            $this->data->subTerms = Term::apiIndex(['parent' => $subTerm]);
            $data['term'] = $term->id;
        }
        else
        {
            $data['primary_term'] = $term->id;
        }
        $this->data->global->title = 'زبان‌زد | ویژه‌نامه ' . __($this->data->term->title);
        $this->data->posts = Post::apiIndex($data);
        return $this->view($request, 'terms.index');
    }

    public function show(Request $request, $term, Post $post, $title = null)
    {
        if ($title && snake_url($post->title) != $title) {
            return redirect()->route('termPost.show', ['term' => $term, 'post' => $post->id, 'title' => snake_url($post->title)]);
        }
        $data['title'] = $term;
        $data['parent_id'] = 'T966663';
        $this->data->term = (new Term)->execute('%s/find', $data);
        $this->data->terms = Term::apiIndex(['parent' => $this->data->term->id]);
        $this->data->post = $post;
        $this->data->global->description = \text2summary($post->content);
        return $this->view($request, 'terms.show');
    }
}
