
<?php

/* @var $summary \JoeFallon\KissTest\Reporting\Summary */ ?>

<?php

$sumarry_result_status = 'FAIL';
$result_class = 'test-fail';

if(!$summary->getTestCasesFailedCount())
{
    $sumarry_result_status = 'PASS';
    $result_class = 'test-pass';
}

?>

<div id="test-results-header" class="row <?php echo $result_class; ?> text-center">
    <div class="span3 text-center <?php echo $result_class; ?>" id="test-results">
        <a name="top"></a>
        <h4>Tests Result: <?php echo $sumarry_result_status; ?></h4>
        <h5>Number of Asserts: <?php echo $summary->getNumberOfAsserts(); ?></h5>
        <p style="margin-top:3px;margin-bottom:0;">
            <a href="cov/"
               class="<?php echo $result_class; ?> cov-link">Coverage Report</a>
        </p>
    </div>
    <div class="span3 text-center <?php echo $result_class; ?>">
        <h4>Tests Passed: <?php echo $summary->getTestCasesPassedCount(); ?><br />
            (<?php printf("%.2f", $summary->getPercentagePassed()); ?>%)</h4>
    </div>
    <div class="span3 text-center <?php echo $result_class; ?>">
        <h4>Tests Failed: <?php echo $summary->getTestCasesFailedCount(); ?><br />
            (<?php printf("%.2f", $summary->getPercentageFailed()); ?>%)</h4>
    </div>
    <div class="span3 text-center <?php echo $result_class; ?>">
        <h4>Total Tests: <?php echo $summary->getTestCasesCount(); ?><br />
            (<?php printf("%.2f", $summary->getExecutionTimeInMillisecs()); ?> mSecs)</h4>
    </div>
</div>
