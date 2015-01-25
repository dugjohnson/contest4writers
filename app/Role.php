<?php namespace Contest;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    protected $table = 'roles';

    public function user() {
        $this->belongsTo('user','user_id');
    }

}
