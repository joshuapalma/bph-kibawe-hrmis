<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center lh-1">Republic of the Philippines</p>
                <p class="text-center font-weight-bold lh-1">Province of Bukidnon</p>
                <p class="text-center lh-1">Provincial Capitol</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center font-weight-bold lh-1">MONTHLY TARDY AND UNDERTIME SUMMARY REPORT</p>
                <p class="text-center lh-1">For the month of {{ date('M Y') }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <h6 class="font-weight-bold text-center lh-1">OFFICE: BUKIDNON PROVINCIAL HOSPITAL - KIBAWE (REGULAR)</h6>
        </div>
        <br>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="text-center">
                    <th rowspan="2">#</th>
                    <th rowspan="2">Name</th>
                    <th rowspan="2">Designation</th>
                    <th rowspan="2">No. of times Tardy</th>
                    <th rowspan="2">No. of times Undertime</th>
                    <th colspan="2">Total No. of</th>
                </tr>
                    <tr>
                        <th>Hours</th>
                        <th>Minutes</th>
                    </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->designation }}</td>
                        <td>{{ $row->tardy }}</td>
                        <td>{{ $row->undertime }}</td>
                        <td>{{ $row->hours }}</td>
                        <td>{{ $row->mins }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Data Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
            <p class="mb-5">
                Prepared by: 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Approved by:</p>
            <p class="font-weight-bold" style="line-height:5px;">
                JUNRIEL D. OCOR 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ANTONIO R. TUBOG, MD, FPSMS</p>
            <p class="font-weight-bold" style="line-height:5px;">
                Administrative Aide III 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Chief of Hospital II</p>
        </div>
    </div>
</body>
</html>
