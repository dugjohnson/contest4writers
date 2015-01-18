<?php

namespace Contest\Http;


use Illuminate\Support\Facades\DB;

trait EntryHelper
{
    /**
     * @return array
     */
    public function categoryCapacity()
    {
        return ['CA' => ['published' => 40, 'unpublished' => 50],
            'HI' => ['published' => 40, 'unpublished' => 50],
            'IN' => ['published' => 40, 'unpublished' => 50],
            'MA' => ['published' => 40, 'unpublished' => 100],
            'PA' => ['published' => 40, 'unpublished' => 50],
            'ST' => ['published' => 40, 'unpublished' => 100],];

    }

    /**
     * @param bool $leaveOutCapped
     * @return array|void
     */
    public function categories($leaveOutCapped = false)
    {
        $categories = ['CA' => 'Category', 'HI' => 'Historical', 'IN' => 'Inspirational', 'MA' => 'Mainstream', 'PA' => 'Paranormal', 'ST' => 'Single Title',];
        if ($leaveOutCapped) {
            $this->categoriesByCaps($categories);
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
    public function categoriesByCaps(&$categories = Array(), $showAboveCapacity = false)
    {
        $categoryCounts = $this->getCategoryCounts();
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

    /**
     *
     */
    public function getCategoryCounts()
    {
        return DB::table('entries')
            ->select(DB::raw('category, published, count(*) as categorycount'))
            ->groupBy('category', 'published')
            ->get();

    }

}