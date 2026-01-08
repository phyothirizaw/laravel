<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
     public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes')->withTimestamps();

    }

    public function latestCommentThroughPost() {
        return $this->hasOneThrough(
            Comment::class,  // Final model (C)
            Post::class,     // Intermediate model (B)
            'user_id',       // FK on posts table  posts.user_id
            'post_id',       // FK on comments table  comments.post_id
            'id',            // PK on users table
            'id'             // PK on posts table
        )->latestOfMany(); // get the latest comment
    }

    public function commentsThroughPosts() {
            return $this->hasManyThrough(
                Comment::class, // Final model (C)
                Post::class,    // Intermediate model (B)
                'user_id',      // FK on posts table posts.user_id
                'post_id',      // FK on comments table comments.post_id
                'id',           // PK on users table
                'id'            // PK on posts table
    );
    }
}
