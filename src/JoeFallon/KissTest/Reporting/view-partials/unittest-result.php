<?php /* @var $result \JoeFallon\KissTest\Reporting\UnitTestResult */ ?>

<div class="row test-set-name">
    <div class="span12">
        <a name="<?php echo str_replace('\\', '-', $result->getUnitTestName());?>"></a>
        <h4><?php echo $result->getUnitTestName();?></h4>
    </div>
</div>
<div class="row">
    <div class="span11 text-left test-set-metrics">
        Tests Failed: <?php echo $result->getNumberTestCasesFailed(); ?>,
        Tests Passed: <?php echo $result->getNumberTestCasesPass(); ?>,
        Asserts: <?php echo number_format($result->getAssertCount()); ?>,
        Total Tests: <?php echo $result->getTestCaseCount(); ?>
        (<?php printf("%.2f", $result->getExecutionTimeInMillisecs()); ?> mSec)
    </div>
    <div class="span1 top-link text-right">
        <a href="#top">top</a>
    </div>
</div>

<div class="row test-set-line-items">
    <div class="span12">
        <table>
            <?php for($i = 0; $i < count($result->getTestCaseResults()); $i++): ?>
                <?php require(realpath(dirname(__FILE__) . '/test-case-result.php')); ?>
            <?php endfor; ?>
        </table>
    </div>
</div>

