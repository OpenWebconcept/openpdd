<?php

class Role
{
    public $role;

    public function __construct(string $role)
    {
        $this->role = $role;
    }

    public function getRole(): ?object
    {
        return get_role($this->role);
    }

    /**
     * Get key & value pairs
     * Used when adding a role
     *
     * @return array
     */
    public function getGravityFormsCapsKeyValue(): array
    {
        return [
            'gravityforms_create_forms'         => true,
            'gravityforms_delete_forms'         => true,
            'gravityforms_edit_forms'           => true,
            'gravityforms_preview_forms'        => true,
            'gravityforms_view_entries'         => true,
            'gravityforms_edit_entries'         => true,
            'gravityforms_delete_entries'       => true,
            'gravityforms_view_entry_notes'     => true,
            'gravityforms_edit_entry_notes'     => true,
        ];
    }

    /**
     * Get only the keys
     * Used when updating a role
     *
     * @return array
     */
    public function getGravityFormsCaps(): array
    {
        return array_keys($this->getGravityFormsCapsKeyValue());
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
