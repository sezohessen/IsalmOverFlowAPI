<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
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
        'reputation',
        'last_access',
        'about',
        'website',
        'profile_img_url',
        'location',
        'title',
    ];

    const base = '\profile-img';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function Register(Request $request)
    {
        $credentials = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        return $credentials;
    }

    public static function Edit(Request $request,$img)
    {
        $credentials = [
            'name'              => $request->name,
            'about'             => $request->about,
            'website'           => $request->website,
            'title'             => $request->title,
            'location'          => $request->location,
            'profile_img_url'   => $img,
        ];
        return $credentials;
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
