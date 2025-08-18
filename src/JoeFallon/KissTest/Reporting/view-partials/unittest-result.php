<?php
declare(strict_types=1);
/**
 * @var \JoeFallon\KissTest\Reporting\UnitTestResult $result
 */

$unitTestName = htmlspecialchars(str_replace('\\', '_', $result->getUnitTestName()), ENT_QUOTES, 'UTF-8');
$numTestCasesFailed = htmlspecialchars((string)$result->getNumberTestCasesFailed(), ENT_QUOTES, 'UTF-8');
$numTestCasesPassed = htmlspecialchars((string)$result->getNumberTestCasesPass(), ENT_QUOTES, 'UTF-8');
$assertCount = htmlspecialchars((string)$result->getAssertCount(), ENT_QUOTES, 'UTF-8');
$totalTestCases = htmlspecialchars((string)$result->getTestCaseCount(), ENT_QUOTES, 'UTF-8');

?>
<div class="row test-set-name">
    <div class="span12">
        <a name="<?= $unitTestName ?>"></a>
        <h4><?= $unitTestName ?></h4>
    </div>
</div>
<div class="row">
    <div class="span11 text-left test-set-metrics">
        Tests Failed: <?= $numTestCasesFailed ?>,
        Tests Passed: <?= $numTestCasesPassed ?>,
        Asserts:      <?= $assertCount ?>,
        Total Tests:  <?= $totalTestCases ?>
        (<?php printf("%.2f", $result->getExecutionTimeInMillisecs()); ?> mSec)
    </div>
    <div class="span1 top-link text-right">
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
