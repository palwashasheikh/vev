<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class veveorderProductDetail extends Authenticatable
{

    protected $table = 'orderproductdetail';
    protected $fillable = ['OrderId','ProductId','Modifier1','Modifier2','Quantity'
    ];
    protected $primaryKey = 'orderproductDetailId';
   // protected $hidden = ['created_at','updated_at'];

    public function products()
    {
        return $this->belongsToMany(veveCart::class);
    }
}
