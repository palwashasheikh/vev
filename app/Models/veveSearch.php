<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class veveSearch extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = "vevesearch";
    protected $primaryKey = 'searchId';


    protected $fillable=['UserId','SearchKeyword','SearchType','SearchTypeId'];
    protected $hidden=['UserId','updated_at','deleted_at'];

}

