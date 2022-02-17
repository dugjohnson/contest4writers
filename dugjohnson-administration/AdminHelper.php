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
            $emailSection[] = ['email' => 'kcr2696439@aol.com', 'name' => 'Kathy Crouch'];
        }
        // todo: need links to coordinators, not hard code
        if ($published) {
            switch ($category) {
                case 'MA':
                case 'SH':
                case 'IN':
                case 'HI':
                case 'PA':
                case 'LO':
                    $emailSection[] = ['email' => 'kimberly.pride@gmail.com', 'name' => 'Kim Pride'];
                    $emailSection[] = ['email' => 'erin.novotny@comcast.net', 'name' => 'Erin Novotny'];

            }
        } else {
            switch ($category) {
                case 'LO':
                case 'SH':
                case 'MA':
                case 'HI':
                case 'IN':
                case 'PA':
                    $emailSection[] = ['email' => 'erin.novotny@comcast.net', 'name' => 'Erin Novotny'];
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
