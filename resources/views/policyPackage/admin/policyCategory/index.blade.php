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
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        @foreach($policyCategories as $policyCategory)
            <tr>
                <td>{{$policyCategory->id}}</td>
                <td>{{$policyCategory->title}}</td>
                <td><a href="{{route('policyPackage.edit', [$policyCategory->id])}}">Edit</a></td>
                <td>
                    <form method="post" action="{{route('policyPackage.delete')}}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$policyCategory->id}}">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

</body>
</html>