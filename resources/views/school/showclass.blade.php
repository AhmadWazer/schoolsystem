<x-sidebar />
<div class="container mt-4">
<div class="card text-center">
  <div class="card-header">
  <h1>Class Details</h1>
  </div>
  <div class="card-body">
  <div class="d-flex flex-wrap justify-content-start gap-3 mt-3">
  <div class="card mb-3" style="width: 228px;">
    <div class="card-body text-center">
        <h5 class="card-title mb-0 text-primary">Class Name</h5>
        <p class="card-text fs-5 mt-2"><strong>{{ @$show->c_name }}</strong></p>
    </div>
  </div>
  <div class="card mb-3" style="width: 228px;">
    <div class="card-body text-center">
        <h5 class="card-title mb-0 text-primary">Class_Numaric Name</h5>
        <p class="card-text fs-5 mt-2"><strong>{{ @$show->c_numaric_name }}</strong></p>
    </div>
  </div>
  <div class="card mb-3" style="width: 228px;">
    <div class="card-body text-center">
        <h5 class="card-title mb-0 text-primary">Teacher Name</h5>
        <p class="card-text fs-5 mt-2"><strong>{{ @$show->assign_teacher }}</strong></p>
    </div>
  </div>
  <div class="card mb-3" style="width: 228px;">
    <div class="card-body text-center">
        <h5 class="card-title mb-0 text-primary">Subjects Name</h5>
                                <!-- totel subjects each class have -->
        <p class="card-text fs-5 mt-2"><strong>{{ @$show->c_description }}</strong></p>
    </div>
  </div>
  <div class="card mb-3" style="width: 228px;">
    <div class="card-body text-center">
        <h5 class="card-title mb-0 text-primary">Class Description</h5>
        <p class="card-text fs-5 mt-2"><strong>{{ @$show->c_description }}</strong></p>
    </div>
  </div>
  </div>
    <a href="/class" class="btn btn-primary">Go Back</a>

  </div>
</div>
</div>
<x-footer />
