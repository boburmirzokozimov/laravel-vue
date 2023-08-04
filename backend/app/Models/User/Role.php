<?php

namespace App\Models\User;

use App\Models\CustomModel;
use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends CustomModel
{
    use HasFactory;

    protected static function newFactory(): RoleFactory
    {
        return new RoleFactory();
    }

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
