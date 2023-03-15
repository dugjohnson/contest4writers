<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model {
    use HasFactory;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'entries';

    public function scoresheets(){

        return $this->hasMany(Scoresheet::class);

    }

    public function final_scoresheets(){
        return $this->hasMany(FinalScoresheet::class);
    }

}
