KissTest
========

By [Joe Fallon](http://blog.joefallon.net/)

A Keep-It-Simple-Straightforward, fast, and beautiful xUnit style
unit test library.

Here is an example of some passing tests:

![KissTest Passing Tests](http://i.imgur.com/xPJH6yn.png)

It provides several useful features and benefits not available in other
unit testing frameworks:

*   The display of the testing results is completely displayed right
    in the browser. The layout is beautiful and non-saturated colors
    were chosen giving a wonderful testing experience.
*   Detailed metrics for all tests is displayed right in the browser
    window. Now you can immediately determine which tests are taking
    so much time.
*   The results of all the tests are displayed in a table of contents
    format. If a test failed, it will be red. Click on it and go right
    to the results for the failing test. Then, click the handy "top"
    link and go right back to the table of contents. Better yet, fix
    the test, press F5 and see the test go green.
*   No CLI access is needed. None.
*   Technically, the CLI PHP executable is not the same one that is used
    to serve web pages. It's close, but not the same one. Since the CLI
    is not used in KissTest, the execution environment can be set up
    to be identical to the production environment. Having the production
    environment match the testing environment as close as practical is
    always a great practice.
*   It's fast. Really fast. No code injection, dynamic class modification,
    or eval is used anywhere. The testing framework is light and nimble.
*   Easy to understand. Do you have a new developer on your team that is a
    little green and inexperienced? No problem, this testing framework can
    be learned in 10-15 minutes.
*   A full mocking and class stubbing solution is included as well.
*   The mocking/stubbing functionality is simple and fast. Really fast.
*   All test suite setup is performed via plain PHP. No annotations. No XML. No JSON.
    No *.ini files. Just simple, sweet, and to-the-point PHP.

Here is an example containing some failing tests with some useful features annotated:

![KissTest Passing Tests](http://i.imgur.com/1X3o4bB.png)

Installation
------------

The easiest way to install KissTest is with
[Composer](https://getcomposer.org/). Create the following `composer.json` file
and run the `php composer.phar install` command to install it.

```json
{
    "require": {
        "joefallon/kisstest": "*"
    }
}
```

Configuration and Test Setup
----------------------------

### Directory Structure

Since KissTest uses just PHP for configuration there are an infinite number of
ways to configure and set up a test suite. The following method is simple and
straight forward.

Here is an example directory structure structure:

```
ProjectDirectory
 |
 +-->src
 |    |
 |    +--> Folder1
 |    |     |
 |    |     +--> CodeFile1.php
 |    |
 |    +--> Folder2
 |          |
 |          +--> CodeFile2.php
 |
 +-->tests
       |
       +--> Folder1
       |     |
       |     +--> CodeFile1Tests.php           <-- unit tests for CodeFile1.php
       |
       +--> Folder2
       |     |
       |     +--> CodeFile2Tests.php           <-- unit tests for CodeFile2.php
       |
       +--> index.php                          <-- test suite definition
```

Here is the directory for KissTest:

![KissTest Passing Tests](http://i.imgur.com/jetgmvG.png)

Here we see where the source (a.k.a. "src") directory and "tests" directory
and additional (optional) configuration file is created:

![KissTest Passing Tests](http://i.imgur.com/L4c3e0g.png)

Here we see that the directory structure of the source code subtree and the
unit test code subtree mirrors each other:

![KissTest Passing Tests](http://i.imgur.com/Z1P2yjN.png)

Here we see the `index.php` file that defines the tests included in the test
suite, a unit test file and the associated production code file:

![KissTest Passing Tests](http://i.imgur.com/tYkEA2o.png)

### Test Suite Specification (tests/index.php)

The test specification exists within the `index.php` file. Here is an example:

```php
use JoeFallon\KissTest\UnitTest;

// Pull in the configuration for autoloading, database cleaning, etc.
require('config/main.php');

// Unit Test Files
new tests\JoeFallon\KissTest\MockTests();
new tests\JoeFallon\KissTest\Reporting\MilliTimespanTests();
new tests\JoeFallon\KissTest\Reporting\SummaryTests();
new tests\JoeFallon\KissTest\Reporting\TestCaseResultTests();
new tests\JoeFallon\KissTest\Reporting\UnitTestResultTests();

// more tests here...

// Display the summary.
UnitTest::getAllUnitTestsSummary();
```

### Additional Configuration (tests/config/main.php)

The configuration file (`tests/config/main.php`) is where the following
is placed:

*   Autoloading configuration
*   Database cleaning
*   Defining global constants (if any)

Here is an example configuration file:

```php
use JoeFallon\Autoloader;
use JoeFallon\Database\PdoFactory;

// Define the include paths.
define('BASE_PATH', realpath(dirname(__FILE__).'/../../'));
define('SRC_PATH',  BASE_PATH.'/src');
define('VEND_PATH', BASE_PATH.'/vendor');

// Set the application include paths for autoloading.
set_include_path(get_include_path().':'.SRC_PATH.':'.BASE_PATH);

// Composer autoloading.
require(VEND_PATH.'/autoload.php');

// All other (i.e. non-composer) autoloading.
Autoloader::registerAutoLoad();

// Clean out the database. It's pleasantly fast.
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USER', 'phplibrary_test');
define('DB_PASS', 'phplibrary_test');
define('DB_NAME', 'phplibrary_test');

/** @var PDO $pdo */
$pdo = PdoFactory::create(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_NAME);
$pdo->exec('SET FOREIGN_KEY_CHECKS=0;');
$pdo->exec('TRUNCATE TABLE `gtwy_tests`');
$pdo->exec('TRUNCATE TABLE `join_tests`');
$pdo->exec('SET FOREIGN_KEY_CHECKS=1;');
```

Class Documentation
-------------------

Only two classes are needed for all unit testing needs. The first is
`UnitTest` and the second is `Mock`. `UnitTest` is a class that
all unit testing classes inherit from and that also contains all of
the test cases. `Mock` is a class that is used for all stubbing
and all mocking. No other classes from the unit testing framework are
needed.

### UnitTest

When using the class `UnitTest`, a few rules need to be followed:

*    Your unit test class must inherit from class `UnitTest`.
*    The names of all unit test methods (i.e. test cases) must begin
     with the string `test_`.
*    A test is considered to have passed if it does not fail an assert,
     or `notImplementedFail()` is not called, or `testFail()` was
     not called.
*    When the name of the test case is displayed, all underscores are
     changed to spaces. Therefore, your test case method names can read
     just like sentences when they are viewed in the browser.

#### Example Unit Test Class

Here is an example unit test class:

```php
// It is recommend, but not at all required, to namespace the unit test class
// with the same namespaces as the class under test except with the additional
// namespace 'tests\' prefixed to the front. For example, the class under test
// is in the namespace 'JoeFallon\KissTest\Reporting'. Therefore, the unit test
// class is placed in the namespace 'tests\JoeFallon\KissTest\Reporting'.
namespace tests\JoeFallon\KissTest\Reporting;

// Class Under Test
use JoeFallon\KissTest\Reporting\MilliTimespan;
// Unit Test Base Class
use JoeFallon\KissTest\UnitTest;

class MilliTimespanTests extends UnitTest
{
    public function test_elapsed_time_is_always_zero_if_not_started()
    {
        $timespan = new MilliTimespan();
        $expected = 0;
        usleep(100);
        $actual = $timespan->getElapsedTimeInMilliSec();

        $this->assertEqual($expected, $actual, "", 0.01);
    }

    public function test_elapsed_time_is_positive_if_started()
    {
        $timespan = new MilliTimespan();
        $timespan->startTimer();
        usleep(100);
        $timespan->stopTimer();
        $elapsedTime = $timespan->getElapsedTimeInMilliSec();

        $this->assertFirstGreaterThanSecond($elapsedTime, 0.0);
    }

    // more test cases here...
}
```

#### Assertion Methods in UnitTest

The following assertion methods are available in the base class UnitTest:

```php
// $first    - First test operand
// $second   - Second test operand
// $failMsg  - Message to display on test failure
// $maxDelta - Maximum allowable absolute difference between two operands
//             when comparing floating point numbers for equality.
// $value    - Test operand when only one exists (i.e. true/false asserts)

assertEqual($first, $second, $failMsg="", $maxDelta=0.0)
assertNotEqual($first, $second, $failMsg="")

assertFirstGreaterThanSecond($first, $second, $failMsg="")
assertFirstGreaterThanOrEqualSecond($first, $second, $failMsg="")

assertFirstLessThanSecond($first, $second, $failMsg="")
assertFirstLessThanOrEqualSecond($first, $second, $failMsg="")

assertTrue($value, $failMsg="")
assertFalse($value, $failMsg="")
```

#### Test Not Implemented

Sometimes, a test method is created but the test method body has not been
completed. In this case the method `notImplementedFail()` should be used.

Here is an example of using `notImplementedFail()`:

```php
namespace tests\Example;

use JoeFallon\Example\ClassUnderTest;
use JoeFallon\KissTest\UnitTest;

class ClassUnderTestTests extends UnitTest
{
    public function test_something()
    {
        $this->notImplementedFail();
    }

    // more test cases here...
}
```

#### Test Setup and Teardown

Sometimes a certain set of tasks will need to be performed every time a test is
ran and another set of tasks will need to be performed every time a test completes.
For example, perhaps an object graph needs to be created and then torn down
and it is used in every test. The empty methods (i.e. hooks) `setUp()` and
`tearDown()` are exactly for this purpose.

Here is an example of the test case setup and tear down:

```php
namespace tests\Example;

use JoeFallon\Example\ClassUnderTest;
use JoeFallon\KissTest\UnitTest;

class ClassUnderTestTests extends UnitTest
{
    public function setUp()
    {
        // perform set up tasks before the start of each test case...
    }

    public function tearDown()
    {
        // perform tear down tasks after each test case is complete...
    }

    // test cases here...
}
```

#### Testing for Exceptions

Testing for exceptions is very easy. Here is an example of testing for an
exception:

```php
namespace tests\Example;

use JoeFallon\Example\ClassUnderTest;
use JoeFallon\KissTest\UnitTest;

class ClassUnderTestTests extends UnitTest
{
    public function test_exception_is_thrown()
    {
        try
        {
            // place test code that should throw exception here...
        }
        catch(Exception $e)
        {
            // An exception was thrown. Yay!
            $this->testPass();
            return;
        }

        $this->testFail();
    }

    // more test cases here...
}
```

### Mock

`Mock` is an extremely simple to understand and extremely fast stubbing and
mocking solution. All types of mocking and stubbing needs can be satisfied via
its use.

The use of Mock requires the cooperation of three different classes:

1.  The class under test.
2.  The unit test class that contains the methods for testing the class under
    test.
3.  The mock/stub (the same class satisfies both needs) class for the class
    under test.

Here is an example class under test:

```php
namespace MyProject;

class ProductionClass
{
    public function exampleMethod(DependencyClass $dependency)
    {
        $param1 = 5;
        $param2 = 'abc';
        $result = $dependency->timeConsumingCalculation($param1, $param2);

        return $result;
    }
}
```

Here is the class that will be mocked out:

```php
namespace MyProject;

class DependencyClass
{
    public function timeConsumingCalculation($param1, $param2)
    {
        // perform very time consuming calculations...
        return 42;
    }
}
```

Here is the class `DependencyClass` fully mocked/stubbed out:

```php
namespace tests\MyProject;

use MyProject\DependencyClass;
use JoeFallon\KissTest\Mock;

class DependencyClassMock extends DependencyClass
{
    public $_mock;

    // Replace the default constructor.
    public function __construct()
    {
        $this->_mock = new Mock();
    }

    public function timeConsumingCalculation($param1, $param2)
    {
        // The contents every public method is replaced with the
        // following.
        $args = array($param1, $param2);
        return $this->_mock->methodCalled('timeConsumingCalculation', $args);
    }
}
```

Finally, here is the unit test that ties it all together:

```php
namespace tests\MyProject;

use MyProject\DependencyClass;
use JoeFallon\KissTest\Mock;
use JoeFallon\KissTest\UnitTest;

class DependencyClassTests extends UnitTest
{
    public function test_example_method_has_correct_object_interactions()
    {
        // Create the mock and specify how it should behave.
        $mock = new DependencyClassMock();
        $mock->setMethodReturnValue('timeConsumingCalculation', 42);

        // Create the class under test.
        $productionClass = new ProductionClass();
        $result = $productionClass->exampleMethod($mock);

        // Assert the return value matches what is expected.
        $this->assertEqual(42, $result);

        // Assert the method was called exactly once.
        $callCount = $mock->_mock->getMethodCallCount('timeConsumingCalculation');
        $this->assertEqual(1, $callCount);

        // Assert the proper arguments were passed to the method.
        $args = $mock->_mock->getMethodArgs('timeConsumingCalculation', 1);
        $this->assertEqual(5,     $args[0]);
        $this->assertEqual('abc', $args[1]);
    }
}
```

The mocks can be used as stubs by simply not asserting on any of the methods in
the instance of `Mock` held by the mock.stub class. Since no reflection, eval,
or injection is used, the mock/stub classes are extremely fast.

Code Coverage
-------------

KissTest utilizes the php-code-coverage portion of the phpunit project to provide code
coverage support. To enable the code coverage support, add the following code to the
configuration section of your test code:

```php
UnitTest::setCodeCoverageOutputDirectory('../cov');
UnitTest::addDirectoryToCoverageBlacklist('../tests');
UnitTest::addDirectoryToCoverageBlacklist('../vendor');
UnitTest::setCodeCoverageEnabled(true);
```

It is important to realize that the "/cov" directory must be readable by the PHP process.
To ensure this is the case, you can run the following at the CLI:

```
chown -R www-data:www-data /var/www
```
