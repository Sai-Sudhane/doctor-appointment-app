<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens; // Add this line

class Patient extends Model
{
    use HasApiTokens; // Add this line
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}

