<x-sidebar />
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Subject Table</h4>

        <!-- button -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/subject/addedit">Add Subject</a>
        </div><br>
        <!-- button -->
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Subject</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Teacher</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach($value as $sub)
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td><strong>{{ $sub->s_name }}</strong></td>
                                <td>{{ $sub->s_code }}</td>
                                <td>{{ $sub->teacher ? $sub->teacher->name : 'No Teacher Assigned' }}</td>
                                <td>{{ $sub->s_description }}</td>
                                <td>
                                     <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <div class="d-flex">
                                                <a class="dropdown-item" href="{{route('subject.edit', $sub->id) }}"><i
                                                        class="bx bx-edit-alt me-1">Edit</i> 
                                                    </a>
                                                <a class="dropdown-item" href="{{route('subject.delete', $sub->id) }}"><i
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
        <!--/ Basic Bootstrap Table -->
    </div>
</div>
<x-footer />
