<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    	'position', 'grade', 'office', 'state_from', 'district_from', 'state_to', 'district_to', 'job_scope', 'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statefrom()
    {
        return $this->belongsTo(State::class, 'state_from');
    }

    public function stateto()
    {
        return $this->belongsTo(State::class, 'state_to');
    }
}
