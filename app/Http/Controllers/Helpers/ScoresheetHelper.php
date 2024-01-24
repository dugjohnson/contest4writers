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
        $labelList['score01'] = 'Opening hook: is it a real attention grabber?';
        $labelList['score02'] = 'Opening pages: does the author reveal the right amount of information, not too much or too little, to compel you to read on?';
        $labelList['score03'] = 'Is the story original and well-executed?';
        $labelList['score04'] = 'Is the pacing appropriate to the category?';
        $labelList['score05'] = 'Does the conflict arise naturally from the situation (is not forced)?';
        $labelList['score06'] = 'Does the author effectively create a suspenseful atmosphere throughout? ';
        $labelList['score07'] = 'Are the characters skillfully developed?';
        $labelList['score08'] = 'Are the characters\' back stories shared in an effective and meaningful way?';
        $labelList['score09'] = 'Do the internal and external conflicts the characters face drive the story forward to a satisfying conclusion?';
        $labelList['score10'] = 'Does the setting give a sense of time and place and set the mood of the story? ';
        $labelList['score11'] = 'Is the setting interwoven into the plot and does it enhance the story rather than pull the reader from it? ';
        $labelList['score12'] = 'Are the details significant to the story? Do they move the plot along? ';
        $labelList['score13'] = 'Is the writing vivid and evocative? Does it have a certain spark that keeps you reading?';
        $labelList['score14'] = 'Are sentence structure and length varied? ';
        $labelList['score15'] = 'Is the entry free of typos and errors in spelling, grammar, and punctuation?';
        $labelList['score16'] = 'Is there a good balance between dialogue and narrative?';
        $labelList['score17'] = 'Does the dialogue ring true (normal and conversational, not too stiff and unnatural)?';
        $labelList['score21'] = '';
        $labelList['score22'] = '';
        $labelList['score23'] = '';
        $labelList['score24'] = '';
        $labelList['score25'] = '';
        $labelList['UnpubExtra'] = '';

        if ($published) {
            $labelList['bonus1'] = 'Is the entry a compelling read?';
            $labelList['bonus2'] = 'Would you buy this book?';
            $labelList['bonus3'] = 'Would you recommend this book to a friend?';
            $labelList['score18'] = 'Are there enough twists and turns to keep the reader guessing?';
            $labelList['score19'] = 'Is the ending believable?';
            $labelList['score20'] = 'Does the ending tie up all the loose ends?';
            $labelList['tiebreaker'] = 'Select one statement that best describes this particular entry compared to the others you have read in the category';

        } else {
            switch ($category) {
                case 'SH':
                    $labelList['UnpubExtra'] = 'SHORT';
                    $labelList['score18'] = 'Are the main characters introduced to the reader with an appropriate amount of foreshadowing of the relationship that will develop?';
                    $labelList['score19'] = 'Is this entry successful at maintaining a delicate balance between focusing on the mystery/suspense elements of the story and the relationship between the main characters?';
                    $labelList['score20'] = 'Does the author use tropes effectively while putting a fresh spin on them?';
                    break;
                case 'HI':
                    $labelList['UnpubExtra'] = 'HISTORICAL';
                    $labelList['score18'] = 'Are the main characters introduced to the reader with an appropriate amount of foreshadowing of the relationship that will develop?';
                    $labelList['score19'] = 'Do the mystery and suspense elements of the story feel grounded in the historical time period?';
                    $labelList['score20'] = 'Does the author balance historical details with fictional story elements to create an engaging story?';
                    break;
                case 'PA':
                    $labelList['UnpubExtra'] = 'PARANORMAL';
                    $labelList['score18'] = 'Are the main characters introduced to the reader with an appropriate amount of foreshadowing of the relationship that will develop?';
                    $labelList['score19'] = 'Are the speculative attributes of the characters (magic, origin, abilities, etc.) presented in a way that makes them feel real and believable?';
                    $labelList['score20'] = 'Do the speculative elements of the world the characters inhabit feel real and believable?';
                    break;
                case 'LO':
                    $labelList['UnpubExtra'] = 'LONG';
                    $labelList['score18'] = 'Is the premise solid enough to sustain the story through to the end?';
                    $labelList['score19'] = 'Are the main characters introduced to the reader with an appropriate amount of foreshadowing of the relationship that will develop?';
                    $labelList['score20'] = 'Does the author use tropes effectively while putting a fresh spin on them?';
                    break;
                case 'MA':
                    $labelList['UnpubExtra'] = 'MAINSTREAM';
                    $labelList['score18'] = 'Is there an atmosphere of suspense and/or curiosity about the central puzzle/conflict that creates a desire to read further?';
                    $labelList['score19'] = 'Is there sufficient concern for the protagonist(s) as they investigate and attempt to find a resolution?';
                    $labelList['score20'] = 'Are there sufficient twists and turns, red herrings and real clues to keep the reader guessing?';
                    break;
                case 'CO':
                    $labelList['UnpubExtra'] = 'COZY';
                    $labelList['score18'] = 'Is there an atmosphere of suspense and/or curiosity about the central puzzle/conflict that creates a desire to read further?';
                    $labelList['score19'] = 'Is there sufficient concern for the protagonist(s) as they investigate and attempt to find a resolution?';
                    $labelList['score20'] = 'Are there sufficient twists and turns, red herrings and real clues to keep the reader guessing?';
                    break;
            }

        }
        return $labelList;

    }

    public function tieBreakerList($published)
    {
        return array(
            '0' => '-- Select a tie breaker --',
            '5' => 'An excellent book; one of the best I\'ve read lately',
            '4' => 'A wonderful read',
            '3' => 'Well done ',
            '2' => 'Some good moments ',
            '1' => 'A struggle to complete the reading ',
        );
    }

    public function sendJudgeConfirmation($scoresheet)
    {
        $templateToUse = 'scoresheets.emails.judged';

        $user = User::find($scoresheet->judge->user_id);
        $ccEmails = array();
        $this->addAdminEmail($ccEmails, 'JC');
        $this->addAdminEmail($ccEmails, 'OC');
        $this->addAdminEmail($ccEmails, $scoresheet->category, $scoresheet->published);
        $ccEmails[] = ['email' => 'doug@asknice.com', 'name' => 'Webmaster'];
        $labelList = $this->getLabelList($scoresheet->category, $scoresheet->published);
        $tieBreakerList = $this->tieBreakerList($scoresheet->published);

        Mail::send($templateToUse, array('user' => $user, 'scoresheet' => $scoresheet, 'label' => $labelList,
            'tieBreakerList' => $tieBreakerList, 'categories' => $this->categories(), 'email' => true),
            function ($message) use ($scoresheet, $user, $ccEmails) {
            $message->to($user->email, $user->writingName)->subject('Daphne score sheet judged for ' . $scoresheet->title);
            foreach ($ccEmails as $email) {
                $message->cc($email['email'], $email['name']);
            }

        });
    }


}
