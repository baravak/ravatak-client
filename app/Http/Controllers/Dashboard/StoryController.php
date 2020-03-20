<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Story;

class StoryController extends Controller
{
    public function index(Request $request)
    {
        $this->data->stories = Story::apiIndex($request->all(['order', 'sort', 'status', 'page']));
        return $this->view($request, 'dashboard.stories.index');
    }

    public function create(Request $request)
    {
        return $this->view($request, 'dashboard.stories.create');
    }

    public function store(Request $request)
    {
        return Story::apiStore($request->except('_method'))->response()->json([
            'redirect' => route('dashboard.stories.create')
        ]);
    }

    public function edit(Request $request, Story $story)
    {
        return $this->view($request, 'dashboard.stories.create', ['story' => $story]);
    }

    public function update(Request $request, $story)
    {
        return Story::apiUpdate($story, $request->except('_method'))->response()->json(['redirect' => route('dashboard.stories.edit', ['story' => $story])]);
    }

    public function show(Request $request, Story $story)
    {
        return $this->view($request, 'dashboard.stories.show', ['story' => $story]);
    }
}
