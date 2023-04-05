<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\veveRole;
use Auth;

class veveUser extends Authenticatable
{
    use HasFactory, Notifiable ,HasApiTokens;
    protected $table = "veve_user";
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','user_name','user_email','password','user_address',  'google_id','facebook_id','user_phonenumber','device_token','UserInternetProtocol','role_id'
    ];
    private $guard;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['id',
        'updated_at','password','deleted_at',
        'remember_token','old_password',   'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function search()
    {
        return $this->hasMany(veveSearch::class,'userId');
    }
    public function addresses()
    {
        return $this->hasMany(veveAddresses::class, 'user_id');
    }
    public function order()
    {
        return $this->hasMany(vevOrder::class, 'user_id', 'id');
    }
    public function notifications()
    {
        return veveNotification::orderBy('created_at','DESC')->paginate(6)->getCollection();
    }
    public function notification($data)
    {
        return veveNotification::create($data);
    }
    public function hasRole($role)
{
        if ($this->role()->where('id', '=', $role)->first()) {
            return true;
        }

    return false;
}
    public function role()
    {
        return $this->belongsTo(veveRole::class);
    }
    public function getRole()
    {
        return veveRole::where('id', '=', Auth::user()->role_id)->value('role_name');
    }

    public function isAdmin()
    {
        if($this->role_id === 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
