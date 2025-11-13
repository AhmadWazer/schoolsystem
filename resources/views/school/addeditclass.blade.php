<x-sidebar />
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Class </h4>
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Class Form</h5>
                    <small class="text-muted float-end">Fill with require details</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{!empty($cdata)? route('class.update', ['id' => $cdata->id]) : route('class.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Class Name</label>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="Ten" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" name="c_name" value="{{@$cdata->c_name}}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Class Numaric Name</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="basic-icon-default-company" class="form-control"
                                    placeholder="10" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" name="c_numaric_name" value="{{@$cdata->c_numaric_name}}"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Class Description</label>
                            <div class="input-group input-group-merge">
                                <textarea type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="ehrfhyjh" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" name="c_description" value="{{@$cdata->c_description}}">
                                    {{@$cdata->c_description}}</textarea>
                            </div>
                        </div>
                        <!-- all subjects -->
                        <!-- this code get all teachers in option -->
                        <!-- <div class="mb-3">
                            <label class="form-label">Assign Teacher</label>
                            <div class="input-group input-group-merge">
                                <select name="assign_teacher" class="form-control">
                                    <option value="">-- Select Teacher --</option>
                                     @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ isset($cdata) && $cdata->assign_teacher == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div> -->
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/class" type="button" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
