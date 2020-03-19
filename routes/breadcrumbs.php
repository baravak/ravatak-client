<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
# Stories
Breadcrumbs::for('dashboard.stories.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Stories'), route('home'));
});
Breadcrumbs::for('dashboard.stories.show', function ($trail, $data) {
    $trail->parent('dashboard.stories.index', $data);
    $trail->push('(' . $data['story']->story_number . ') ' .$data['story']->title, route('home'));
});

Breadcrumbs::for('dashboard.stories.edit', function ($trail, $data) {
    $trail->parent('dashboard.stories.show', $data);
    $trail->push(__('Edit'), route('home'));
});

Breadcrumbs::for('dashboard.stories.create', function ($trail, $data) {
    $trail->parent('dashboard.stories.index', $data);
    $trail->push(__('Create new Story'), route('home'));
});

# Posts
Breadcrumbs::for('dashboard.posts.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Posts'), route('home'));
});
Breadcrumbs::for('dashboard.posts.show', function ($trail, $data) {
    $trail->parent('dashboard.posts.index', $data);
    $trail->push($data['post']->title, route('home'));
});

Breadcrumbs::for('dashboard.posts.edit', function ($trail, $data) {
    $trail->parent('dashboard.posts.show', $data);
    $trail->push(__('Edit'), route('home'));
});

Breadcrumbs::for('dashboard.posts.create', function ($trail, $data) {
    $trail->parent('dashboard.posts.index', $data);
    $trail->push(__('Create new Post'), route('home'));
});
