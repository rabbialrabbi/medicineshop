<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        h1 {
            color: #ff7700;
        }
        p {
            color: #343a40;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            padding-top: 20px;
            text-align: center;
            color: #343a40;
        }

        td, th {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: lightyellow;
        }
    </style>
</head>
<body>
<h1 style="text-align: center;margin: 0">{{$show['name']}}</h1>
<p style="text-align: center;margin: 0">Medicine Shop Bangladesh</p>
<table>
    <tr>
        <th>Company</th>
        <th>Status</th>
    </tr>

    @foreach($show['data'] as $d)
        <tr>
            <td>{{$d->name}}</td>
            <td>{{$d->status}}</td>
        </tr>
        @endforeach
</table>
</body>
</html>
