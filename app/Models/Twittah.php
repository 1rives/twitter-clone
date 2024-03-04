<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Twittah extends Model
{
    use HasFactory;

//    protected $guarded = [
//        'id',
//        'created_at',
//        'updated_at',
//    ];

    protected $with = [
        'user:id,name,image',
        'comments.user:id,name,image',
    ];

    protected $fillable = [
        'user_id',
        'content',
    ];

    /**
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return BelongsToMany
     */
    public function likes() {
        return $this->belongsToMany(User::class, 'twittah_like')->withTimestamps();
    }
}
