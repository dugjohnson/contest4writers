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
		if ( is_null( $published ) || $category == 'JC' ) {
			return [ 'email' => 'ndjnich@gmail.com', 'name' => 'Nancy Nicholson' ];
		}
		if ( $published ) {
			switch ( $category ) {
				case 'CA':
				case 'HI':
				case 'IN':
					return [ 'email' => 'itraci@hotmail.com', 'name' => 'Traci Andrighetti' ];
				case 'MA':
				case 'PA':
				case 'ST':
					return [ 'email' => 'rkhan@wcc.net', 'name' => 'Rashda Khan' ];
			}
		} else {
			switch ( $category ) {
				case 'ST':
				case 'CA':
					return [ 'email' => 'bgerry2@yahoo.com', 'name' => 'Barbara Gerry' ];
				case 'MA':
					return [ 'email' => 'veronicaforand@gmail.com', 'name' => 'Veronica Forand' ];
				case 'HI':
				case 'IN':
				case 'PA':
					return [ 'email' => 'daphnecontest@gmail.com', 'name' => 'Brooke Wills' ];
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