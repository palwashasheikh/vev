<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class veveorderServiceDetail extends Authenticatable
{

    protected $table = 'orderservicesDetail';
    protected $fillable = ['OrderId','appoimentserviceId','date'
    ];
    protected $primaryKey = 'orderserviceDetailId';
    // protected $hidden = ['created_at','updated_at'];


}
