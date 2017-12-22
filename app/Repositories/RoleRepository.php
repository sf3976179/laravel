<?php

namespace App\Repositories;

use App\Models\Role;
use Hash;

class RoleRepository extends BaseRepository
{
    protected $baseModel;
    protected $company;

    public function __construct(Role $role)
    {
        $this->constructParam = func_get_args();
        $this->role = $role;
        $this->baseModel = $this->role;
        $this->baseParam = ['id', 'name', 'display_name', 'description'];
        $this->baseTransformer = 'role';
    }
}