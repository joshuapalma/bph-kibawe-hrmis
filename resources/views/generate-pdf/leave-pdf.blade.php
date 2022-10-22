<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style type="text/css">  
        table td, table th{  
            border:1px solid black;  
            padding: 7px;
            text-align: center;
        }  
    </style>  
</head>
<body>
    <div>
        <img src="./img/main-logo.jpg" alt="main_logo" style="width: 100px; height: 100px; border-radius:50px; transform:translate(600px, 50px);">
        <img src="./img/bukidnon-logo.png" alt="main_logo" style="width: 100px; height: 100px; transform:translate(-50px, 50px);">
        <div class="row" style="margin-top: -90px !important;">
            <div class="col-md-12">
                <p class="text-center">Republic of the Philippines</p>
                <p class="text-center font-weight-bold">PROVINCE OF BUKIDNON</p>
            </div>
        </div>
        <div class="row" style="border-bottom: 2px solid black;">
            <div class="col-md-12">
                <p class="text-center font-weight-bold">BUKIDNON PROVINCIAL HOSPITAL - KIBAWE</p>
                <p class="text-center" style="font-style: italic;">CM Recto Street, Palma, Kibawe, Bukidnon</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="font-weight-bold lh-1 text-center">TRANSMITTAL</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <p class="font-weight-bold lh-1">To:</p>
            </div>
            <div class="col-md-10">
                <p class="font-weight-bold" style="line-height: 5px">MARIE CARMEN C. UNABIA</p>
                <p style="line-height: 5px">PO Department Head</p>
                <p style="line-height: 5px">PEEDM Officer</p>
                <p style="line-height: 5px">PROVINCE OF BUKIDNON</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p class="font-weight-bold lh-1">Date: {{ Str::upper(date('F d, Y')) }}</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p class="font-weight-bold lh-1">Subject: APPLICATION FOR LEAVE</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p class="lh-1">Ma'am, respectfully sumitting herewith the Application for Leave of BPH-Kibawe personnel, to wit;</p>
            </div>
        </div>
        <table class="mb-5">
            <thead>
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Date of Leave</th>
                    <th scope="col">Nature of Leave</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->designation }}</td>
                        <td>{{ date('m/d/Y', strtotime($row->date_of_leave)) }}</td>
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
