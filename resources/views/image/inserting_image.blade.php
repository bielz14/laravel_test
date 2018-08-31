<!-- app/views/image/inserting_image.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Inserting image</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<h1>Inserting image</h1>

<!-- if there are creation errors, they will show here -->

{{ Form::open(['route' => 'image.create', 'files' => true]) }}

    <div class="form-group">
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {!! Form::label('img', 'Image:')!!}
        {!! Form::file('img')!!}
    </div>

    {{ Form::submit('Create the image', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>