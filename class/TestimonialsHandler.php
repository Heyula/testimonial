<?php

declare(strict_types=1);


namespace XoopsModules\Testimonial;

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Testimonial module for xoops
 *
 * @copyright    2021 XOOPS Project (https://xoops.org)
 * @license      GPL 2.0 or later
 * @package      testimonial
 * @since        1.0
 * @min_xoops    2.5.9
 * @author       B.Heyula - Email:eren@aymak.net - Website:http://erenyumak.com
 */

use XoopsModules\Testimonial;


/**
 * Class Object Handler Testimonials
 */
class TestimonialsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'testimonial_testimonials', Testimonials::class, 'testi_id', 'testi_title');
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function create($isNew = true)
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field
     *
     * @param int $id field id
     * @param null fields
     * @return \XoopsObject|null reference to the {@link Get} object
     */
    public function get($id = null, $fields = null)
    {
        return parent::get($id, $fields);
    }

    /**
     * get inserted id
     *
     * @param null
     * @return int reference to the {@link Get} object
     */
    public function getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Count Testimonials in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountTestimonials($start = 0, $limit = 0, $sort = 'testi_id ASC, testi_title', $order = 'ASC')
    {
        $crCountTestimonials = new \CriteriaCompo();
        $crCountTestimonials = $this->getTestimonialsCriteria($crCountTestimonials, $start, $limit, $sort, $order);
        return $this->getCount($crCountTestimonials);
    }

    /**
     * Get All Testimonials in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllTestimonials($start = 0, $limit = 0, $sort = 'testi_id ASC, testi_title', $order = 'ASC')
    {
        $crAllTestimonials = new \CriteriaCompo();
        $crAllTestimonials = $this->getTestimonialsCriteria($crAllTestimonials, $start, $limit, $sort, $order);
        return $this->getAll($crAllTestimonials);
    }

    /**
     * Get Criteria Testimonials
     * @param        $crTestimonials
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getTestimonialsCriteria($crTestimonials, $start, $limit, $sort, $order)
    {
        $crTestimonials->setStart($start);
        $crTestimonials->setLimit($limit);
        $crTestimonials->setSort($sort);
        $crTestimonials->setOrder($order);
        return $crTestimonials;
    }
}
