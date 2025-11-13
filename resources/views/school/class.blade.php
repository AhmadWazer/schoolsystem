<x-sidebar />
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Classes Table</h4>

        <!-- button -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/class/addedit">Add Class</a>
        </div><br>
        <!-- button -->
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Class</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Numaric Name</th>
                            <th>Totel-Students</th>
                            <th>Totel-Subjects</th>
                            <th>Totel-Teachers</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach($classes as $class)
                    @php
                    $classId = explode(',', $class->id);
                    @endphp

                    <tbody class="table-border-bottom-0">
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $class->c_name }}</strong>
                                </td>
                                <td>{{ $class->c_numaric_name }}</td>
                                <!-- totel students each class have -->
                                @foreach($classId as $clas)
                                @php
                                $stdclass = DB::table('users')->whereRaw('FIND_IN_SET(?, student_class)', [$clas])->pluck('student_class');
                               $student = count($stdclass);
                                @endphp
                                <td>{{ $student }}</td>
                                @endforeach
                                <!-- totel subjects each class have -->
                                @foreach($classId as $clas)
                                @php
                                $subjects = DB::table('users')->whereRaw('FIND_IN_SET(?, assign_class)', [$clas])->get('assign_subject');
                                $subject = count($subjects) ;
                                @endphp
                                <td>{{ $subject }}</td>
                                @endforeach
                                <!-- totel teachers each class have -->
                                @foreach($classId as $clas)
                                @php
                                $teachers = DB::table('users')->whereRaw('FIND_IN_SET(?, assign_class)', [$clas])->get();
                                $teacher = count($teachers) ;
                                @endphp
                                <td>{{ $teacher }}</td>
                                @endforeach
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <div class="d-flex">
                                                <a class="dropdown-item"
                                                    href="{{ route('class.show', $class->id) }}"><i
                                                        class="bx bxs-bullseye">Show</i>
                                                    </a>
                                                <a class="dropdown-item" href="{{route('class.edit',$class->id)}}"><i
                                                        class="bx bx-edit-alt me-1">Edit</i> 
                                                    </a>
                                                <a class="dropdown-item" href="{{route('class.delete', $class->id) }}"><i
                                                        class="bx bx-trash me-1">Delete</i>
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<x-footer />
