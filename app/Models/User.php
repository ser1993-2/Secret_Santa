<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'email_verified_at',
        'created_at',
        'updated_at',
        'password',
        'remember_token',
        'laravel_through_key',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function santa()
    {
        return $this->hasOneThrough( User::class,SantaList::class, 'ward_user_id','id','id','santa_user_id');
    }

    public function ward()
    {
        return $this->hasOneThrough( User::class,SantaList::class, 'santa_user_id','id','id','ward_user_id');
    }

}
