<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email',
        'password',
    ];
    protected $rolesList = null;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected function hasRoles()
    {
        if (is_null($this->rolesList)) {
            $this->rolesList = Role::where('user_id', '=', $this->id)->get();
        }
        return count($this->rolesList) > 0;
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
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
        return $this->hasOne(Judge::class);
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
        return $this->hasMany(Role::class, 'user_id');
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
