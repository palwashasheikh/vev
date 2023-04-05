<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class vevOrder extends Authenticatable
{

    protected $table = 'orders';

    protected $fillable  = [
        'orderId',
        'userId',
        'AddressId',
        'orderDate',
        'total',
        'OrderCode',
        'orderstatus',
        'PaymentMethodId',
        'type'

    ];
    protected $guarded = 'userId';
   // protected $hidden;
    protected $primaryKey = 'orderId';
    protected $hidden=['created_at','updated_at'];

    public function products()
    {
        return $this->belongsToMany(veveCart::class);
    }
}
