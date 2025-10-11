<?php declare(strict_types=1);

namespace JoeFallon\KissTest\Reporting;

/**
 * @author    Joseph Fallon <joseph.t.fallon@gmail.com>
 * @copyright Copyright 2014 Joseph Fallon (All rights reserved)
 * @license   MIT
 */
class Report
{
    private Summary $_summary;

    /**
     * Report constructor.
     *
     * @param Summary $summary
     */
    public function __construct(Summary $summary)
    {
        $this->_summary = $summary;
    }

    /**
     * Generates the report output.
     */
    public function generateReport(): void
    {
        $summary = $this->_summary;
        require __DIR__ . '/view-partials/layout.php';
    }
}
