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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Randomizr</title>
    {{ HTML::style('vendor/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('vendor/bootstrap/css/bootstrap-theme.min.css') }}
    {{ HTML::style('style/main.css') }} <!-- includes normalizer and main style -->
</head>
<body>

    <div class="container">
        <div class="row title">
            <h1 class="col-lg-12 col-md-12 col-sm-12 text-center">Randomizr</h1>
            <p class="text-center">
                Generate psuedo-random forwarding links
            </p>
        </div>

        {{ Form::open(['route' => 'links.store', 'class' => 'form-horizontal']) }}
        <?php
        for($i = 0; $i < 1; $i++) {
            echo "<div class='row'>";
            echo "<div class='col-md-6 col-md-offset-3 col-sm-12 text-center'>";
            echo Form::url('links[]', null, ['class' => 'form-control input-lg text-center', 'placeholder' => 'URL']);
            echo "</div>";
            echo "</div>";
        }
        ?>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                {{ Form::submit(null, ['class' => 'btn-lg btn-success center-block']) }}
            </div>
        </div>

        {{ Form::close() }}

        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <?php
                if(!empty($message)) {
                    echo HTML::link('http://192.168.0.16/randomizr/public/incoming/' . $message);
                }
                ?>
            </div>
        </div>

    </div>

    {{ HTML::script('vendor/jquery/jquery-2.1.3.min.js'); }}
    {{ HTML::script('vendor/TextInputEffects/js/classie.js'); }}
    {{ HTML::script('js/main.js'); }}
</body>
</html>