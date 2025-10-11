<?php declare(strict_types=1);

/** @var Summary $summary */
use JoeFallon\KissTest\Reporting\Summary;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $summary_result_status = 'FAIL';
    $result_class = 'test-fail';
    if (!$summary->getTestCasesFailedCount()) {
        $summary_result_status = 'PASS';
        $result_class = 'test-pass';
    }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Unit Tests | <?php echo htmlspecialchars($summary_result_status, ENT_QUOTES, 'UTF-8'); ?></title>
    <style type="text/css">
    <?php require(__DIR__ . '/../css/bootstrap-custom.css'); ?>
    </style>
    <style type="text/css">
    <?php require(__DIR__ . '/../css/theme.css'); ?>
    </style>
</head>
<body>
    <div class="container">
        <?php require(__DIR__ . '/header.php'); ?>
        <?php
        $temp = [];

        foreach ($summary->getUnitTestsResults() as $result) {
            $temp[] = $result->getUnitTestName();
        }

        asort($temp);
        $testNames = $temp;
        ?>


        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12 text-center">
                        <h4>Table of Contents</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="span12 text-left">
                    <?php
                    foreach($testNames as $thisTest)
                    {
                        foreach($summary->getUnitTestsResults() as $result)
                        {
                            if($result->getUnitTestName() == $thisTest)
                            {
                                $resultClass = 'test-pass';

                                if($result->getPercentageFailed() > 0)
                                {
                                    $resultClass = 'test-fail';
                                }

                                echo "<span class='$resultClass toc-link'>";
                                $name = $result->getUnitTestName();
                                $href = str_replace('\\', '-', $name);
                                echo "<a href='#$href' class='test-link'>";
                                $contents = explode('\\', $thisTest);
                                echo end($contents);
                                echo "</a>";
                                echo "</span>";
                                echo "\n";
                            }
                        }
                    }
                    ?>

                    </div>
                </div>
            </div>
        </div>

        <?php foreach($summary->getUnitTestsResults() as $result): ?>

            <?php require(realpath(dirname(__FILE__) . '/unittest-result.php')); ?>

        <?php endforeach; ?>


        <div id="footer" class="row">
            <div class="span12">
                KissTest &copy;<?php echo date("Y"); ?> Joe Fallon, All Rights Reserved.
            </div>
        </div>
    </div>
</body>
</html>
