<?php /* @var $result \JoeFallon\KissTest\Reporting\UnitTestResult */  ?>
<?php /* @var $current \JoeFallon\KissTest\Reporting\TestCaseResult */ ?>
<?php

$testCaseResults = $result->getTestCaseResults();
$current = $testCaseResults[$i];

$testResult = 'test-fail';

if($current->getTestStatus() == true)
{
    $testResult = 'test-pass';
}

?>

<tbody>

<tr class="test-case-line-item">
    <td class="test-case-line-item-number">
        <?php echo ($i + 1) ?>.
    </td>
    <td>
        <div class="test-case-line-item-name <?php echo $testResult; ?>">
            <?php echo $current->getTestCaseName(); ?>
        </div>
        <div class="test-case-line-item-msg <?php echo $testResult; ?>">
            <?php echo $current->getMessage(); ?>
        </div>
    </td>
    <td>
        <div class="test-case-line-item-metrics text-right <?php echo $testResult; ?>">
            <?php printf("%.2f", $current->getExecutionTimeInMillisecs()); ?> mSecs,
            Asserts: <?php echo number_format($current->getAssertCount()); ?>
        </div>
    </td>
</tr>

</tbody>

