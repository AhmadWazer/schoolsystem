<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pending</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="card text-center mt-5 pt-5 pb-5 bg-info">
    <div class="card-body mt-5 mb-5 pt-5 pb-5">
<h2 class="">Your registration is Successfull, Make sure Your e-male Address is Correct & When We Active Your Account We Send an e-male on Your e-male Address </h2>
<h4 class="text-danger">Please Wait until e-mail reseved</h4>
<!-- <h6 class="text-danger">Please Wait ...!</h6> -->
<a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="btn btn-primary">
        <i class="bx bx-power-off me-2 "></i>Go Back</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf </form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>