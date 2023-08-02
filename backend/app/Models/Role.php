<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends CustomModel
{
    public function givePermissionTo(Permission $permission): void
    {
        $this->permissions()->save($permission);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permission');
    }

    public function hasPermissionTo(string $permission): bool
    {
        return $this->permissions()->get()->pluck('ability')->contains($permission);
    }
}
