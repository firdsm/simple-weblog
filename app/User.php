<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function publish($post)
    {           
        if (isset($post['picture'])) {
            $post['picture'] = $post['picture']->store('pictures');
        } else {
            $post['picture'] = null;
        }

        $newPost = $this->posts()->create([
            'title' => $post['title'],
            'body' => $post['body'],
            'picture' => $post['picture']
        ]);

        if (isset($post['tags'])) {
            $newPost->tags()->attach($post['tags']);
        }
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAModerator()
    {    
        if ($this->role->id == 1) {

            return true;
        }
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
        
}