<?php
/**
 * Created by IntelliJ IDEA.
 * User: doug
 * Date: 1/18/2015
 * Time: 11:59 AM
 */

namespace Contest\Http\Controllers\Helpers;

trait AdminHelper {
	public function getAdminEmail( $category, $published = null ) {

		if ( $category == 'OC' ) {
			return [ 'email' => 'daphnecontest@gmail.com', 'name' => 'Brooke Wills' ];

		}
		if ( $category == 'JC' ) {
			// todo: need link to judge coordinator records in roles, so not hard coded
			return [ 'email' => 'jengraybeal@gmail.com', 'name' => 'Jen Graybeal' ];
		}
		// todo: need links to coordinators, not hard code
		if ( $published ) {
			switch ( $category ) {
				case 'CA':
				case 'HI':
				case 'IN':
					return [ 'email' => 'itraci@hotmail.com', 'name' => 'Traci Andrighetti' ];
				case 'MA':
				case 'PA':
				case 'ST':
					return [ 'email' => 'daphnecontest@gmail.com', 'name' => 'Brooke Wills' ];
			}
		} else {
			switch ( $category ) {
				case 'ST':
				case 'CA':
					return [ 'email' => 'daphnestc@gmail.com', 'name' => 'Cathy Perkins' ];
				case 'MA':
					return [ 'email' => 'veronicaforand@gmail.com', 'name' => 'Veronica Forand' ];
				case 'HI':
				case 'IN':
				case 'PA':
					return [ 'email' => 'marneejo@hotmail.com', 'name' => 'Marnee Blake' ];
			}
		}

	}

	public function getRolesWhereClause( $adminPerson, $tableName = '' ) {
		$alias = ( empty( $tableName ) ? '' : $tableName . '.' );
		$roles = $adminPerson->getRoles();
		$whereStatement = '';
		foreach ( $roles as $role ) {
			if ( empty( $role->category ) ) {
				continue;
			}
			if ( strlen( $whereStatement ) > 0 ) {
				$whereStatement .= ' OR ';

			}
			$whereStatement .= " ( '$role->category' = ".$alias."category and $role->published = ".$alias."published) ";
		}
		if ( strlen( $whereStatement ) == 0 ) {
			$whereStatement = 'true';

		}
		return $whereStatement;
	}

}