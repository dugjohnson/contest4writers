<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalJudge extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'final_judges';

    public function scoresheets(){
        return $this->hasMany(FinalScoresheet::class, 'final_judge_id');
    }

}
