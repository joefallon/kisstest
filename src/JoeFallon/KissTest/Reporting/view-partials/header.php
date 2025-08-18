<?php
declare(strict_types=1);
/**
 * @var \JoeFallon\KissTest\Reporting\Summary $summary
 */

$summary_result_status = 'FAIL';
$result_class = 'test-fail';

if(!$summary->getTestCasesFailedCount())
{
    $summary_result_status = 'PASS';
    $result_class = 'test-pass';
}

$numberOfAsserts = htmlspecialchars($summary->getNumberOfAsserts(), ENT_QUOTES, 'UTF-8');
$countPassed     = htmlspecialchars((string)$summary->getTestCasesPassedCount(), ENT_QUOTES, 'UTF-8');
$countFailed     = htmlspecialchars((string)$summary->getTestCasesFailedCount(), ENT_QUOTES, 'UTF-8');
$countTestCases  = htmlspecialchars((string)$summary->getTestCasesCount(), ENT_QUOTES, 'UTF-8');
?>
<div id="test-results-header" class="row <?= $result_class ?> text-center">
    <div class="span3 text-center <?= $result_class ?>" id="test-results">
        <a id="top"></a>
        <h4>Tests Result: <?= $summary_result_status ?></h4>
        <h5>Number of Asserts: <?= $numberOfAsserts ?></h5>
    </div>
    <div class="span3 text-center <?= $result_class ?>">
        <h4>Tests Passed: <?= $countPassed ?><br />
            (<?php printf("%.2f", $summary->getPercentagePassed()); ?>%)</h4>
    </div>
    <div class="span3 text-center <?= $result_class ?>">
        <h4>Tests Failed: <?= $countFailed ?><br />
            (<?php printf("%.2f", $summary->getPercentageFailed()); ?>%)</h4>
    </div>
    <div class="span3 text-center <?= $result_class ?>">
        <h4>Total Tests: <?= $countTestCases ?><br />
            (<?php printf("%.2f", $summary->getExecutionTimeInMillisecs()); ?> mSecs)</h4>
    </div>
</div>
