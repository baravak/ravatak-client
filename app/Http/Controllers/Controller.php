<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller extends _Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->data->global->title = 'زبان‌زد | مجموعه خرده روایت‌ها';
        $this->data->global->description = 'کتاب زبان‌زد؛ مجموعه خرده روایت‌های زبان‌زد به قلم محمد عبداللهی و نشر انتشارات معارف';
    }
}
