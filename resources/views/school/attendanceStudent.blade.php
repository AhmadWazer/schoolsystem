<x-sidebar />
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


<div class="content-wrapper">
    <div class="container mt-2 d-flex ">
        <div class="card col-2 m-2">
            <div class="card-header">Select Class</div>
            <div class="card-body">
                <select id="selectClass" class="btn btn-success m-2">
                    @php
                        $classes = DB::table('classes')->get();
                    @endphp
                    <option value="">Select Class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->c_name }}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <!-- select month-->
        <div class="card col-2 m-2">
            <div class="card-header">Select Month</div>
            <div class="card-body">
                <!-- <label for="selectMonth">Select Month:</label> -->
                <select id="selectMonth" class="btn btn-success m-2">
                    <option value="">Select Month:</option>
                    @for($month = 1; $month <= 12; $month++)
                        @php
                          $monthValue = sprintf("%02d", $month);
                        @endphp
                    <option value="{{ $monthValue }}">
                           {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                    </option>
                    @endfor
                </select>
            </div>
        </div>
        <!--year  -->
        <div class="card col-2 m-2">
            <div class="card-header">Select Year</div>
            <div class="card-body">
                <select id="selectYear" class="btn btn-success m-2">
                     <option value="">Select Year</option>
                     @for($year = 2020; $year <= 2040; $year++)
                        <option value="{{ $year }}" >
                         <!-- {{ $year == date('Y') ? 'selected' : '' }} -->
                          {{ $year }}
                        </option>
                     @endfor
                </select>
            </div>
        </div>
    </div>
        <!-- year -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="bg-danger col-2 text-center m-2 text-white">Absent</div>
                <div class="bg-success col-2 text-center m-2 text-white">Prasent</div>
                <div class="bg-secondary col-2 text-center m-2 text-white">Default</div>
            </div>
            <div class="card-body">
                <div id='dataList'></div>
                <!-- neww table -->
                <table id="monthDates">
                    <thead>
                       <tr id="day"></tr> <!-- Header will be generated dynamically -->
                    </thead>
                    <tbody id="studentAttendance"></tbody> <!-- Attendance rows will be filled dynamically -->
                </table>
                <!-- new table -->
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    function loadAttendance() {
        let selectedMonth = $('#selectMonth').val();
        let selectedYear = $('#selectYear').val();
        let selectedClass = $('#selectClass').val();

        if (!selectedMonth || !selectedYear || !selectedClass) return;

        let selectedMonthName = moment(selectedYear + '-' + selectedMonth, 'YYYY-MM').format('MMMM');
        let daysInMonth = moment(selectedYear + '-' + selectedMonth, 'YYYY-MM').daysInMonth();

        // Update header
        $('#day').empty();
        $('#day').append('<th class="text-center">' + selectedMonthName + ' ' + selectedYear + '</th>');
        for (let day = 1; day <= daysInMonth; day++) {
            $('#day').append('<th class="border p-2">' + day + '</th>');
        }

        // Fetch attendance
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "/studAttendanceA",
            method: 'POST',
            data: {
                month: selectedMonth,
                year: selectedYear,
                class_id: selectedClass
            },
            success: function(data) {
                $('#studentAttendance').empty();
                $.each(data, function(index, student) {
                    let row = '<tr>';
                    row += '<td>' + student.name + '</td>';

                    for (let day = 1; day <= daysInMonth; day++) {
                        let dayStr = day < 10 ? '0' + day : day;
                        let fullDate = selectedYear + '-' + selectedMonth + '-' + dayStr;

                        let attendance = student.attendance[fullDate];
                        let color = 'gray';
                        if (attendance === 'prasent') color = 'green';
                        else if (attendance === 'absent') color = 'crimson';

                        row += '<td class="border p-2" style="background-color:' + color + '"></td>';
                    }

                    row += '</tr>';
                    $('#studentAttendance').append(row);
                });
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }

    // Trigger on change of any dropdown
    $('#selectMonth, #selectYear, #selectClass').change(loadAttendance);

});

</script>
<x-footer />
