<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Home extends Model
{
    use HasFactory;

    protected $table = 'people';
    protected $fillable = ['name', 'age'];

    public function people()
    {
        return $this->hasOne(User::class);
    }
}
