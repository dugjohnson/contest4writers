<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scoresheet extends Model
{

    protected $table = 'scoresheets';

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }

    public function judge()
    {
        return $this->belongsTo(Judge::class);

    }

    private function getEmptyScores()
    {
        $empties = array();
        for ($i = 1; $i < 26; $i++) {
            $empties['score'.($i<10?'0'.$i:$i)] = 0;
        }
        for ($i = 1; $i < 4; $i++) {
            $empties['bonus'.$i] = 0;
        }
        return $empties;
    }

    private function getEmptyComments()
    {
        $empties = array();
        for ($i = 1; $i < 26; $i++) {
            $empties['comment'.($i<10?'0'.$i:$i)] = '';
        }
        $empties['commentFinal'] = '';

        return $empties;
    }

    public function getBlankScoresheetData($entryID)
    {

        return Array(
            'entryID' => $entryID,
            'finalScore' => 0,
            'completed' => false,
            'sheet' => array(
                'scores' => $this->getEmptyScores(),
                'comments' => $this->getEmptyComments(),
                'tiebreaker' => 0,
                'judgeName' => '',
            )
        );

    }

    //todo: run through the permutations to make sure we don't overwrite good scoresheet with none

    public function getScoresheetData()
    {
        if (strlen($this->scoresheetData)>0) {
            return json_decode($this->scoresheetData);

        } else {
            return false;

        }
    }

    //todo: needs to use underlying model functions, probably

    public function setScoresheetData()
    {
//            $this->scoresheetData =  json_encode($this->scoresheet);
    }

}
