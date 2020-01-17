<?php

use App\User;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $guarded = [];
    protected $primarykey='id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}