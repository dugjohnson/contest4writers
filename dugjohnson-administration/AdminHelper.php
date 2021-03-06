<?php

namespace Dugjohnson\Administration;

trait AdminHelper
{
    public function addAdminEmail(&$emailSection, $category, $published = null)
    {

        if ($category == 'OC') {
            $emailSection[] = ['email' => 'kodcontest@gmail.com', 'name' => 'Daphne Committee'];

        }
        if ($category == 'JC') {
            // todo: need link to judge coordinator records in roles, so not hard coded
            $emailSection[] = ['email' => 'jengraybeal@gmail.com', 'name' => 'Jen Graybeal'];
        }
        // todo: need links to coordinators, not hard code
        if ($published) {
            switch ($category) {
                case 'MA':
                case 'SH':
                case 'IN':
                    $emailSection[] = ['email' => 'raimeygallant@gmail.com', 'name' => 'Raimey Gallant'];
                case 'HI':
                case 'PA':
                case 'LO':
                    $emailSection[] = ['email' => 'erin.novotny@comcast.net', 'name' => 'Erin Novotny'];
            }
        } else {
            switch ($category) {
                case 'LO':
                case 'SH':
                    $emailSection[] = ['email' => 'candico@att.net', 'name' => 'Leslie Scott'];
                case 'MA':
                    $emailSection[] = ['email' => 'contact.jackirenee@gmail.com', 'name' => 'Jackie Renee'];
                case 'HI':
                case 'IN':
                case 'PA':
                    $emailSection[] = ['email' => 'lyndareesauthor@gmail.com', 'name' => 'Lynda Rees'];
            }
        }

    }

    public function getRolesWhereClause($adminPerson, $tableName = '')
    {
        $alias = (empty($tableName) ? '' : $tableName . '.');
        $roles = $adminPerson->getRoles();
        $whereStatement = '';
        foreach ($roles as $role) {
            if (empty($role->category)) {
                continue;
            }
            if (strlen($whereStatement) > 0) {
                $whereStatement .= ' OR ';

            }
            $whereStatement .= " ( '$role->category' = " . $alias . "category and $role->published = " . $alias . "published) ";
        }
        if (strlen($whereStatement) == 0) {
            $whereStatement = 'true';

        }
        return $whereStatement;
    }

}
