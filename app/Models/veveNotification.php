<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class veveNotification extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='vevnotifications';
    protected $primaryKey='NotificationId';
    protected $fillable=['UserId','ReferenceType','ReferenceId','DisplayImage','Title','MessageType','Message','BoldWords','status'];
    protected $hidden=['UserId','NotificationId','deleted_at','updated_at'];
}
