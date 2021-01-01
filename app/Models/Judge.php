<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'judges';

    public function hasUpdatedPreferences()
    {
        return ('' <> $this->judgeThisYear);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function judgeName()
    {
        $user = $this->user;
        $judgeName = ($user->firstName . ' ' . $user->lastName);
        return ($judgeName ? $judgeName : 'No Profile');

    }

    public function hasScoresheets(){
        //todo: fix this so it works right
        if ($this->scoresheets()->count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function scoresheets(){
        return $this->hasMany(Scoresheet::class);

    }
}
