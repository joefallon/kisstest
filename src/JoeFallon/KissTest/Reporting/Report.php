<?php
namespace JoeFallon\KissTest\Reporting;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class Report
{
    /** @var Summary */
    private $_summary;


    /**
     * Class Constructr
     * 
     * @param Summary $summary
     */
    public function __construct(Summary $summary)
    {
        $this->_summary = $summary;
    }


    /**
     * generate Report
     */
    public function generateReport()
    {
        $summary = $this->_summary;
        require_once('view-partials/layout.php');
    }
}
