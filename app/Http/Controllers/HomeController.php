<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $this->data->special = Post::apiShow('P966666U');
        $this->data->stories = Story::apiIndex($request->all(['order', 'sort', 'status', 'page']));
        return $this->view($request, 'home');
    }

    public function show(Request $request, Story $story, $title = null)
    {
        $this->data->global->title = 'زبان‌زد | ' . $story->story_number . ' - ' . $story->title;
        $this->data->story = $story;
        if($title && snake_url($story->title) != $title)
        {
            return redirect()->route('stories.showTitle', ['story' => $story->id, 'title' => snake_url($story->title)]);
        }
        $this->data->global->description = \text2summary($story->content);
        return $this->view($request, 'show');
    }

    public function aboutUs(Request $request)
    {
        return $this->view($request, 'aboutUs');
    }
}
