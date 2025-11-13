<x-sidebar />
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Parent </h4>
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Parent Form</h5>
                    <small class="text-muted float-end">Fill with require details</small>
                </div>
                <div class="card-body">
                    <form class="" method="POST" name="form1" action="{{!empty($pdata)? route('parent.update', ['id' => $pdata->id]) : route('parent.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname"> Name</label>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="John Doe" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" name="name" value="{{@$pdata->name}}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Email</label>
                            <div class="input-group input-group-merge">
                                <input type="email" id="basic-icon-default-company" class="form-control"
                                    placeholder="abc@gmail.com" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" name="email" value="{{@$pdata->email}}"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="basic-icon-default-company" class="form-control"
                                    placeholder="12345678" aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" name="password" value="{{@$pdata->password}}"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Phone</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="basic-icon-default-email" class="form-control"
                                    placeholder="00000000000" aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2" name="phone" value="{{@$pdata->phone}}"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Gender</label>
                            <div class="input-group input-group-merge">
                                <div class="btn-group" name="gender" role="group"
                                    aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="m"
                                        autocomplete="off"{{@$pdata->gender == 'male'? 'checked' : ''}} />
                                    <label class="btn btn-outline-primary" for="btnradio1">Male</label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="f"
                                        autocomplete="off" {{@$pdata->gender == 'female'? 'checked' : ''}} />
                                    <label class="btn btn-outline-primary" for="btnradio2">Female</label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="o"
                                        autocomplete="off" {{@$pdata->gender == 'others'? 'checked' : ''}}/>
                                    <label class="btn btn-outline-primary" for="btnradio3">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Current Address</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="Current-Address" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" name="caddress" value="{{@$pdata->current_address}}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Permanent Address</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="Permenent-Address" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" name="paddress" value="{{@$pdata->permanent_address}}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Picture</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="image" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" name="picture" value="{{@$pdata->image}}"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/parent" type="button" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
