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
        <th style="width: 20%">Company</th>
        <th style="width: 16%">CSV Phone</th>
        <th style="width: 16%">Phone 1</th>
        <th style="width: 16%">Phone 2</th>
        <th style="width: 16%">Phone 3</th>
        <th style="width: 16%">Phone 4</th>
    </tr>
    </thead>
    <tbody>
    @if(count($directories))
        @foreach($directories as $phone)
            <tr>
                <td>{{ $phone->company_name }}</td>
                <td>{{ $phone->number_clean }}</td>
                <td>{{ $phone->phone_1_clean }}</td>
                <td>{{ $phone->phone_2_clean }}</td>
                <td>{{ $phone->phone_3_clean }}</td>
                <td>{{ $phone->phone_4_clean }}</td>
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


