<?php

namespace Nucreativa\LaravelWordpressModels\Models;


use Illuminate\Database\Eloquent\Model;
use Nucreativa\LaravelWordpressModels\Traits\HasMeta;

class Post extends Model
{

    use HasMeta;

    protected $table = 'posts';
    protected $primaryKey = 'ID';
    protected $post_type = null;
    public $timestamps = false;

    const CREATED_AT = 'post_date';
    const UPDATED_AT = 'post_modified';

    public function newQuery()
    {
        $query = parent::newQuery();
        if ($this->post_type) {
            return $this->scopeType($query, $this->post_type);
        }

        return $query;
    }

    public function author()
    {
        return $this->hasOne(User::class, 'ID', 'post_author');
    }

    public function meta()
    {
        return $this->hasMany(PostMeta::class, 'post_id')
                    ->select(['post_id', 'meta_key', 'meta_value']);
    }

    public function terms()
    {
        return $this->hasManyThrough(
            TermTaxonomy::class,
            TermRelationships::class,
            'object_id',
            'term_taxonomy_id'
        )->with('term');
    }

    public function categories()
    {
        return $this->terms()->where('taxonomy', 'category');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'post_parent', 'ID')
                    ->where('post_type', 'attachment');
    }

    public function tags()
    {
        return $this->terms()->where('taxonomy', 'post_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_post_ID');
    }

    public function scopeStatus($query, $status = 'publish')
    {
        return $query->where('post_status', $status);
    }

    public function scopeType($query, $type = 'post')
    {
        return $query->where('post_type', $type);
    }

    public function scopePublished($query)
    {
        return $query->status('publish');
    }
}
