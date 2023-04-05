<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class veveRatings extends Model
{
    use HasFactory;
    protected $table = "vev_rating";
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','rating','comments','user_id','store_id'];
    public function store(){
        return $this->belongsTo(VeveStores::class,'store_id');
    }
    public function user(){
        return $this->belongsTo(veveUser::class);
    }
}
