<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'slug', 'author', 'image', 'category', 'url', 'source', 'country'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function getNextAttribute()
    {
        return static::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public  function getPreviousAttribute()
    {
        return static::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }


    /**
     * news description relationship
     *
     * @return response()
     */
    public function news_description()
    {
        return $this->hasOne(NewsDescription::class);
    }

    /**
     * new categories
     *
     * @return array
     */
    public static function categories()
    {
        $categories = ['top'];
        foreach (explode(",", config('services.categories')) as $category) {
            $categories[] = trim($category);
        }

        return $categories;
    }
}
