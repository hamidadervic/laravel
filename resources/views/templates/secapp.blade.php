<!DOCTYPE html>
<html>
    <head>
        <title>My laravel project</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://localhost/blog/public/css/app.css">
    </head>
    <body>
        <div class="container">
             @include('inc.navbar')
             @include('inc.messages')
        </div>
        @yield('content')

    <!-- For ckeditor -->
    <script src="/blog/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    </body>
</html>
