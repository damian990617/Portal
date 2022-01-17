<?php

namespace Modules\Portal\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Traits\OnlineModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Modules\Core\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Modules\Portal\Traits\InteractsWithMedia;

class OfferCategory extends Model
{
    use SoftDeletes;
    use OnlineModel;
    use Translatable;
    use Sluggable;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'short_content',
        'content',
        'active',
        'accepted_by',
        'accepted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'accepted_at'
    ];

    protected $casts = [
        'short_content' => 'json',
        'content' => 'json',
    ];

    public array $translatable = [
        'name',
        'slug',
        'short_content',
        'content'
    ];

    public function offers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Offer::class, 'category_id', 'id');
    }

    public function scopeVisible($query)
    {
        return $query->whereActive(1);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    public function getRouteKeyName()
    {
        $application = resolve('application');
        if ($application->isFrontend()) {
            return 'slug';
        }
        return 'id';
    }
}
