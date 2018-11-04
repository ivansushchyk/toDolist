<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Todolist</title>
    <style> .button {
            font: bold 14px Arial;
            text-decoration: none;
            background-color: #EEEEEE;
            color: #333333;
            padding: 2px 6px 2px 6px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
        }

        h1 {
            text-align: center;
        }
    </style>

</head>
<a href="/tasks/create" class="button"> Create a new Task </a>
<a href="/tasks" class="button"> Main Page </a>
<body>
<h1>
    My Todolist
</h1>
<hr>
<div class="container">
    @yield('content')
</div>
</body>
</html>
