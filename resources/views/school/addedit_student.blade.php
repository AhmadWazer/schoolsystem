<x-sidebar />
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Student </h4>
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Student Form</h5>
                    <small class="text-muted float-end">Fill with require details</small>
                </div>
                <div class="card-body">
                    <form class="" method="POST" name="form1"
                        action="{{ !empty($stdata)? route('student.update', ['id' => $stdata->id]) : route('student.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname"> Name</label>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="John Doe" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" name="sname"
                                    value="{{ @$stdata->name }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Email</label>
                            <div class="input-group input-group-merge">
                                <input type="email" id="basic-icon-default-company" class="form-control"
                                    placeholder="abc@gmail.com" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" name="semail"
                                    value="{{ @$stdata->email }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="basic-icon-default-company" class="form-control"
                                    placeholder="12345678" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" name="password"
                                    value="{{ @$stdata->password }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Roll Number</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="basic-icon-default-company" class="form-control"
                                    placeholder="Section Name" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" name="roll_number"
                                    value="{{ @$stdata->roll_number }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Phone</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="basic-icon-default-email" class="form-control"
                                    placeholder="00000000000" aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2" name="phone"
                                    value="{{ @$stdata->phone }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Gender</label>
                            <div class="input-group input-group-merge">
                                <div class="btn-group" name="gender" role="group"
                                    aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="m"
                                        autocomplete="off"
                                        {{ @$stdata->gender == 'male'? 'checked' : '' }} />
                                    <label class="btn btn-outline-primary" for="btnradio1">Male</label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="f"
                                        autocomplete="off"
                                        {{ @$stdata->gender == 'female'? 'checked' : '' }} />
                                    <label class="btn btn-outline-primary" for="btnradio2">Female</label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="o"
                                        autocomplete="off"
                                        {{ @$stdata->gender == 'others'? 'checked' : '' }} />
                                    <label class="btn btn-outline-primary" for="btnradio3">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">DOB</label>
                            <div class="input-group input-group-merge">
                                <input type="date" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="01\12\2012" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" name="dob"
                                    value="{{ @$stdata->dob }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Current Address</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="Current-Address" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" name="currentadd"
                                    value="{{ @$stdata->current_address }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Permanent Address</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="Permenent-Address" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" name="paddress"
                                    value="{{ @$stdata->permenent_address }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Assign Class</label>
                            <div class="input-group input-group-merge">
                                <select name="assign_class" id="abc" class="form-control phone-mask">
                                    <option value="{{ @$stdata->student_class }}">
                                        {{ @$stdata->student_class }}</option>
                                    @foreach($cdata as $class)
                                        <option value="{{ $class->id }}">{{ $class->c_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Student Parent</label>
                            <div class="input-group input-group-merge">
                                <select name="student_parent" id="abc" class="form-control phone-mask">
                                    <option value="{{ @$stdata->student_parent }}">
                                        {{ @$stdata->student_parent }}</option>
                                    @foreach($pdata as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Picture</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="image" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" name="picture"
                                    value="{{ @$stdata->image }}" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/student" type="button" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
