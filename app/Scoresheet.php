<?php namespace Contest;

use Illuminate\Database\Eloquent\Model;

class Scoresheet extends Model
{

    protected $table = 'scoresheets';
    
    public function entries(){
        $this->belongsTo('Contest\Entry');
    }

    public function judges(){
        $this->belongsTo('Contest\Judge');

    }

    private function getEmptyScores(){
        $empties = array();
        for ($i=1;$i<26;$i++){
            $empties[$i] = 0;
        }
    }
    private function getEmptyComments(){
        $empties = array();
        for ($i=1;$i<26;$i++){
            $empties[$i] = '';
        }
    }

    public function getBlankScoresheetData()
    {

        return Array(
            'entryID' => 0,
            'assignmentID' => 0,
            'finalScore' => 0,
            'completed' => false,
            'sheet' => array(
                'scores'=>$this->getEmptyScores(),
                'comments'=>$this->getEmptyComments(),
            )
        );

    }

}
