<?php
/**
 * Created by PhpStorm.
 * User: doug
 * Date: 2/1/2015
 * Time: 7:48 AM
 */

namespace Contest\Http\Controllers\Helpers;


trait JudgeHelper {

    public $preferenceLevels = ['4'=>'Top choice', '3'=>'Love to judge','2'=>'Would judge if asked','1'=>'Would judge in an emergency','0'=>'Will not judge'];
    public $judgeThisYear = [''=>'Please indicate your participation this year','LJ'=>'I would love to judge this year', 'NY'=>'Ask me next year','EJ'=>'Use me in an emergency','RM'=>'Please remove me from judging list'];
    
    public function judgeFormData($judge){
       return array('judge' => $judge,'preferenceLevels'=>$this->preferenceLevels,'judgeThisYear'=>$this->judgeThisYear,'isCoordinator'=>$this->isCoordinator);
        
    }

}