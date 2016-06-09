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
        <th style="width: 100%">Phone</th>
    </tr>
    </thead>
    <tbody>
    @if(count($phones))
        @foreach($phones as $phone)
            <tr>
                <td>{{ $phone->number_clean }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6">No records found</td>
        </tr>
    @endif
    </tbody>
</table>
{!! $phones->render() !!}
</body>
</html>


