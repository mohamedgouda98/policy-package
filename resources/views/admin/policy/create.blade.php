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

<form action="{{route('policy.store')}}" method="post">
    @csrf
    <input type="text" name="title" placeholder="Enter your Title"><br>
    <input type="text" name="description" placeholder="Enter your description"><br>
    <select name="policy_category_id">
        @foreach($policyCategories as $policyCategory)
            <option value="{{$policyCategory->id}}">{{$policyCategory->title}}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>

</body>
</html>