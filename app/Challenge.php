<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Challenge extends Model
{

    protected $guarded = [];
    protected $atttributes = ['status'];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function duration()
    {
        $starts_at = Carbon::parse($this->starts_at);
        $ends_at = Carbon::parse($this->ends_at);
        return $ends_at->diffInDays($starts_at);
    }

    public function daysSinceStart()
    {
        $starts_at = Carbon::parse($this->starts_at);

        return $starts_at->diffInDays(Carbon::now())+1;
    }

}
