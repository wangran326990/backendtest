<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>REST Server Tests</title>

    <style>

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #FFF;
        margin: 40px;
        font: 16px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
        word-wrap: break-word;
    }

    a {
        color: #039;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 24px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 16px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        text-align: right;
        font-size: 16px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }
    </style>
</head>
<body>

<div id="container">
    <h1>REST Server Tests</h1>

    <div id="body">
        <p>
            The master project repository is
            <a href="https://github.com/wangran326990/backendtest" target="_blank">
                https://github.com/wangran326990/backendtest
            </a>
        </p>

        <p>
            Click on the links to check whether the REST server is working.
            API KEY IS 1234
        </p>

        <ol>
            <li><a href="<?php echo site_url('api/ChatApi/users/X-API-KEY/1234'); ?>">Get ALL Data</a> - defaulting to JSON</li>
            <li><a href="<?php echo site_url('api/ChatApi/users/X-API-KEY/1234/format/xml'); ?>">Get ALL Data</a> - format support 'json',
                'array',
                'csv',
                'html',
                'jsonp',
                'php',
                'serialized',
                'xml',</li>
            <li><a href="<?php echo site_url('api/ChatApi/users/X-API-KEY/1234/start_date/2016-02-01'); ?>">Get Data Larger than start_date 2016-02-01</a> - defaulting to JSON</li>
            <li><a href="<?php echo site_url('api/ChatApi/users/X-API-KEY/1234/end_date/2017-02-01'); ?>">Get Data smaller than end_date 2017-02-01</a> - defaulting to JSON</li>
        </ol>

    </div>

</div>

</body>
</html>
