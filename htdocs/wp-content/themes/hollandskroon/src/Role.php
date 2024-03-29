<?php declare(strict_types=1);

class Role
{
    public string $role;

    public function __construct(string $role)
    {
        $this->role = $role;
    }

    public function getRole(): ?object
    {
        return get_role($this->role);
    }

    /**
     * Get key & value pairs.
     * Used when adding a role.
     */
    public function getGravityFormsCapsKeyValue(): array
    {
        return [
            'gravityforms_create_form'          => true,
            'gravityforms_delete_forms'         => true,
            'gravityforms_edit_forms'           => true,
            'gravityforms_preview_forms'        => true,
            'gravityforms_view_entries'         => true,
            'gravityforms_edit_entries'         => true,
            'gravityforms_delete_entries'       => true,
            'gravityforms_view_entry_notes'     => true,
            'gravityforms_edit_entry_notes'     => true,
            'gravityforms_export_entries'       => true,
            'gravityforms_import_entries'       => true,
        ];
    }

    /**
     * Get only the keys.
     * Used when updating a role.
     */
    public function getGravityFormsCaps(): array
    {
        return array_keys($this->getGravityFormsCapsKeyValue());
    }

    public function addRole(string $displayName, array $caps = []): void
    {
        add_role($this->role, $displayName, $caps);
    }

    public function addCap(string $cap): void
    {
        $this->getRole()->add_cap($cap);
    }
}
