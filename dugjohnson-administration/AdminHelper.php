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
            $emailSection[] = ['email' => 'KODContestJudgeCoordinator@gmail.com', 'name' => 'Judge Coordinator'];
        }
        // todo: need links to coordinators, not hard code
        if ($published) {
            switch ($category) {
                case 'MA':
                case 'SH':
                case 'NV':
                case 'HI':
                case 'CO':
                case 'PA':
                case 'LO':
                    $emailSection[] = ['email' => 'KODContestPublishedDivision@gmail.com', 'name' => 'Published Coordinator'];

            }
        } else {
            switch ($category) {
                case 'LO':
                case 'SH':
                case 'MA':
                case 'CO':
                case 'HI':
                case 'PA':
                    $emailSection[] = ['email' => 'KODContestUnpublishedDivision@gmail.com', 'name' => 'Unpublished Coordinator'];
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
