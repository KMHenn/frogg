<?php

namespace App\Models;

use App\Support\Enums\ProjectTypes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Stitch extends Model
{
    use HasUlids;
    protected $table = 'stitches';
    protected $fillable = [
        'name',
        'type',
        'abbreviation',
        'steps',
    ];

    protected $casts = [
        'type' => ProjectTypes::class,
        'steps' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function projects(): BelongsToMany{
        return $this->belongsToMany(Project::class, 'project_stitches');
    }
}
