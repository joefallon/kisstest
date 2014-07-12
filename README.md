KissTest
========

By [Joe Fallon](http://blog.joefallon.net/)

A Keep-It-Simple-Straightforward, fast, and beautiful xUnit style
unit test library.

Here is an example of some passing tests:

[KissTest Passing Tests](http://i.imgur.com/xPJH6yn.png)

It provides several useful features and benfits not available in other
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
*   Easy to understand. Do you have a new devloper on your team that is a
    little green and inexperienced? No problem, this testing framework is
    learnable in 10-15 minutes.
*   A full mocking and class stubbing solution is included as well.
*   The mocking/stubbing functionality is simple and fast. Really fast.
*   All test suite setup is performed via plain PHP. No annotations. No XML. No JSON.
    No *.ini files. Just simeple, sweet, and to-the-point PHP.

## Installation

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






