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
    <div>
        <img src="./img/main-logo.jpg" alt="main_logo" style="width: 100px; height: 100px; border-radius:50px; transform:translate(600px, 50px);">
        <img src="./img/bukidnon-logo.png" alt="main_logo" style="width: 100px; height: 100px; transform:translate(-50px, 50px);">
        <div class="row" style="margin-top: -90px !important;">
            <div class="col-md-12">
                <p class="text-center">Republic of the Philippines</p>
                <p class="text-center font-weight-bold">Province of Bukidnon</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center font-weight-bold">BUKIDNON PROVINCIAL HOSPITAL - KIBAWE</p>
                <p class="text-center">CM Recto Street, Palma, Kibawe, Bukidnon</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">To:</p>
            </div>
            <div class="col-md-10">
                <h6 class="font-weight-bold">MARIE CARMEN C. UNABIA</h6>
                <p class="lh-1">PO Department Head</p>
                <p class="lh-1">PEEDM Officer</p>
                <p class="lh-1">Province of Bukidnon</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">Date:</p>
            </div>
            <div class="col-md-10">
                <h6 class="lh-1">{{ date('M d, Y') }}</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">Subject:</p>
            </div>
            <div class="col-md-10">
                <h6 class="font-weight-bold lh-1">APPLICATION FOR LEAVE</h6>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p class="lh-1">Ma'am, respectfully sumitting herewith the Application for Leave of BPH-Kibawe personnel, to wit;</p>
            </div>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-info">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Date of Leave</th>
                    <th scope="col">Nature of Leave</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->designation }}</td>
                        <td>{{ $row->date_of_leave }}</td>
                        <td>{{ $row->nature_of_leave }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Data Available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
