<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@include('policyPackage::admin.errors')

<form action="{{route('policyPackage.store')}}" method="post">
    @csrf
    <input type="text" name="title" placeholder="Enter your Title"><br>
    <button type="submit">Submit</button>
</form>

</body>
</html>