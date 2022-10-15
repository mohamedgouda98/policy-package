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

<form action="{{route('policyPackage.update')}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$policyCategory->id}}">
    <input type="text" name="title" value="{{$policyCategory->title}}"><br>
    <button type="submit">Submit</button>
</form>

</body>
</html>