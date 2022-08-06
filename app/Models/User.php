<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Gabievi\Promocodes\Traits\Rewardable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Yadahan\AuthenticationLog\AuthenticationLog;
use Lab404\AuthChecker\Models\HasLoginsAndDevices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lab404\AuthChecker\Interfaces\HasLoginsAndDevicesInterface;

class User extends Authenticatable implements HasMedia, HasLoginsAndDevicesInterface
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        InteractsWithMedia,
        HasRoles,
        HasLoginsAndDevices,
        Rewardable;

        // public function getActivitylogOptions(): LogOptions
        // {
        //     return LogOptions::defaults()->logFillable()
        //     ->logOnly(['employee.id']);
        //     // Chain fluent methods for configuration options
        // }

    protected $fillable = [
        'email',
        'user_type',
        'password',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $auditInclude = [
        'id',
        'email',
        'user_type',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->nonQueued()
                    ->width(200)
                    ->height(200);
            });
    }

    public function authentications()
    {
        return $this->morphMany(AuthenticationLog::class, 'authenticatable');
    }

    public function employee()
	{
		return $this->hasOne(Employee::class);
	}
}
