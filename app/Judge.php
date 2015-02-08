<?php namespace Contest;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model {

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
        return $this->belongsTo('Contest\User');
    }
    
    public function judgeName() {
        $user = $this->user;
        return ( empty($user->writingName) ? $user->firstName.' '.$user->firstName : $user->writingName );
        
    }

}
