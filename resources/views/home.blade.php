<x-sidebar />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<!-- Content wrapper -->
<style>
    .hover-text:hover {
      color: #0051d3ff;
    }
  </style>
@if(Auth::user()->role== 'admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class=" col-12">
            <div class="row">
                <div class=" col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <!-- <div class="avatar flex-shrink-0"> -->
                                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded"
                                    style="width:60px">
                                    <i class="bi bi-person-fill"></i>
                                    <!-- <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                    class="rounded" /> -->
                                </div>
                                <a class="dropdown-item-end btn hover-text" type="button" href="/student"> View</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span class="fw-semibold fs-3"><strong>Students</strong></span>
                                <h3 class="card-title mb-0"><strong>{{ count($show) }}</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded"
                                    style="width:60px">
                                    <i class="bi bi-person-bounding-box"></i>
                                    <!-- <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                    class="rounded" /> -->
                                </div>
                                <a class="dropdown-item-end hover-text btn" type="button" href="/teacher"> View</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span class="fw-semibold fs-3"><strong>Teachers</strong></span>
                                <h3 class="card-title mb-0"><strong>{{ count($teach) }}</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded"
                                    style="width:60px">
                                    <i class="bi bi-book"></i>
                                    <!-- <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> -->
                                </div>
                                <a class="dropdown-item-end hover-text btn" type="button" href="/subject"> View</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span class="fw-semibold fs-3"><strong>Subjects</strong></span>
                                <h3 class="card-title mb-0"><strong>{{ count($sub) }}</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded"
                                    style="width:60px">
                                    <i class="bi bi-justify-left"></i>
                                    <!-- <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                    class="rounded" /> -->
                                </div>
                                <a class="dropdown-item-end hover-text btn" type="button" href="/class"> View</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span class="fw-semibold fs-3"><strong>Classes</strong></span>
                                <h3 class="card-title mb-0"><strong>{{ count($class) }}</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-12">
            <div class="row">
                <div class=" col-3 mb-4" style="margin-left:375px">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded"
                                    style="width:60px">
                                    <i class="bi bi-person-circle"></i>
                                    <!-- <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" 
                                    class="rounded" />-->
                                </div>
                                <a class="dropdown-item-end hover-text btn" type="button" href="/parent"> View</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span class="fw-semibold fs-3"><strong>Parents</strong></span>
                                <h3 class="card-title mb-0"><strong>{{ count($parent) }}</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endif
@if(Auth::user()->role=='teacher')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class=" col-12">
            <div class="row">
                <div class=" col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <!-- <div class="avatar flex-shrink-0"> -->
                                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded"
                                    style="width:40px">
                                    <i class="bi bi-person-fill"></i>
                                    <!-- <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                    class="rounded" /> -->
                                </div>
                                <a class="dropdown-item-end btn" type="button" href="#"> View</a>
                            </div>
                            <span class="fw-semibold d-block mb-1">Students</span>
                            <h3 class="card-title mb-2">
                                <!--  -->
                                @php
                                    $teacherClassIds = explode(',', Auth::user()->assign_class);
                                    $totalStudents = DB::table('users')->where('role', 'student')
                                    ->whereIn('student_class', $teacherClassIds)
                                    ->count();
                                @endphp
                                {{ $totalStudents }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class=" col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded"
                                    style="width:40px">
                                    <i class="bi bi-book"></i>
                                    <!-- <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> -->
                                </div>
                                <a class="dropdown-item-end btn" type="button" href="#"> View</a>
                            </div>
                            <span class="fw-semibold d-block mb-1">Subjects</span>
                            <h3 class="card-title text-nowrap mb-2">
                                @php
                                    $teacherSubIds = explode(',', Auth::user()->assign_subject);
                                    $totalSub = DB::table('subjects')->whereIn('id', $teacherSubIds)
                                    ->count();
                                @endphp
                                {{ $totalSub }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class=" col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded"
                                    style="width:40px">
                                    <i class="bi bi-justify-left"></i>
                                    <!-- <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                    class="rounded" /> -->
                                </div>
                                <a class="dropdown-item-end btn" type="button" href="#"> View</a>
                            </div>
                            <span class="fw-semibold d-block mb-1">Classes</span>
                            <h3 class="card-title mb-2">
                                @php
                                    $teacherClass = explode(',', Auth::user()->assign_class);
                                    $totalClass = DB::table('classes')->whereIn('id', $teacherClass)
                                    ->count();
                                @endphp
                                {{ $totalClass }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" col-12">
            <div class="row ">
                <div class=" col-4 mb-4">
                    <div class="card text-center pb-3">
                        <h5 class="card-header">Attrendance</h5>
                        <div class="table-responsive text-nowrap pt-3">
                            <div class="card-body">
                                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Class
                                </button>
                                @php
                                    $attend = explode(',', Auth::user()->assign_class);
                                    $attendclass = DB::table('classes')->whereIn('id', $attend)
                                    ->get();
                                @endphp
                                
                                <ul class="dropdown-menu">
                                @foreach($attendclass as $attn)
                                    <li><a class="dropdown-item" href="{{url('/studentattend',$attn->id)}}">{{$attn->c_name}}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-8 mb-4">
                    <div class="card text-center pb-3">
                        <div class="table-responsive text-nowrap pt-3">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>
                                                @php
                                                    $teacherSubIds = explode(',', Auth::user()->assign_subject);
                                                    $subCode = DB::table('subjects')->where('id', $teacherSubIds)
                                                    ->value('s_code');
                                                @endphp
                                                {{ $subCode }}
                                            </strong></td>
                                        <td>
                                            @php
                                                $teacherSubIds = explode(',', Auth::user()->assign_subject);
                                                $subName = DB::table('subjects')->where('id', $teacherSubIds)
                                                ->value('s_name');
                                            @endphp
                                            {{ $subName }}
                                        </td>
                                        <td>
                                            @php
                                                $teacher = explode(',', Auth::user()->email);
                                                $teacherName = DB::table('users')->whereIn('email',$teacher)
                                                ->value('name');
                                            @endphp
                                            {{ $teacherName }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Auth::user()->role == 'student')
            <div class="col-12">
                <div class="container mt-4 ">
                    <div class="card text-center">
                        <div class="card-header">
                            Student Details
                        </div>
                        @php
                            $student = explode(',', Auth::user()->email);
                            $studentName = DB::table('users')->whereIn('email',$student)
                            ->get();
                            $stdclass = DB::table('classes')
                        @endphp
                        @foreach($studentName as $stdname)
                            <div class="card-body">
                                <h5 class="card-title"><strong>Student Name:</strong> {{ $stdname->name }}</h5>
                                <h5 class="card-title"><strong>Student Email:</strong> {{ $stdname->email }}</h5>
                                <h5 class="card-title"><strong>Student Password:</strong> {{ $stdname->password }}
                                </h5>
                                <h5 class="card-title"><strong>Student Roll-Number:</strong>
                                    {{ $stdname->roll_number }}</h5>
                                <h5 class="card-title"><strong>Student Phone:</strong> {{ $stdname->phone }}</h5>
                                <h5 class="card-title"><strong>Student DOB:</strong> {{ $stdname->dob }}</h5>
                                <h5 class="card-title"><strong>Student Gender:</strong> {{ $stdname->gender }}</h5>
                                <h5 class="card-title"><strong>Student current_address:</strong>
                                    {{ $stdname->current_address }}</h5>
                                <h5 class="card-title"><strong>Student permanent_address:</strong>
                                    {{ $stdname->permenent_address }}</h5>
                                <h5 class="card-title"><strong>Assign Class:</strong>
                                    @php
                                        $stdclass = explode(',', Auth::user()->student_class);
                                        $stdclassname = DB::table('classes')->whereIn('id',$stdclass)
                                        ->value('c_name');
                                    @endphp
                                    {{ $stdclassname }}
                                </h5>
                                <h5 class="card-title"><strong>Student Parent:</strong>
                                    @php
                                        $stdparent = explode(',', Auth::user()->student_parent);
                                        $stdparentname = DB::table('users')->whereIn('id',$stdparent)
                                        ->value('name');
                                    @endphp
                                    {{ $stdparentname }}
                                </h5>
                                <h5 class="card-title"><strong>Student Image:</strong> {{ $stdname->image }}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class=" col-12">
                <div class="container mt-4 ">
                <div class="card text-center">
                        <div class="card-header">
                            Student Courses & Teachers
                        </div>
                    <div class="table-responsive text-nowrap pt-3">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                </tr>
                            </thead>

                            @php
                                $studentClassIds = explode(',', Auth::user()->student_class);

                                $teachers = DB::table('users')
                                ->where('role', 'teacher')
                                ->where(function ($query) use ($studentClassIds) {
                                foreach ($studentClassIds as $classId) {
                                $query->orWhereRaw('FIND_IN_SET(?, assign_class)', [$classId]);
                                }
                                })
                                ->get();
                                $subjectIds = [];
                                foreach ($teachers as $teacher) {
                                $subjectIds = array_merge($subjectIds, explode(',', $teacher->assign_class));
                                }

                                $subjects = DB::table('subjects')->whereIn('id', $subjectIds)->get();

                                // Now you have the list of teachers and subjects associated with the student
                            @endphp

                            @foreach($subjects as $subject)
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            {{ $subject->s_code }}</td>
                                        <td>{{ $subject->s_name }}</td>
                                        <td>
                                            @foreach($teachers as $teacher)
                                                @if(in_array($subject->id, explode(',', $teacher->assign_subject)))
                                                    {{ $teacher->name }},
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                            <!-- (in_array($subject->id, explode(',', $teacher->assign_class))) -->
                        </table>
                    </div>
                </div>
            </div>
                            </div>
    <!-- Attendance -->
    
@endif

@if(Auth::user()->role == 'parent')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="clo-12">
            <div class="row">
                <div class="col-4"></div>
                <!-- <div class=" col-5 mb-4"> -->
                    <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card shadow-lg">
                        <div class="card-header">Total Childrens</div>
                        @php
                            $child = explode(',',Auth::user()->id);
                            $pchild = DB::table('users')->where('role','student')
                            ->whereIn('student_parent',$child)->get();
                            $childsum = count($pchild);
                        @endphp
                        <div class="card-body text-center">
                            <h2><strong>Childrens:</strong> {{ $childsum }}</h2>
                            <div class="d-flex justify-content-center">
                                <!-- select student to desplay ther details -->
                            <select class="btn btn-success ms-3" name="" id="pChild">
                                <option value="">ShowStudent</option>
                                @foreach($pchild as $child)
                                <option value="{{$child->id}}">{{$child->name}}</option>
                                @endforeach
                            </select>
                            <!-- attebdance -->
                            <select class="btn btn-success ms-3" name="" id="studentAttn">
                                <option value="">ShowAttendance</option>
                                @foreach($pchild as $child)
                                <option value="{{$child->id}}">{{$child->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                            <!-- student details -->
    <div class="col-12"  id="studentData">
     <!-- students details display here -->
    </div>
<!-- attendance -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="clo-12" >
            <div class="card pb-3" >
                <div class="card-header">
                    Student Attendance
                </div>
                <div class="table-responsive text-center text-nowrap pt-3">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="studentAttend">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Attendance -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#pChild").on('change',function(e){
            e.preventDefault();
            let studentId = $(this).val();
            let parentId = $('id').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/studentData', // Update the URL to your search endpoint
                method: 'post',
                data: {
                    studentId: studentId,
                    parentId: parentId
                },
                
                success: function (data) {
                    // Get the table body
                    var tableBody = $('#studentData');
                    tableBody.empty();  // Clear existing rows

                    $.each(data, function (index, student) {
                        var newRow = `
        <div class="container mt-4 ">
            <div class="card">
                <div class="card-header">
                    Student Details
                </div>
                <div class="card-body">
                    <h5 class="card-title"><strong>Student Name:</strong> ${student.name}</h5>
                    <h5 class="card-title"><strong>Student Email:</strong> ${student.email} </h5>
                    <h5 class="card-title"><strong>Student Password:</strong>  ${student.password} </h5>
                    <h5 class="card-title"><strong>Student Roll-Number:</strong>  ${student.roll_number} </h5>
                    <h5 class="card-title"><strong>Student Phone:</strong>  ${student.phone} </h5>
                    <h5 class="card-title"><strong>Student DOB:</strong>  ${student.dob}</h5>
                    <h5 class="card-title"><strong>Student Gender:</strong>  ${student.gender} </h5>
                    <h5 class="card-title"><strong>Student current_address:</strong>  ${student.current_address}
                    </h5>
                    <h5 class="card-title"><strong>Student permanent_address:</strong>  ${student.permenent_address}
                    </h5>
                    <h5 class="card-title"><strong>Assign Class:</strong>  ${student.class_name}</h5>
                    <h5 class="card-title"><strong>Student Parent:</strong>  ${student.parent_name} </h5>
                    <h5 class="card-title"><strong>Student Image:</strong>  ${student.image} </h5>
                </div>
            </div>
        </div>`;
                        
                        tableBody.append(newRow);
                    });
                },
            });
        });
    });
// this ajax for show student attendance
$(document).ready(function(){
    $('#studentAttn').on('change',function(e){
        e.preventDefault();
        let attend = $(this).val();

        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/studAttendanceP', // Update the URL to your search endpoint
                method: 'post',
                data: {
                    attend: attend
                },
                success: function (data) {
                    // Get the table body
                    var tableBody = $('#studentAttend').html('');
                    // tableBody.empty();  // Clear existing rows

                    $.each(data, function (index, studentAttendance) {
                        var newRow = `
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>${studentAttendance.attend_date}</strong></td>
                                    <td>${studentAttendance.class_name}</td>
                                    <td>${studentAttendance.subject_name}</td>
                                    <td>${studentAttendance.teacher_name}</td>
                                    <td style="color: ${studentAttendance.attend === 'prasent' ? 'green' : 'red'}">${studentAttendance.attend}</td>
                                </tr>`;
                        tableBody.append(newRow);
                    });
                },
        });
    });
});
</script>

@endif
<x-footer />
