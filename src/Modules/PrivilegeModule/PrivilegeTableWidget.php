<?php

namespace crocodicstudio\crudbooster\Modules\PrivilegeModule;

use crocodicstudio\crudbooster\Modules\ModuleGenerator\ModulesRepo;

class PrivilegeTableWidget
{
    public $template = 'CbPrivilege::_privileges.table';

    public $cacheLifeTime = 0;

    public function data($roleId)
    {
        $modules = ModulesRepo::getAll(['id', 'name']);

        foreach ($modules as $module) {
            $module->privilege = \DB::table('cms_privileges_roles')->where('id_cms_moduls', $module->id)->where('id_cms_privileges', $roleId)->first() ?: new \stdClass();
        }

        return $modules;
    }
}