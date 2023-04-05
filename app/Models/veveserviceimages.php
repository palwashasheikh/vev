<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class veveserviceimages extends Model
{
    protected $table = 'services_images';

    protected $casts = [
        'servicesId' => 'int'
    ];

    protected $fillable = [
        'servicesId',
        'servicesImage',
    ];

    public function services()
    {
        return $this->belongsTo(veveService::class);
    }
}
