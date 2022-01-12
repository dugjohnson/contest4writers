<?php
/**
 * Created by IntelliJ IDEA.
 * User: doug
 * Date: 2/15/2015
 * Time: 7:52 AM
 */

namespace App\Http\Controllers\Helpers;


use App\Models\User;
use Illuminate\Support\Facades\Mail;

trait ScoresheetHelper
{

    public function getLabelList($category, $published)
    {
        $labelList = array();
        $labelList['title'] = 'Entry Title';
        $labelList['category'] = 'Entry Category';
        $labelList['entry_id'] = 'EntryNumber';
        $labelList['judge_id'] = 'Judge Number';
        $labelList['judgeName'] = 'Optional: Judge\'s Name';
        // overridden in published
        $labelList['tiebreaker'] = 'Select one, which will only be added to the total score ONLY in the event of a tiebreaker.';
        $labelList['bonus1'] = 'Was the entry a compelling read?';
        $labelList['bonus2'] = 'Would you like to read the entire book?';
        $labelList['bonus3'] = 'Would you recommend this book to a friend if it were published?';

        if ($published) {
            $labelList['bonus1'] = 'Is the entry a compelling read?';
            $labelList['bonus2'] = 'Would you buy this book?';
            $labelList['bonus3'] = 'Would you recommend this book to a friend?';

            $labelList['score01'] = 'Opening hook: is it a real attention grabber?';
            $labelList['score02'] = 'Opening pages: does the author reveal the right amount of information, not too much or too little, to compel you to read on?';
            $labelList['score03'] = 'Is the story original and well-executed?';
            $labelList['score04'] = 'Is the pacing appropriate to this category?';
            $labelList['score05'] = 'Are the characters appropriate to the storyline?';
            $labelList['score06'] = 'Are the characters skillfully developed?';
            $labelList['score07'] = 'Is the author\'s voice/style unique or fresh?';
            $labelList['score08'] = 'Is POV always clear?';
            $labelList['score09'] = 'Is there a good balance between dialogue and narrative?';
            $labelList['score10'] = 'Does the dialogue progress the story and help build the suspense?';
            $labelList['score11'] = 'Does the narrative progress the story and help build the suspense?';
            $labelList['score12'] = 'Does the dialogue ring true (normal and conversational, not too stiff and unnatural)?';
            $labelList['score13'] = 'Does the conflict arise naturally from the situation (is not forced)? ';
            $labelList['score14'] = 'Does the setting enhance the story (it\'s not intrusive)?';
            $labelList['score15'] = 'Are there enough twists and turns to keep the reader guessing? ';
            $labelList['score16'] = 'Is the ending believable?';
            $labelList['score17'] = 'Does the ending tie up all the loose ends?';
            $labelList['score18'] = '';
            $labelList['score19'] = '';
            $labelList['score20'] = '';
            $labelList['score21'] = '';
            $labelList['score22'] = '';
            $labelList['score23'] = '';
            $labelList['score24'] = '';
            $labelList['score25'] = '';
            $labelList['tiebreaker'] = 'Select one statement that best describes this particular entry compared to the others you have read in the category';


        } else {
            switch ($category) {
                case 'SH':
                    $labelList['score01'] = 'Does the hook pull you into the story?';
                    $labelList['score02'] = 'Does the author reveal the right amount of information, not too much or too little?';
                    $labelList['score03'] = 'Is there an idea/foreshadow of the mystery/suspense to come in the opening pages?';
                    $labelList['score04'] = 'Is the plot original and well-executed?';
                    $labelList['score05'] = 'Does the plot have the potential to sustain an entire book in short romance?';
                    $labelList['score06'] = 'Is the pacing appropriate to short romantic suspense?';
                    $labelList['score07'] = 'Are the characters skillfully developed?';
                    $labelList['score08'] = 'Are the characters appropriate to the plot?';
                    $labelList['score09'] = 'Do you get a sense of the hero/heroine\'s physical characteristics?';
                    $labelList['score10'] = 'Do you get a sense of the hero/heroine\'s personality?';
                    $labelList['score11'] = 'Is there sexual chemistry between the hero and heroine?';
                    $labelList['score12'] = 'Do the main characters come together in a timely fashion?';
                    $labelList['score13'] = 'Do the main characters come together in a way that is appropriate to the story?';
                    $labelList['score14'] = 'Is the conflict between the main characters appropriate to short romance?';
                    $labelList['score15'] = 'Is there a good balance between dialogue and narrative?';
                    $labelList['score16'] = 'Does the dialogue progress the story and help build the suspense?';
                    $labelList['score17'] = 'Does the narrative progress the story and help build the suspense?';
                    $labelList['score18'] = 'Does the dialogue ring true (normal and conversational, not too stiff and unnatural)?';
                    $labelList['score19'] = 'Does the setting give a sense of time and place and set the mood of the story?';
                    $labelList['score20'] = 'Is the setting interwoven into the plot and does it enhance the story rather than pull the reader from it?';
                    $labelList['score21'] = 'Is the POV clear at all times?';
                    $labelList['score22'] = 'Is the writing vivid and evocative? Does it have a certain spark that keeps you reading?';
                    $labelList['score23'] = 'Are sentence structure and length varied?';
                    $labelList['score24'] = 'Is the entry free of typos and errors in spelling, grammar, and punctuation?';
                    $labelList['score25'] = '';

                    break;
                case 'HI':
                    $labelList['score01'] = 'Does the hook pull you into the story?';
                    $labelList['score02'] = 'Does the author reveal the right amount of information, not too much or too little?';
                    $labelList['score03'] = 'Is there an idea/foreshadow of the mystery/suspense to come in the opening pages?';
                    $labelList['score04'] = 'Is the plot original and well-executed?';
                    $labelList['score05'] = 'Does the plot have the potential to sustain an entire book in historical romance?';
                    $labelList['score06'] = 'Is the pacing appropriate to historical romantic suspense?';
                    $labelList['score07'] = 'Are the characters skillfully developed?';
                    $labelList['score08'] = 'Are the characters appropriate to the plot?';
                    $labelList['score09'] = 'Are the characters at home in their time, or are there 21st century "drop-ins" with 21st century agendas?';
                    $labelList['score10'] = 'In the opening pages, is there an idea or foreshadow of the relationship to come?';
                    $labelList['score11'] = 'Are the characters\' actions and reactions believable?';
                    $labelList['score12'] = 'Are there any glaring anachronisms that would jolt the reader out of the story?';
                    $labelList['score13'] = 'Does the aspect of mystery/suspense blend with the romantic historical theme?';
                    $labelList['score14'] = 'Do the historical elements draw you into the overall setting?';
                    $labelList['score15'] = 'Does the dialogue ring true for the period (normal and conversational, not too stiff and unnatural)?';
                    $labelList['score16'] = 'Is there a good balance between dialogue and narrative?';
                    $labelList['score17'] = 'Does the dialogue progress the story and help build the suspense?';
                    $labelList['score18'] = 'Does the setting give a sense of time and place and set the mood of the story?';
                    $labelList['score19'] = 'Is the setting interwoven into the plot and does it enhance the story rather than pull the reader from it?';
                    $labelList['score20'] = 'Are the details significant to the story? Do they move the plot along?';
                    $labelList['score21'] = 'Is the POV clear at all times?';
                    $labelList['score22'] = 'Is the writing vivid and evocative? Does it have a certain spark that keeps you reading?';
                    $labelList['score23'] = 'Are sentence structure and length varied?';
                    $labelList['score24'] = 'Is the entry free of typos and errors in spelling, grammar, and punctuation?';
                    $labelList['score25'] = '';

                    break;
                case 'PA':
                    $labelList['score01'] = 'Does the hook pull you into the story?';
                    $labelList['score02'] = 'Does the author reveal the right amount of information, not too much or too little?';
                    $labelList['score03'] = 'Is there an idea/foreshadow of the mystery/suspense to come in the opening pages?';
                    $labelList['score04'] = 'Is the plot original and well-executed?';
                    $labelList['score05'] = 'Does the plot have the potential to sustain an entire book in paranormal romance?';
                    $labelList['score06'] = 'Is the pacing appropriate to paranormal romantic suspense?';
                    $labelList['score07'] = 'Are the characters skillfully developed?';
                    $labelList['score08'] = 'Are the characters appropriate to the plot?';
                    $labelList['score09'] = 'Is the mythology or tradition surrounding the characters logical, or is there an explanation why it\'s not? (For example, genies live in bottles, vampires stay out of the sun, etc.)';
                    $labelList['score10'] = 'In the opening pages, is there an idea or foreshadowing of the romantic relationship to come?';
                    $labelList['score11'] = 'Are the characters\' actions and reactions believable?';
                    $labelList['score12'] = 'Is the paranormal element integral to the story (in other words, it can\'t be taken out without the story falling apart)?';
                    $labelList['score13'] = 'Are the paranormal aspects blended with the romantic mystery/suspense theme?';
                    $labelList['score14'] = 'Is the author\'s concept of world building believable?';
                    $labelList['score15'] = 'Does the dialogue ring true of the theme?';
                    $labelList['score16'] = 'Is there a good balance between dialogue and narrative?';
                    $labelList['score17'] = 'Do the dialogue and the narrative progress the story and help build the suspense?';
                    $labelList['score18'] = 'Does the setting give a sense of time and place and set the mood of the story?';
                    $labelList['score19'] = 'Is the setting interwoven into the plot and does it enhance the story rather than pull the reader from it?';
                    $labelList['score20'] = 'Are the details significant to the story? Do they move the plot along?';
                    $labelList['score21'] = 'Is the POV clear at all times?';
                    $labelList['score22'] = 'Is the writing vivid and evocative? Does it have a certain spark that keeps you reading?';
                    $labelList['score23'] = 'Are sentence structure and length varied?';
                    $labelList['score24'] = 'Is the entry free of typos and errors in spelling, grammar, and punctuation?';
                    $labelList['score25'] = '';

                    break;
                case 'LO':
                    $labelList['score01'] = 'Does the hook pull you into the story?';
                    $labelList['score02'] = 'Does the author reveal the right amount of information, not too much or too little?';
                    $labelList['score03'] = 'Is there an idea/foreshadow of the mystery/suspense to come in the opening pages?';
                    $labelList['score04'] = 'Is the plot original and well-executed?';
                    $labelList['score05'] = 'Does the plot have the potential to sustain an entire book in long mystery/suspense?';
                    $labelList['score06'] = 'Is the pacing appropriate to long romantic suspense?';
                    $labelList['score07'] = 'Are the characters skillfully developed?';
                    $labelList['score08'] = 'Are the characters appropriate to the plot?';
                    $labelList['score09'] = 'Are the characters\' actions and reactions believable?';
                    $labelList['score10'] = 'Is the external conflict evident?';
                    $labelList['score11'] = 'Is the premise on which the story is created solid enough to build the story to its ultimate climax?';
                    $labelList['score12'] = 'Is the hero and/or heroine introduced into the story in a timely manner?';
                    $labelList['score13'] = 'Is the hero and/or heroine introduced in a way that makes you want to read more?';
                    $labelList['score14'] = 'Is there a good balance between dialogue and narrative?';
                    $labelList['score15'] = 'Does the dialogue progress the story and help build the suspense?';
                    $labelList['score16'] = 'Does the narrative progress the story and help build the suspense?';
                    $labelList['score17'] = 'Does the dialogue ring true (normal and conversational, not too stiff and unnatural)?';
                    $labelList['score18'] = 'Does the setting give a sense of time and place and set the mood of the story?';
                    $labelList['score19'] = 'Is the setting interwoven into the plot and does it enhance the story rather than pull the reader from it?';
                    $labelList['score20'] = 'Are the details significant to the story? Do they move the plot along?';
                    $labelList['score21'] = 'Is the POV clear at all times?';
                    $labelList['score22'] = 'Is the writing vivid and evocative? Does it have a certain spark that keeps you reading?';
                    $labelList['score23'] = 'Are sentence structure and length varied?';
                    $labelList['score24'] = 'Is the entry free of typos and errors in spelling, grammar, and punctuation?';
                    $labelList['score25'] = '';

                    break;
                case 'MA':
                    $labelList['score01'] = 'Does the hook pull you into the story?';
                    $labelList['score02'] = 'Does the author reveal the right amount of information, not too much or too little?';
                    $labelList['score03'] = 'In the opening pages, is there an idea/foreshadow of the mystery/suspense to come?';
                    $labelList['score04'] = 'Is the plot original and well-executed?';
                    $labelList['score05'] = 'Does the plot have the potential to sustain an entire book in mainstream mystery/suspense?';
                    $labelList['score06'] = 'Is the pacing appropriate to mainstream mystery/suspense?';
                    $labelList['score07'] = 'Are the characters skillfully developed?';
                    $labelList['score08'] = 'Are the characters appropriate to the plot?';
                    $labelList['score09'] = 'Are the characters\' actions and reactions believable?';
                    $labelList['score10'] = 'Is the external conflict evident?';
                    $labelList['score11'] = 'Is the premise on which the story is created solid enough to build the story to its ultimate climax?';
                    $labelList['score12'] = 'Is at least one protagonist introduced into the story in a timely manner?';
                    $labelList['score13'] = 'Is at least one protagonist introduced in a way that makes you want to read more?';
                    $labelList['score14'] = 'Is there a good balance between dialogue and narrative?';
                    $labelList['score15'] = 'Does the dialogue progress the story and help build the suspense?';
                    $labelList['score16'] = 'Does the narrative progress the story and help build the suspense?';
                    $labelList['score17'] = 'Does the dialogue ring true (normal and conversational, not too stiff and unnatural)?';
                    $labelList['score18'] = 'Does the setting give a sense of time and place and set the mood of the story?';
                    $labelList['score19'] = 'Is the setting interwoven into the plot and does it enhance the story rather than pull the reader from it?';
                    $labelList['score20'] = 'Are the details significant to the story? Do they move the plot along?';
                    $labelList['score21'] = 'Is the POV clear at all times?';
                    $labelList['score22'] = 'Is the writing vivid and evocative? Does it have a certain spark that keeps you reading?';
                    $labelList['score23'] = 'Are sentence structure and length varied?';
                    $labelList['score24'] = 'Is the entry free of typos and errors in spelling, grammar, and punctuation?';
                    $labelList['score25'] = '';

                    break;
                case 'IN':
                    $labelList['score01'] = 'Does the hook pull you into the story?';
                    $labelList['score02'] = 'Does the author reveal the right amount of information, not too much or too little?';
                    $labelList['score03'] = 'Is there an idea/foreshadow of the mystery/suspense to come in the opening pages?';
                    $labelList['score04'] = 'Is the plot original and well-executed?';
                    $labelList['score05'] = 'Does the plot have the potential to sustain an entire book in spiritual romance?';
                    $labelList['score06'] = 'Is the pacing appropriate to spiritual romantic suspense?';
                    $labelList['score07'] = 'Are the characters skillfully developed?';
                    $labelList['score08'] = 'Are the characters appropriate to the plot?';
                    $labelList['score09'] = 'Do you get a sense of the hero/heroine\'s values, belief system or lack thereof?';
                    $labelList['score10'] = 'Is there chemistry between the hero and heroine?';
                    $labelList['score11'] = 'Is the spiritual element evident?';
                    $labelList['score12'] = 'Is the premise on which the story is created solid enough to build the story to its ultimate climax?';
                    $labelList['score13'] = 'Is the story presented in a manner that is uplifting, yet not condescending or preachy?';
                    $labelList['score14'] = 'Is there a good balance between dialogue and narrative?';
                    $labelList['score15'] = 'Does the dialogue progress the story and help build the suspense?';
                    $labelList['score16'] = 'Does the narrative progress the story and help build the suspense?';
                    $labelList['score17'] = 'Does the dialogue ring true (normal and conversational, not too stiff and unnatural)?';
                    $labelList['score18'] = 'Does the setting give a sense of time and place and set the mood of the story?';
                    $labelList['score19'] = 'Is the setting interwoven into the plot and does it enhance the story rather than pull the reader from it?';
                    $labelList['score20'] = 'Are the details significant to the story? Do they move the plot along?';
                    $labelList['score21'] = 'Is the POV clear at all times?';
                    $labelList['score22'] = 'Is the writing vivid and evocative? Does it have a certain spark that keeps you reading?';
                    $labelList['score23'] = 'Are sentence structure and length varied?';
                    $labelList['score24'] = 'Is the entry free of typos and errors in spelling, grammar, and punctuation?';
                    $labelList['score25'] = '';

                    break;
            }

        }
        return $labelList;

    }

