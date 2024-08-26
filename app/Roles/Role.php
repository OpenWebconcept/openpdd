<?php

declare(strict_types=1);

namespace App\Roles;

use WP_Role;

class Role
{
    public string $role;

    public function __construct(string $role)
    {
        $this->role = $role;
    }

    public function getRole(): ?WP_Role
    {
        return get_role($this->role);
    }

    public function addRole(string $displayName, array $caps): void
    {
        add_role($this->role, $displayName, $caps);
    }

    public function addCap(string $cap): void
    {
        $this->getRole()->add_cap($cap);
    }
}
