<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable =[
        'name',
        'status',
        'owner_id',
    ];

    public function owner(){
        return $this->belongTo(User::class,'owner_id');
    }

    public function users(){
        return $this->belongsToMany(Colocation::class, 'user_id')
                    ->withPivot(['role','joined_at','left_at'])
                    ->withTimestamps();
    }

    public function getInviteLinkAttribute() 
    { 
        return route('colocations.join', ['token' => $this->invite_token]); 
    }

}