    public function tieBreakerList($published)
    {
        if ($published) {
            return array(
                '0' => '-- Select a tie breaker --',
                '10' => 'An excellent book; one of the best I\'ve read lately',
                '9' => 'This book is superb; masterfully written ',
                '8' => 'A wonderful read',
                '7' => 'An entertaining read ',
                '6' => 'Well done ',
                '5' => 'Somewhat enjoyable ',
                '4' => 'Some good moments ',
                '3' => 'A struggle to complete the reading ',
                '2' => 'Not compelling ',
                '1' => 'Entered in the wrong category '
            );

        } else {
            return array(
                '0' => '-- Select a tie breaker --',
                '6' => 'This manuscript is superb - masterfully done ',
                '5' => 'A wonderful read',
                '4' => 'An entertaining read ',
                '3' => 'Well done ',
                '2' => 'Somewhat enjoyable ',
                '1' => 'Some good moments ',
            );

        }


    }

    public function sendJudgeConfirmation($scoresheet)
    {
        $templateToUse = 'scoresheets.emails.judged';

        $user = User::find($scoresheet->judge->user_id);
        $ccEmails = Array();
        $this->addAdminEmail($ccEmails,'JC');
        $this->addAdminEmail($ccEmails,'OC');
        $this->addAdminEmail($ccEmails, $scoresheet->category, $scoresheet->published);
        $ccEmails[] = ['email' => 'doug@asknice.com', 'name' => 'Webmaster'];
        $labelList = $this->getLabelList($scoresheet->category, $scoresheet->published);
        $tieBreakerList = $this->tieBreakerList($scoresheet->published);

        Mail::send($templateToUse, array('user' => $user, 'scoresheet' => $scoresheet, 'label' => $labelList, 'tieBreakerList' => $tieBreakerList, 'categories' =>$this->categories()), function ($message) use ($scoresheet, $user, $ccEmails) {
            $message->to($user->email, $user->writingName)->subject('Daphne score sheet judged for ' . $scoresheet->title);
            foreach ($ccEmails as $email) {
                $message->cc($email['email'], $email['name']);
            }

        });
    }


}
