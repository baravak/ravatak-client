<?php
namespace App;


class Story extends API
{
    protected $guarded = [];
    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }
}
