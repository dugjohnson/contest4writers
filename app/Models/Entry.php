<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'entries';

    public function scoresheets(){
    use HasFactory;

        return $this->hasMany(Scoresheet::class);

    }

    public function final_scoresheets(){
        return $this->hasMany(FinalScoresheet::class);
    }

}
