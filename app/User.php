<?php namespace Contest;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $rolesList = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected function hasRoles()
    {
        if (is_null($this->rolesList)) {
            $this->rolesList = Role::where('user_id', '=', $this->id)->get();
        }
        return count($this->rolesList) > 0;
    }

    public function entries()
    {
        return $this->hasMany('Contest\Entry');
    }

    public function isEntrant()
    {
        if ($this->entries()->count()>0) {
            //todo: Add in check for as author, not entrant
            return true;
        }
        return false;

    }

    public function judge()
    {
        return $this->hasOne('Contest\Judge');
    }

    public function isJudge()
    {
        if ($this->judge) {
            return true;

        }
        return false;

    }


    public function roles()
    {
        return $this->hasMany('Contest\Role', 'user_id');
    }

    public function getRoles()
    {
        if (!$this->hasRoles()) {
            return null;
        };
        return $this->rolesList;
    }

    public function hasFilledInProfile()
    {
        return ('' <> $this->lastName);

    }

    public function hasAccessTo($category, $published)
    {
        $hasAccess = false;
        if (!$this->hasRoles()) {
            return $hasAccess;
        };
        foreach ($this->rolesList as $role) {
            if (('OC' == $role->role) || ('JC' == $role->role) || ('CC' == $role->role && $category == $role->category && $published == $role->published)) {
                $hasAccess = true;
                break;
            }
        }
        return $hasAccess;

    }

    public function isCoordinator()
    {
        return ($this->isAdministrator() or $this->hasRole());

    }

    public function isAdministrator()
    {
        return ($this->hasRole('OC') || $this->hasRole('JC'));

    }

    public function hasRole($type = 'CC')
    {
        $hasAccess = false;
        if (!$this->hasRoles()) {
            return $hasAccess;
        };
        foreach ($this->rolesList as $role) {
            if ($type == $role->role) {
                $hasAccess = true;
                break;
            }
        }
        return $hasAccess;

    }

}
