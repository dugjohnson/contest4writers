<?php

namespace App\Http\Controllers\Helpers;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Dugjohnson\Administration\AdminHelper;

trait EntryHelper
{

    use AdminHelper;
    /**
     * @return array
     */
    public function categoryCapacity()
    {
        return ['CA' => ['published' => 50, 'unpublished' => 50],
            'HI' => ['published' => 50, 'unpublished' => 50],
            'IN' => ['published' => 50, 'unpublished' => 50],
            'MA' => ['published' => 50, 'unpublished' => 100],
            'PA' => ['published' => 50, 'unpublished' => 50],
            'ST' => ['published' => 50, 'unpublished' => 100],];
    }

    /**
     * @param bool $leaveOutCapped
     * @return array|void
     */
    public function categories($leaveOutCapped = false,$published=null)
    {
        $categories = ['CA' => 'Category (Series)', 'HI' => 'Historical', 'IN' => 'Inspirational', 'MA' => 'Mainstream', 'PA' => 'Paranormal', 'ST' => 'Single Title',];
        if ($leaveOutCapped) {
            $this->categoriesByCaps($categories,$published);
            if (empty($categories)) {
                $categories = Array();

            }

        }
        return $categories;
    }

    /**
     * @param array $categories
     * @param bool $showAboveCapacity - if false shows only those at or below capacity, if true shows only those above capacity
     */
    public function categoriesByCaps(&$categories, $published=null, $showAboveCapacity = false)
    {
        $categoryCounts = $this->getCategoryCounts($published);
        foreach ($categoryCounts as $categoryCount) {
            if ($this->categoryHasReachedCapacity($categoryCount) == (!$showAboveCapacity)) {
                unset($categories[$categoryCount->category]);

            }
        }
    }

    public function getPublishedString($published){
        return $published?'published':'unpublished';
    }
    /**
     * @param $categoryCount
     * @return bool
     */
    public function categoryHasReachedCapacity($categoryCount)
    {
        $capacity = $this->categoryCapacity();
        return ($categoryCount->categorycount >= $capacity[$categoryCount->category][$this->getPublishedString($categoryCount->published)]);

    }

    public function getCategoryCountsByCoordinator($adminPerson){
        $roles = $adminPerson->getRoles();
        $whereStatement = '';
        foreach ($roles as $role){
            if ($role->role == 'OC' || $role->role == 'JC'){
                $whereStatement = 'true';
                break;
            }
            if (strlen($whereStatement)>0){
                $whereStatement .= ' OR ';

            }
            $whereStatement .= " ( '$role->category' = category and $role->published = published) ";
        }
        return DB::table('entries')
            ->select(DB::raw('category, published, count(*) as categorycount'))
            ->whereRaw($whereStatement)
            ->groupBy('category', 'published')
            ->get();

    }
    /**
     *
     */
    public function getCategoryCounts($published = null)
    {
        //todo: this could be tighter
        if (is_null($published)){
            return DB::table('entries')
                ->select(DB::raw('category, published, count(*) as categorycount'))
                ->groupBy('category', 'published')
                ->get();

        } else {
            return DB::table('entries')
                ->select(DB::raw('category, published, count(*) as categorycount'))
                ->where('published','=',$published)
                ->groupBy('category', 'published')
                ->get();

        }

    }

    public function sendConfirmation($entry){
        $templateToUse = ($entry->published?'entry.emails.confirmpub':'entry.emails.confirmunpub');
        $user = User::find($entry->user_id);
        $ccEmails = Array();
        $this->addAdminEmail($ccEmails,'JC');
        $this->addAdminEmail($ccEmails,'OC');
        $this->addAdminEmail($ccEmails,$entry->category,$entry->published);
        $ccEmails[] = ['email'=>'doug@asknice.com','name'=>'Webmaster'];

        Mail::send($templateToUse,array('user'=>$user,'entry'=>$entry),function($message) use ($entry,$user,$ccEmails) {
           $message->to($user->email,$user->writingName)->subject('Daphne Update for '.$entry->title);
            foreach($ccEmails as $email){
                $message->cc($email['email'],$email['name']);
            }
        });
    }

}
