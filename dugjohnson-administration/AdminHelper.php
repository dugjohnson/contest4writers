<?php
/**
 * Created by IntelliJ IDEA.
 * User: doug
 * Date: 1/18/2015
 * Time: 11:59 AM
 */

namespace Dugjohnson\Administration;

trait AdminHelper
{
    public function addAdminEmail(&$emailSection, $category, $published = null)
    {

        if ($category == 'OC') {
            $emailSection[] = ['email' => 'daphnecontest@gmail.com', 'name' => 'Brooke Wills'];

        }
        if ($category == 'JC') {
            // todo: need link to judge coordinator records in roles, so not hard coded
            $emailSection[] = ['email' => 'jengraybeal@gmail.com', 'name' => 'Jen Graybeal'];
            $emailSection[] = ['email' => 'kodmollykw@gmail.com', 'name' => 'Molly Williams'];
        }
        // todo: need links to coordinators, not hard code
        if ($published) {
            switch ($category) {
                case 'MA':
                case 'SH':
                case 'IN':
                    $emailSection[] = ['email' => 'eliz.sade@gmail.com', 'name' => 'Elizabeth Sade'];
                case 'HI':
                case 'PA':
                case 'LO':
                    $emailSection[] = ['email' => 'everin23@gmail.com', 'name' => 'Erin Novotny'];
            }
        } else {
            switch ($category) {
                case 'LO':
                case 'SH':
                    $emailSection[] = ['email' => 'lesliekod@gmail.com', 'name' => 'Leslie Scott'];
                case 'MA':
                    $emailSection[] = ['email' => 'veronicaforand@gmail.com', 'name' => 'Veronica Forand'];
                case 'HI':
                case 'IN':
                case 'PA':
                    $emailSection[] = ['email' => 'contact.jackirenee@gmail.com', 'name' => 'Jacki Renée'];
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
