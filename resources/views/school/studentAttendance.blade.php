<x-sidebar />
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container mt-3 ms-2">
        <h3> Attendance</h3>
    </div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <form method="post" action="{{ route('save.stdatten') }}">
            @csrf
                <div class="col-2 mb-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text bg-info" id="addon-wrapping">Date</span>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" placeholder="Class" 
                                   aria-label="Username" aria-describedby="addon-wrapping" readonly >
                    </div>
                </div>
            <div class="card">
                @php
                    $classname = explode(',', $value->id);
                    $classn = DB::table('classes')->where('id',$classname)->get();
                @endphp
                @foreach($classn as $clas)
                    <input type="hidden" name="class" value="{{ $clas->id }}" />
                    <h5 class="card-header"><strong>Class Name: </strong>{{ $clas->c_name }}</h5>
                @endforeach
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Count</th>
                                <th>Student</th>
                                <th>Subject-Code</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        @php
                            $classdata = explode(',', $value->id);
                            $cstudent = DB::table('users')->where('student_class',$classdata)->get();
                            $studentsub = DB::table('users')->whereRaw('FIND_IN_SET(?, assign_class)',
                            [$classdata])->pluck('assign_subject');
                            $stdsubject = DB::table('subjects')->whereIn('id',$studentsub)->get();
                            $teacher =  DB::table('users')->whereRaw('FIND_IN_SET(?, assign_class)',
                            [$classdata])->get();
                                
                                  $teacher = explode(',', Auth::user()->email);
                                    $teacherName = DB::table('users')->whereIn('email',$teacher)
                                  ->value('id');
                            
                        @endphp
                        <input type="hidden" name="teacherId" value="{{$teacherName}}">
                        @foreach($cstudent as $index => $student)
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $index + 1 }}</strong>
                                    </td>
                                    
                                    <td>
                                    <input type="hidden" name="student[]" value="{{ $student->id }}"/>
                                    {{ $student->name }}    
                                    </td>
                                    @foreach($stdsubject as $subject)
                                        <!-- (Auth::user()->role == 'teacher' && in_array($subject->id, explode(',', Auth::user()->assign_subject))) -->
                                        @if(Auth::user()->role == 'teacher' && in_array($subject->id, explode(',', Auth::user()->assign_subject)))
                                            <input type="hidden" name="subject" value="{{ $subject->id }}" />
                                            <td>{{ $subject->s_code }} </td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <div class="col-md d-flex">
                                            <div class="form-check mt-3">
                                                <input name="attend[{{ $student->id }}]" class="form-check-input"
                                                    type="radio" value="prasent" id="" required/>
                                                <label class="form-check-label" for="defaultRadio1"> Prasent </label>
                                            </div>
                                            <div class="form-check mt-3 ms-2">
                                                <input name="attend[{{ $student->id }}]" class="form-check-input"
                                                    type="radio" value="absent" id="" required/>
                                                <label class="form-check-label" for="defaultRadio1"> Absent </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
                <!-- success and error alert message for Attendance -->
                                      {{-- Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                                         {{-- Error Message --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- success and error alert message for Attendance -->
            <div class="mt-2">
                <button type="submit" class="btn btn-primary send-btn">Save</button>
                <a href="/home" type="button" class="btn btn-dark">Back</a>
            </div>
        </form>
    </div>
</div>

<x-footer />
