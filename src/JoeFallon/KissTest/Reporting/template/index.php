<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>KissTest Unit Tests</title>

    <!-- reset.css -->
    <style type="text/css">
        html
        {
            margin:  0;
            padding: 0;
            border:  0;
        }

        body, div, span, object, iframe,h1, h2, h3, h4, h5, h6,
        p, blockquote, pre, a, abbr, acronym, address, code,
        del, dfn, em, img, q, dl, dt, dd, ol, ul, li, fieldset,
        form, label, legend, table, caption, tbody, tfoot, thead,
        tr, th, td, article, aside, dialog, figure, footer,
        header, hgroup, nav, section
        {
            margin:         0;
            padding:        0;
            border:         0;
            font-weight:    inherit;
            font-style:     inherit;
            font-size:      100%;
            font-family:    inherit;
            vertical-align: baseline;
        }

        article, aside, dialog, figure, footer, header, hgroup, nav, section
        {
            display: block;
        }

        body
        {
            line-height: 1.5;
            background:  white;
        }

        table
        {
            border-collapse: separate;
            border-spacing:  0;
        }

        caption, th, td
        {
            text-align:  left;
            font-weight: normal;
            float:       none !important;
        }

        table, th, td
        {
            vertical-align: middle;
        }

        blockquote:before, blockquote:after, q:before, q:after
        {
            content: '';
        }

        blockquote, q
        {
            quotes: "" "";
        }

        a img
        {
            border: none;
        }

        :focus
        {
            outline: 0;
        }

    </style>

    <!-- screen.css -->
    <style type="text/css">
        .container
        {
            width:   950px;
            margin:  0 auto;
            display: block;
        }

        .box
        {
            padding:       1.5em;
            margin-bottom: 1.5em;
            background:    #e5eCf9;
        }

        .center
        {
            margin-left:  auto;
            margin-right: auto;
            text-align:   center;
        }

        hr
        {
            background: #ddd;
            color:      #ddd;
            clear:      both;
            float:      none;
            width:      100%;
            height:     1px;
            margin:     0 0 1.45em;
            border:     none;
        }

        hr.space
        {
            background: #fff;
            color:      #fff;
            visibility: hidden;
        }

        .clear
        {
            clear: both;
        }

        .clearfix
        {
            overflow: hidden; /* hidden or auto can be used here */
            width: 100%
        }
    </style>

    <!-- typography.css -->
    <style type="text/css">
        html { font-size:100.01%; }

        body
        {
            font-size: 75%;
            color: #222;
            background: #fff;
            font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
        }

        h1,h2,h3,h4,h5,h6 { font-weight: normal; color: #111; }

        h1 { font-size: 3em; line-height: 1; margin-bottom: 0.5em; }
        h2 { font-size: 2em; margin-bottom: 0.75em; }
        h3 { font-size: 1.5em; line-height: 1; margin-bottom: 1em; }
        h4 { font-size: 1.2em; line-height: 1.25; margin-bottom: 1.25em; }
        h5 { font-size: 1em; font-weight: bold; margin-bottom: 1.5em; }
        h6 { font-size: 1em; font-weight: bold; }

        h1 img, h2 img, h3 img, h4 img, h5 img, h6 img { margin: 0; }

        p                { margin: 0 0 1.5em; }
        .left  		     { float: left !important; }
        p .left		     { margin: 1.5em 1.5em 1.5em 0; padding: 0; }
        .right 		     { float: right !important; }
        p .right 	     { margin: 1.5em 0 1.5em 1.5em; padding: 0; }

        a:focus, a:hover { color: #09f; }
        a                { color: #06c; text-decoration: underline; }

        blockquote       { margin: 1.5em; color: #666; font-style: italic; }
        strong, dfn	     { font-weight: bold; }
        em, dfn          { font-style: italic; }
        sup, sub         { line-height: 0; }

        abbr, acronym    { border-bottom: 1px dotted #666; }
        address          { margin: 0 0 1.5em; font-style: italic; }
        del              { color: #666; }

        pre              { margin: 1.5em 0; white-space: pre; }
        pre, code, tt    { font: 1em 'andale mono', 'lucida console', monospace; line-height: 1.5; }

        li ul, li ol { margin: 0; }
        ul, ol       { margin: 0 1.5em 1.5em 0; padding-left: 1.5em; }

        ul           { list-style-type: disc; }
        ol           { list-style-type: decimal; }

        dl           { margin: 0 0 1.5em 0; }
        dl dt        { font-weight: bold; }
        dd           { margin-left: 1.5em;}

        .small      { font-size: .8em; margin-bottom: 1.875em; line-height: 1.875em; }
        .large      { font-size: 1.2em; line-height: 2.5em; margin-bottom: 1.25em; }
        .hide       { display: none; }

        .quiet      { color: #666; }
        .loud       { color: #000; }
        .highlight  { background: #ff0; }
        .added      { background: #060; color: #fff; }
        .removed    { background: #900; color: #fff; }

        .first      { margin-left: 0; padding-left: 0; }
        .last       { margin-right: 0; padding-right: 0; }
        .top        { margin-top: 0; padding-top: 0; }
        .bottom     { margin-bottom: 0; padding-bottom: 0; }

    </style>

    <!-- forms.css -->
    <style type="text/css">
        label
        {
            font-weight: bold;
        }

        fieldset
        {
            padding: 0 1.4em 1.4em 1.4em;
            margin:  0 0 1.5em 0;
            border:  1px solid #ccc;
        }

        legend
        {
            font-weight:   bold;
            font-size:     1.2em;
            margin-top:    -0.2em;
            margin-bottom: 1em;
        }

        fieldset, #IE8#HACK
        {
            padding-top: 1.4em;
        }

        legend, #IE8#HACK
        {
            margin-top:    0;
            margin-bottom: 0;
        }

        input[type=text],
        input[type=password],
        input.text,
        input.title,
        select,
        textarea
        {
            background-color: #fff;
            border:           1px solid #bbb;
        }

        input[type=text]:focus,
        input[type=password]:focus,
        input.text:focus,
        input.title:focus,
        textarea:focus
        {
            border-color:#666;
        }

        select
        {
            background-color:   #fff;
            border: 1px solid;
        }

        input[type=text],
        input[type=password],
        input.text,
        input.title,
        textarea,
        select
        {
            margin: 0.5em 0;
        }

        input.text, input.title
        {
            width:   300px;
            padding: 5px;
        }

        input.title
        {
            font-size: 1.5em;
        }

        textarea
        {
            width:   390px;
            height:  250px;
            padding: 5px;
        }

        form.inline
        {
            line-height: 3;
        }

        form.inline p
        {
            margin-bottom: 0;
        }

        .error, .alert, .notice, .success, .info
        {
            padding:       0.8em;
            margin-bottom: 1em;
            border:        2px solid #ddd;
        }

        .error, .alert
        {
            background:   #fbe3e4;
            color:        #8a1f11;
            border-color: #fbc2c4;
        }

        .notice
        {
            background:   #fff6bf;
            color:        #514721;
            border-color: #ffd324;
        }

        .success
        {
            background:   #e6efc2;
            color:        #264409;
            border-color: #c6d880;
        }

        .info
        {
            background:   #d5edf8;
            color:        #205791;
            border-color: #92cae4;
        }

        .error a, .alert a
        {
            color: #8a1f11;
        }

        .notice a
        {
            color: #514721;
        }

        .success a
        {
            color: #264409;
        }

        .info a
        {
            color: #205791;
        }
    </style>

    <!-- screen.css -->
    <style type="text/css">
        body
        {
            background-color: #F1EFE0;
        }

        #header
        {
            height:5em;
            font: 24px Arial, Helvetica, sans-serif;
            color: #F6F5EB;
            width: 950px;
        }

        #overall-test-results
        {
            float: left;
            padding: 1.6em 0 2.2em 1.5em;
        }

        #overall-tests-passed, #overall-tests-failed, #overall-total-tests
        {
            float: right;
            padding: 1.4em 2em 0 0;
            font: 20px Arial, Helvetica, sans-serif;
        }

        .test-fail
        {
            background-color: #9A4920;
        }

        .test-pass
        {
            background-color: #758556;
        }

        .test-case-results
        {
            background-color: #F6F5EB;
            border: solid 1px #b4b4b4;
            margin: 20px 0 0 0;
        }

        .test-case-name, h3
        {
            font: 18px Arial, Helvetica, sans-serif;
            color: #A0975A;
        }

        .test-case-name
        {
            margin: 10px 0 10px 10px;
            float: left;
        }

        .test-case-line-item-number
        {
            font: 18px Arial, Helvetica, sans-serif;
            color: #A0975A;
            padding: 5px 10px 10px 10px;
        }

        .test-case-line-item-name
        {
            font: 18px Arial, Helvetica, sans-serif;
            color: #F6F5EB;
            width: 716px;
            margin: 5px 0 15px 0;
            padding: 10px 0 10px 10px;
            font-style: italic;
        }

        .test-case-line-item-time
        {
            font: 18px Arial, Helvetica, sans-serif;
            color: #F6F5EB;
            width: 150px;
            margin: 5px 0 15px 0;
            padding: 10px 0 10px 10px;
            font-style: italic;
        }

        .test-case-metrics
        {
            font: 14px Arial, Helvetica, sans-serif;
            color: #A0975A;
            float: right;
            margin: 15px 30px 10px 10px;
        }

        #footer
        {
            font: 9px Arial, Helvetica, sans-serif;
            font-style: italic;
            color: #A0975A;
            padding: 20px 0 0 0;
        }
    </style>

</head>
<body>
    <div class="container">
        <div id="header" class="test-fail">
            <div id="overall-test-results">
                Test Results: FAIL
            </div>

            <div id="overall-total-tests" class="center">
                Total: 46<br />
                (34.5 mSecs)
            </div>
            <div id="overall-tests-failed" class="center">
                Tests Failed: 12<br />
                (23.7%)
            </div>
            <div id="overall-tests-passed" class="center">
                Tests Passed: 34<br />
                (67.3%)
            </div>
            <br style="clear:both" />
        </div> <!-- header -->


        <div id="main-content">
        
            <div class="test-case-results">
                <div class="test-case-name"><h3>Jtf_Shape_Circle_Tests</h3></div>
                <div class="test-case-metrics">
                    Tests Failed: 2 (50.0%), Tests Passed: 2 (50.0%), Total: 4 (10.3 mSecs)
                </div>
                <table>
                    <tr class="test-case-line-item">
                        <td  class="test-case-line-item-number">
                            1.
                        </td>
                        <td>
                            <div class="test-case-line-item-name test-fail">test something 1</div>
                        </td>
                        <td>
                            <div class="test-case-line-item-time center test-fail">(23.3 mSecs)</div>
                        </td>
                    </tr>
                    <tr class="test-case-line-item">
                        <td  class="test-case-line-item-number">
                            2.
                        </td>
                        <td>
                            <div class="test-case-line-item-name test-fail">test something 2</div>
                        </td>
                        <td>
                            <div class="test-case-line-item-time center test-fail">(61.3 mSecs)</div>
                        </td>
                    </tr>
                    <tr class="test-case-line-item">
                        <td  class="test-case-line-item-number">
                            3.
                        </td>
                         <td>
                            <div class="test-case-line-item-name test-pass">test something 3</div>
                        </td>
                        <td>
                            <div class="test-case-line-item-time center test-pass">(4.2 mSecs)</div>
                        </td>
                    </tr>
                    <tr class="test-case-line-item">
                        <td  class="test-case-line-item-number">
                            4.
                        </td>
                         <td>
                            <div class="test-case-line-item-name test-pass">test something 4</div>
                        </td>
                        <td>
                            <div class="test-case-line-item-time center test-pass">(1.3 mSecs)</div>
                        </td>
                    </tr>
                </table>
            </div> <!-- test-case-results -->


            <div class="test-case-results">
                <div class="test-case-name"><h3>Jtf_Shape_Square_Tests</h3></div>
                <div class="test-case-metrics">
                    Tests Failed: 2 (50.0%), Tests Passed: 2 (50.0%), Total: 4 (10.3 mSecs)
                </div>
                <table>
                    <tr class="test-case-line-item">
                        <td  class="test-case-line-item-number">
                            1.
                        </td>
                        <td>
                            <div class="test-case-line-item-name test-pass">test something 1</div>
                        </td>
                        <td>
                            <div class="test-case-line-item-time center test-pass">(23.3 mSecs)</div>
                        </td>
                    </tr>
                    <tr class="test-case-line-item">
                        <td  class="test-case-line-item-number">
                            2.
                        </td>
                        <td>
                            <div class="test-case-line-item-name test-fail">test something 2</div>
                        </td>
                        <td>
                            <div class="test-case-line-item-time center test-fail">(61.3 mSecs)</div>
                        </td>
                    </tr>
                    <tr class="test-case-line-item">
                        <td  class="test-case-line-item-number">
                            3.
                        </td>
                         <td>
                            <div class="test-case-line-item-name test-pass">test something 3</div>
                        </td>
                        <td>
                            <div class="test-case-line-item-time center test-pass">(4.2 mSecs)</div>
                        </td>
                    </tr>
                    <tr class="test-case-line-item">
                        <td  class="test-case-line-item-number">
                            4.
                        </td>
                         <td>
                            <div class="test-case-line-item-name test-pass">test something 4</div>
                        </td>
                        <td>
                            <div class="test-case-line-item-time center test-pass">(1.3 mSecs)</div>
                        </td>
                    </tr>
                </table>
            </div> <!-- test-case-results -->





        </div> <!-- main-content -->


        <div id="footer">
            KissTest &copy; 2011 Joe Fallon, All Rights Reserved.
        </div> <!-- footer -->
    </div>
</body>
</html>