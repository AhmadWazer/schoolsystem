<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<x-sidebar />
<br>

<div class="container">
    <!-- action-btn -->
    @php
    $roledata = DB::table('role')->get();
    @endphp
    <div class="d-flex justify-content-between">
            <select class="btn btn-success" name="" id="dataRole">
                <option value="">Role</option>
                @foreach($roledata as $datarol)
                <option value="{{$datarol->role_name}}">{{$datarol->role_name}}</option>
                @endforeach
            </select>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary" href="/useraccount/add-new-useraccount">Add Account</a>
    </div>
    </div>
    <br>
    <div class="card">
        <h5 class="card-header">Table Members</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="dataRoleView">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scop="col">Action</th>
                    </tr>
                </thead>
                    <tbody class="table-border-bottom-0">
                @foreach($data as $value)
                        <tr>
                            <th scope="row">{{ $value->id }}</th>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td style="color: {{ $value->role === 'admin' ? 'blue': ($value->role === 'teacher' ? 'red':
                                ($value->role === 'student' ? 'orange' :  'purple')) }}">{{ $value->role }}</td>
                            <td style="color: {{ $value->status === 'pending' ? 'red' : 'green' }}">
                            {{ $value->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a
                                            href="{{ url('/useraccount/update-useraccount',$value->id) }}"><i
                                                class="bi bi-pencil-square btn"></i></a>
                                        <a href="{{ route('useraccount.destroy',$value->id) }}"><i
                                                class="bi bi-trash-fill btn"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#dataRole").on('change',function(e){
            e.preventDefault();
            let role_id = $(this).val();
            $.ajax({
                
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/useraccountRole',
                method: 'post',
                data: {
                    role_id: role_id
                },
                success: function (data) {
                    var tableBody = $('#dataRoleView').find('tbody');
                    tableBody.empty(); 

                    $.each(data, function (index, userRole) {
                        var newRow = ` <tr>
                            <th scope="row">${userRole.id}</th>
                            <td>${userRole.name }</td>
                            <td>${userRole.email}</td>
                            <td style="color: {{ $value->role === 'admin' ? 'blue': ($value->role === 'teacher' ? 'amazon':
                                ($value->role === 'student' ? 'orange' :  'purple')) }}">${ userRole.role }</td>
                            <td style="color: {{ $value->status === 'pending' ? 'red' : 'green' }}">
                            ${ userRole.status }</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a
                                            href="{{ url('/useraccount/update-useraccount','') }}/${userRole.id}"><i
                                                class="bi bi-pencil-square btn"></i></a>
                                        <a href="{{ route('useraccount.destroy','') }}/${userRole.id}"><i
                                                class="bi bi-trash-fill btn"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                        tableBody.append(newRow);
                    });
                },
            });
        });
    });
</script>
<x-footer />
