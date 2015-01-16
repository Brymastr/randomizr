<?php
/**
 * Created by PhpStorm.
 * User: Brycen
 * Date: 2015-01-14
 * Time: 5:39 PM
 */

$message = Session::get('message');
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
    <?php
    if(!empty($message)) {
        echo HTML::link('http://192.168.0.16/randomizer/public/incoming/' . $message);
    }
    ?>

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