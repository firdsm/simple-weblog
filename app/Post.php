<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable =[
        'title', 
        'body',
        'picture',
        'slug'
    ];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);
    }

    public function addComment($body)
    {   
    	$this->comments()->create([
            'user_id' => auth()->id(),
            'body' => $body            
        ]);
    }

    public function scopeFilter($query, $filters)
    {
      if (isset($filters['month'])) 
        {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

        if (isset($filters['year'])) 
        {
            $query->whereYear('posts.created_at', $filters['year']);
        }           
    }

    public static function archieves()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                        ->groupBy('year', 'month')
                        ->orderBy('created_at', 'desc')
                        ->get(); 
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
