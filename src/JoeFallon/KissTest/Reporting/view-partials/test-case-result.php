<?php
declare(strict_types=1);
/**
 * @var \JoeFallon\KissTest\Reporting\UnitTestResult $result
 * @var \JoeFallon\KissTest\Reporting\TestCaseResult $current
 * @var int $i
 */
$testCaseResults = $result->getTestCaseResults();
$current = $testCaseResults[$i];

$testResult = $current->getTestStatus() ? 'test-pass' : 'test-fail';
$testCaseName = htmlspecialchars($current->getTestCaseName(), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($current->getMessage(), ENT_QUOTES, 'UTF-8');
$executionTime = $current->getExecutionTimeInMillisecs();
$assertCount = htmlspecialchars(number_format($current->getAssertCount()), ENT_QUOTES, 'UTF-8');
?>

<tbody>
<tr class="test-case-line-item">
    <td class="test-case-line-item-number">
        <?= ($i + 1) ?>.
    </td>
    <td>
        <div class="test-case-line-item-name <?php echo $testResult; ?>">
            <?= $testCaseName ?>
        </div>
        <div class="test-case-line-item-msg <?php echo $testResult; ?>">
            <?= $message ?>
        </div>
    </td>
    <td>
        <div class="test-case-line-item-metrics text-right <?php echo $testResult; ?>">
            <?php printf("%.2f", $executionTime); ?> mSecs,
            Asserts: <?= $assertCount ?>
        </div>
    </td>
</tr>
</tbody>
