<x-sidebar />
<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container mt-3 ms-2">
        @php
            $className = DB::table('classes')->get();
            $subjectName = DB::table('subjects')->get();
        @endphp

        <h3>Attendance</h3>

        <div class="col-12 d-flex ms-5 mt-3">
            <!-- Search by Class -->
            <div class="col-2 ms-3">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text bg-info">Class</span>
                    <select class="form-control" id="selectClass">
                        <option value="">ClassName</option>
                        @foreach($className as $name)
                            <option value="{{ $name->id }}">{{ $name->c_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Search by Subject -->
            <div class="col-2 ms-5">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text bg-info">Subject</span>
                    <select class="form-control" id="selectSubject">
                        <option value="">SubjectName</option>
                        @foreach($subjectName as $name)
                            <option value="{{ $name->id }}">{{ $name->s_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Search by Date -->
            <div class="col-2 ms-5">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text bg-info">Date</span>
                    <input type="date" id="selectDate" class="form-control">
                </div>
            </div>

            <!-- Search Button -->
            <div class="col-2 ms-5">
                <div class="input-group flex-nowrap">
                    <button id="searchAttendanceBtn" class="form-control bg-info text-white">Search</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Attendance</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="tableAttnd">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Student</th>
                            <th>Class</th>
                            <th>Subject-Code</th>
                            <th>Teacher</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td colspan="6" class="text-center text-muted">No data found</td>
                        </tr>
                    </tbody>
                </table>
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
    }

    // ✅ Function to update table
    function updateTable(data) {
        var tableBody = $('#tableAttnd tbody');
        tableBody.empty();

        if (data.length === 0) {
            tableBody.append('<tr><td colspan="6" class="text-center text-muted">No records found</td></tr>');
            return;
        }

        $.each(data, function (index, attendance) {
            var newRow = `
                <tr>
                    <td>${safeValue(attendance.attend_date)}</td>
                    <td>${safeValue(attendance.student_name)}</td>
                    <td>${safeValue(attendance.class_name)}</td>
                    <td>${safeValue(attendance.subject_name)}</td>
                    <td>${safeValue(attendance.teacher_name)}</td>
                    <td style="color: ${attendance.attend === 'prasent' ? 'green' : 'red'}">
                        ${safeValue(attendance.attend)}
                    </td>
                </tr>
            `;
            tableBody.append(newRow);
        });
    }

    //  Search by Class
    // $('#selectClass').on('change', function (e) {
    //     e.preventDefault();
    //     let selectedClass = $(this).val();

    //     $.ajax({
    //         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //         url: '/cattendance',
    //         method: 'POST',
    //         data: { selectedClass: selectedClass },
    //         success: updateTable,
    //         error: function (xhr, status, error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // });

    // Search by Subject
    // $('#selectSubject').on('change', function (e) {
    //     e.preventDefault();
    //     let selectedSubject = $(this).val();
    // // console.log("Selected Subject ID:", selectedSubject); // ✅ Check value

    //     $.ajax({
    //         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //         url: '/subAttendance',
    //         method: 'POST',
    //         data: { selectedSubject: selectedSubject },
    //         success: updateTable,
    //         error: function (xhr, status, error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // });

    // Search by Class, Subject, and Date (with class filter)
    $('#searchAttendanceBtn').on('click', function (e) {
        e.preventDefault();
        let selectedDate = $('#selectDate').val();
        let selectedClass = $('#selectClass').val();
        let selectedSubject = $('#selectSubject').val();

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: '/searchAttendance',
            method: 'POST',
            data: { selectedDate: selectedDate, selectedClass: selectedClass, selectedSubject: selectedSubject },
            success: updateTable,
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });
});
</script>
<x-footer />
