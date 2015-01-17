<?php
/**
 * Created by PhpStorm.
 * User: Brycen
 * Date: 2015-01-14
 * Time: 5:39 PM
 */

$message = Session::get('message');
$error = Session::get('error');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Randomizr</title>
    {{ HTML::style('vendor/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('vendor/bootstrap/css/bootstrap-theme.min.css') }}
    {{ HTML::style('vendor/materialize/css/materialize.min.css', ['media' => 'screen,projection']) }}
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

        <div class="row message">
            <div class="col-md-12 col-sm-12 text-center">
                <?php
                if(!empty($message)) {
                    echo HTML::link("http://107.170.244.76/incoming/$message", "Here you go: $message");
                }
                if(!empty($error)) {
                    echo "Oops! " . $error;
                }
                ?>
            </div>
        </div>

        {{ Form::open(['route' => 'links.store', 'class' => 'form-horizontal']) }}

        <div class="row">
            <div class="col-md-6 col-md-offset-3 input-area z-depth-1">

            <?php
            for($i = 0; $i < 10; $i++) {
                echo "<div class='row' id='field-$i'>";
                echo "<div class='col-md-12 col-sm-12 text-center input-field'>";
                echo Form::text('links[]', null, ['class' => 'validate text-center', 'id' => 'field']);
                echo "<label for='field'>Website</label>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <span class="false-link" id="more-links">add link</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 center">
                {{ Form::submit('submit', ['class' => 'btn-large waves-effect waves-light']) }}
            </div>
        </div>



        {{ Form::close() }}

    </div>

    <input type="number" id="field-counter" value="1" style="display: none"/>

    {{ HTML::script('vendor/jquery/jquery-2.1.3.min.js'); }}
    {{ HTML::script('vendor/materialize/materialize.js'); }}
    {{ HTML::script('js/main.js'); }}
</body>
</html>