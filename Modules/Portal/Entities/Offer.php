<?php

namespace Modules\Portal\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Traits\OnlineModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Cms\Entities\CmsUser;
use \Modules\Core\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Modules\Portal\Traits\InteractsWithMedia;

class Offer extends Model
{
    use SoftDeletes;
    use OnlineModel;
    use Translatable;
    use Sluggable;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'category_id',
        'price',
        'negotiate',
        'promoted',
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

    public array $translatable = [
        'name',
        'slug',
        'short_content',
        'content'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CmsUser::class, 'user_id', 'id');
    }

    public function getUserAttribute()
    {
        return $this->user()->first();
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(OfferCategory::class, 'category_id', 'id');
    }

    public function getCategoryAttribute()
    {
        return $this->category()->first();
    }

    public function stat(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(OfferStat::class, 'offer_id', 'id');
    }

    public function getStatAttribute()
    {
        return $this->stat()->first();
    }

    public function getTotalVisitorsAttribute()
    {
        $stat = $this->stat;
        if ($stat) {
            return $stat->visitor_count;
        }
        return 1;
    }

    public static function searchable()
    {
        $q = request()->get('q', '');
        return self::visible()->where('name->en', 'LIKE', '%' . $q . '%');
    }

    public function scopeVisible($query)
    {
        return $query->whereNotNull('accepted_by');
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
