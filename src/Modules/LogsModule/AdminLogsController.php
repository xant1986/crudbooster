<?php

namespace crocodicstudio\crudbooster\Modules\LogsModule;

use crocodicstudio\crudbooster\CBCoreModule\Hooks;
use crocodicstudio\crudbooster\controllers\CBController;

class AdminLogsController extends CBController
{
    use Hooks;
    public function cbInit()
    {
        $this->table = 'cms_logs';
        $this->titleField = 'ipaddress';

        $this->setButtons();
        $this->makeColumns();

        $this->form = LogsForm::makeForm();
    }

    private function makeColumns()
    {
        $this->col = [
            ['label' => 'Time Access', 'name' => 'created_at'],
            ['label' => 'IP Address', 'name' => 'ipaddress'],
            ['label' => 'User', 'name' => 'id_cms_users', 'join' => 'cms_users,name'],
            ['label' => 'Description', 'name' => 'description'],
        ];
    }

    private function setButtons()
    {
        $this->buttonBulkAction = true;
        $this->buttonExport = false;
        $this->buttonImport = false;
        $this->buttonAdd = false;
        $this->buttonEdit = false;
        $this->deleteBtn = true;
    }
}
