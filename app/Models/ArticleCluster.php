<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArticleCluster extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'cluster_id'
    ];

    /**
     * @return HasMany
     */
    public function clusters(): HasMany
    {
        return $this->hasMany(Cluster::class);
    }

    /**
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
