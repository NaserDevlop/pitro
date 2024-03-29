<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Events extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    // ----------------------
    protected $fillable = [
        'serial-no',
        'month',
        'day',
        'title',
        'start-date',
        'end-date',
        'info',
        'note',
        'has-email'
    ];
}
