<?php namespace Contest;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'entries';
    
    public function scoresheets(){
        return $this->hasMany('Contest\Scoresheet');
        
    }

}
