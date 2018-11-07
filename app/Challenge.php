<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Challenge extends Model
{

    protected $guarded = [];
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

}
