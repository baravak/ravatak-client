<?php
namespace App;


class Post extends API
{
    protected $guarded = [];
    public $with = [
        'terms' => Term::class,
        'primary_term' => Term::class,
    ];
    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }
}
