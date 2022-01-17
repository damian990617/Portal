<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    {!! meta_init() !!}
    <meta name="keywords" content="@get('keywords')">
    <meta name="description" content="@get('description')">
    <meta name="author" content="@get('author')">

    <title>@get('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    @styles()
</head>
<body>
@partial('header')

<div class="mb-3" style="margin-top: 75px">
    @content()
</div>

@partial('footer')

<script>
    let csrfToken = "{{csrf_token()}}";
</script>
@scripts()
</body>
</html>
