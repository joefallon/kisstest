<!DOCTYPE html>
<html lang="en">
<head>
    <?php /* @var $summary \JoeFallon\KissTest\Reporting\Summary */ ?>

    <?php

    $sumarry_result_status = 'FAIL';
    $result_class = 'test-fail';

    if(!$summary->getTestCasesFailedCount())
    {
        $sumarry_result_status = 'PASS';
        $result_class = 'test-pass';
    }

    ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Unit Tests | <?php echo $sumarry_result_status ?></title>

    <style media="screen" type="text/css">
    <?php require_once(realpath(dirname(__FILE__) . '/../css/bootstrap-custom.css')); ?>
    </style>

    <style media="screen" type="text/css">
    <?php require_once(realpath(dirname(__FILE__) . '/../css/theme.css')); ?>
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">

        <?php /* @var $summary \JoeFallon\KissTest\Reporting\Summary */ ?>
        <?php require_once(realpath(dirname(__FILE__) . '/header.php')); ?>

        <?php
        foreach($summary->getUnitTestsResults() as $result)
        {
            /* @var $result \JoeFallon\KissTest\Reporting\UnitTestResult */
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
