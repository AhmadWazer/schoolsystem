<x-sidebar/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Attendance -->
<!-- search -->
<div class="col-12 d-flex ms-5 mt-3">
             <!-- Search by Subject -->
    <div class="col-2 ms-5">
        <div class="input-group flex-nowrap">
            <span class="input-group-text bg-info">Subject</span>
                <select class="form-control" id="searchAttendance">
                <option value="">SubjectName</option>
                @foreach($subjectName as $name)
                    <option value="{{ $name->id }}">{{ $name->s_name }}</option>
                @endforeach
                </select>
        </div>
    </div>
</div>
 <div class="col-12" id="form">
        <div class="container ">
            <div class=" mb-4 mt-4">
                <div class="card text-center pb-3">
                        <div class="card-header">
                            My Attendance
                        </div>
                    <div class="table-responsive text-nowrap pt-3">
                        <table class="table" id ='studentattends'>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Class</th>
                                    <th>Course</th>
                                    <th>Teacher</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            @foreach($attendance as $data)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg me-3"></i>
                                        <strong>{{$data->attend_date}}</strong></td>
                                    <td>{{$data->class->c_name ?? 'N/A' }}</td>
                                    <td>{{$data->subject->s_name ?? 'N/A' }}</td>  
                                    <td>{{$data->teacher->name ?? 'N/A' }}</td>
                                    <td style="color: {{$data->attend === 'prasent' ? 'green' : 'red'}}">{{$data->attend}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Combined & Cleaned AJAX Scripts -->
<script>
$(document).ready(function () {

    // ✅ Helper function to show N/A if value missing
    function safeValue(value) {
        return value ? value : 'N/A';
    }$('#searchAttendance').on('change', function (e) {
        e.preventDefault();
        let selectedSubject = $(this).val();
    // console.log("Selected Subject ID:", selectedSubject); // ✅ Check value

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: '/showstudentAttend',
            method: 'POST',
            data: { selectedSubject: selectedSubject },
            success: updateTable,
                error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });
    // ✅ Function to update table
    function updateTable(data) {
        var tableBody = $('#studentattends tbody');
        tableBody.empty();

        if (data.length === 0) {
            tableBody.append('<tr><td colspan="6" class="text-center text-muted">No records found</td></tr>');
            return;
        }

        $.each(data, function (index, searchSub) {
            var newRow = `
                <tr>
                    <td>${safeValue(searchSub.attend_date)}</td>
                    <td>${safeValue(searchSub.class_name)}</td>
                    <td>${safeValue(searchSub.subject_name)}</td>
                    <td>${safeValue(searchSub.teacher_name)}</td>
                    <td style="color: ${searchSub.attend === 'prasent' ? 'green' : 'red'}">
                        ${safeValue(searchSub.attend)}
                    </td>
                </tr>
            `;
            tableBody.append(newRow);
        });
    }
});
</script>
<x-footer/>