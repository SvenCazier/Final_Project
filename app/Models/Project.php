<?php

namespace App\Models;

use App\Models\Technology;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory, HasUuids;

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }
}
