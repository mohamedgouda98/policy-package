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

<form action="{{route('policy.update')}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$policy->id}}">
    <input type="text" name="title" value="{{$policy->title}}"><br>
    <input type="text" name="description" value="{{$policy->description}}"><br>
    <select name="policy_category_id">
        @foreach($policyCategories as $policyCategory)
            <option
                value="{{$policyCategory->id}}"
                {{($policyCategory->id == $policy->policy_category_id)? 'selected' : ''}}
            >
                {{$policyCategory->title}}
            </option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>

</body>
</html>