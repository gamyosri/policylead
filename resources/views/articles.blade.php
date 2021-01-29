<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>policylead</title>
</head>
<body class="bg-secondary ">

<nav class="navbar bg-dark navbar-dark justify-content-center">
    <a class="navbar-brand text-secondary" href="{{url("/")}}">Policylead</a>
</nav>

<div class="container mt-3 text-light">
    @foreach($articles as $article)

        <div class="card bg-dark m-3 ">
            <div class="card-header "><h4>{{ $article->title }}</h4></div>
            <div class="card-body ">
                <p>{{ $article->excerpt }} <span class="badge badge-secondary text-light" data-toggle="collapse" href="#fulltext{{ $article->id }}">show full article</span></p>
                <div class="collapse p-3 bg-light rounded " id="fulltext{{ $article->id }}">
                    <div class="container">
                    <p class=" text-dark ">{{ $article->fulltext }}</p>
                    </div>
                </div>

            </div>
            <div class="card-footer ">{{ $article->author }}</div>

        </div>

    @endforeach
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
