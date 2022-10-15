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

<table border="1px">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Policy Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        @foreach($policies as $policy)
            <tr>
                <td>{{$policy->id}}</td>
                <td>{{$policy->title}}</td>
                <td>{{$policy->description}}</td>
                <td>{{$policy->policyCategory->title}}</td>
                <td><a href="{{route('policy.edit', [$policy->id])}}">Edit</a></td>
                <td>
                    <form method="post" action="{{route('policy.delete')}}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$policy->id}}">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

</body>
</html>