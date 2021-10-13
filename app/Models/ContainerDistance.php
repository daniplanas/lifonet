<?php

namespace App\Models;

use App\Traits\AutoGenerateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerDistance extends Model
{
    use HasFactory, AutoGenerateUuid;
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'container_id',
        'distance',
    ];
    public function isAlert()
    {
        return ContainerAlert::where('alarmeable_type','App\Models\ContainerDistance')
            ->where('alarmeable_id',$this->id)
            ->exists();
    }
}
