<?php declare(strict_types=1);

use JoeFallon\KissTest\Reporting\UnitTestResult;

/** @var UnitTestResult $result */
$unitTestName = str_replace('\\', '_', $result->getUnitTestName());
$unitTestName = htmlspecialchars($unitTestName, ENT_QUOTES, 'UTF-8');

$numTestCasesFailed = $result->getNumberTestCasesFailed();
$numTestCasesPassed = $result->getNumberTestCasesPass();
$assertCount        = $result->getAssertCount();
$totalTestCases     = $result->getTestCaseCount();
$executionTime      = sprintf("%.2f", $result->getExecutionTimeInMillisecs());
?>
<div class="row test-set-name">
    <div class="span12">
        <a id="<?= $unitTestName ?>"></a>
        <h4><?= $unitTestName ?></h4>
    </div>
</div>
<div class="row">
    <div class="span11 text-left test-set-metrics">
        Tests Failed: <?= $numTestCasesFailed ?>,
        Tests Passed: <?= $numTestCasesPassed ?>,
        Asserts:      <?= $assertCount ?>,
        Total Tests:  <?= $totalTestCases ?> (<?= $executionTime ?> mSec)
    </div>
    <div class="span1 top-link text-right">
        <!--suppress HtmlUnknownAnchorTarget -->
        <a href="#top">top</a>
    </div>
</div>

<div class="row test-set-line-items">
    <div class="span12">
        <table>
            <?php $testCaseResults = $result->getTestCaseResults();
            for ($i = 0, $len = count($testCaseResults); $i < $len; $i++): ?>
                <?php require __DIR__ . '/test-case-result.php'; ?>
            <?php endfor; ?>
        </table>
    </div>
</div>
