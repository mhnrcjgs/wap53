<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-hover" style="width: 100%">
    <thead>
    <tr>
        <th style="width: 20%">Company Name</th>
        <th style="width: 10%">Phone 1</th>
        <th style="width: 10%">Phone 1 (Clean)</th>
        <th style="width: 10%">Phone 2</th>
        <th style="width: 10%">Phone 2 (Clean)</th>
        <th style="width: 10%">Phone 3</th>
        <th style="width: 10%">Phone 3 (Clean)</th>
        <th style="width: 10%">Phone 4</th>
        <th style="width: 10%">Phone 4 (Clean)</th>
    </tr>
    </thead>
    <tbody>
    @if(count($directories))
        @foreach($directories as $directory)
            <tr>
                <td>{{ $directory->company_name }}</td>
                <td>{{ $directory->phone_1 }}</td>
                <td>{{ $directory->phone_1_clean }}</td>
                <td>{{ $directory->phone_2 }}</td>
                <td>{{ $directory->phone_2_clean }}</td>
                <td>{{ $directory->phone_3 }}</td>
                <td>{{ $directory->phone_3_clean }}</td>
                <td>{{ $directory->phone_4 }}</td>
                <td>{{ $directory->phone_4_clean }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6">No records found</td>
        </tr>
    @endif
    </tbody>
</table>
{!! $directories->render() !!}
</body>
</html>


