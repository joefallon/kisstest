KissTest
========

By [Joe Fallon](http://blog.joefallon.net/)

A Keep-It-Super-Simple, fast, and beautiful xUnit style unit test library. It provides
several useful features and benfits not available in other unit testing frameworks:

*   The display of the testing results is completely displayed right in the browser. The
    layout is beautiful and non-saturated colors were chosen giving a wonderful testing
    experience.
*   Detailed metrics for all tests is displayed right in the browser window. Now you can
    immediately determine which tests are taking so much time.
*   The results of all the tests are displayed in a table of contents format. If a test
    failed, it will be red. Click on it and go right to the results for the failing test.
    Then, click the handy "top" link and go right back to the table of contents. Better
    yet, fix the test, press F5 and see the test go green.
*   No CLI access is needed. None.
*   Since the CLI is not used, the execution environment can be set up to be identical
    to the production environment. Having the production environment match the testing
    environment as close as practical is always a great practice.
*   It's fast. Really fast. No code injection, dynamic class modification, or eval
    is used anywhere. The testing framework is light and nimble.
*   Easy to understand. Do you have a new devloper on your team that is a little green
    and inexperienced? No problem, this testing framework is learnable in 10-15 minutes.
*   A full mocking and class stubbing solution is included as well.
*   The mocking/stubbing functionality is simple and fast. Really fast.
*   All test suite setup is performed via plain PHP. No annotations. No XML. No JSON.
    No *.ini files. Just simeple, sweet, and to-the-point PHP.

Tests taking 2 minutes to run? Ain't nobody got time for that!

Are you getting tired of spending your time fiddling with XML configuration files? Ain't
nobody got time for that either.

## Philosophy

In my humble opinion, the best jet aircraft ever created was the SR-71.
The development of the SR-71 project was led by
[Kelly Johnson](http://en.wikipedia.org/wiki/Kelly_Johnson_%28engineer%29). It still
holds many records. It's the fastest (Mach 3.4+) and highest flying jet aircraft ever
built. It was never shot down. It has no computers and was designed in the 1950's.

In my opinion, the creator of the SR-71, Kelly Johnson, was one of the best engineers
to ever have lived. I try to emulate his practices whenever possible and they have
brought me great success. Kelly Johnson coined the acronym KISS
(Keep It Simple Straightforward) and I am a huge fan if the KISS principle. Let me
share a story.






When it comes writing software, I am a huge fan of K.I.S.S. (Keep It Super Simple).

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





