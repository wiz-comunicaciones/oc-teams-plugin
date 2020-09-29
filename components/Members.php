<?php namespace Wiz\Teams\Components;

use Cms\Classes\ComponentBase;
use Wiz\Teams\Models\Member as MemberModel;

class Members extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Todos los intengrantes del equipo',
            'description' => 'Muestra todos los intengrantes del equipo.'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->members = $this->page['members'] = $this->loadMembers();
    }

    protected function loadMembers()
    {
        $members = MemberModel::published()
            ->get();
        return $members;
    }

}
