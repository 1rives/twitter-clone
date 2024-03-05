<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'bio',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Returns all active twits from specified user
     *
     * @return HasMany
     */
    public function twits() {
        return $this->hasMany(Twittah::class)->latest();
    }

    /**
     * Returns all active comments from specified user
     *
     * @return HasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class)->latest();
    }

    /**
     * Returns all the current followings from specified user
     *
     * @return BelongsToMany
     */
    public function followings() {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps();
    }

    /**
     * Returns all the current followers from specified user
     *
     * @return BelongsToMany
     */
    public function followers() {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')->withTimestamps();
    }

    /**
     * Returns the value of whether the user is following or not
     *
     * @param User $user
     * @return bool
     */
    public function isFollowing(User $user){
        return $this->followings()->where('user_id', $user->id)->exists();
    }

    /**
     * @return BelongsToMany
     */
    public function likes() {
        return $this->belongsToMany(Twittah::class, 'twittah_like')->withTimestamps();
    }


    /**
     * Returns all the current likes from specific post
     *
     * @return boolean
     */
    public function likesPost(Twittah $twit) {
        return $this->likes()->where('twittah_id', $twit->id)->exists();
    }

    /**
     * Returns the profile picture URL from specified user
     *
     * @return string
     */
    public function getImageURL(){
        if($this->image) {
            return url('storage/' . $this->image);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed=$this->name";
    }
}
