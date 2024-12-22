<?php

namespace App\Models;

use App\Support\Enums\ProjectStatuses;
use App\Support\Enums\ProjectTypes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Project extends Model
{
    use HasUlids;

    protected $table = 'projects';
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'status',
        'link',
        'hook_size',
        'needle_size',
        'yarn',
        'yarn_weight',
        'dye_lot',
        'steps',
        'notes',
        'row',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'type' => ProjectTypes::class,
        'status' => ProjectStatuses::class,
        'steps' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function stitches(): HasManyThrough{
        return $this->hasManyThrough(Stitch::class, 'project_stitches');
    }

}
