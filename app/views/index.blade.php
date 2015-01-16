<?php
/**
 * Created by PhpStorm.
 * User: Brycen
 * Date: 2015-01-14
 * Time: 5:39 PM
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Randomizr</title>
</head>
<body>
    <h1>Randomizr</h1>
    <h2>Randomizer of sites</h2>
    {{ Form::open(['route' => 'links.store']) }}
    {{ Form::url('links[]') }}
    {{ Form::url('links[]') }}
    {{ Form::url('links[]') }}
    {{ Form::url('links[]') }}
    {{ Form::url('links[]') }}
    {{ Form::submit() }}
    {{ Form::close() }}
</body>
</html>