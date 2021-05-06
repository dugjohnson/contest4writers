<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalScoresheet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'final_scoresheets';

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }
    public function judge()
    {
        return $this->belongsTo(FinalJudge::class,'final_judge_id');

    }
}
