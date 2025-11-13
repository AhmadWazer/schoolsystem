<x-sidebar />

<div class="content-wrapper">
<div class="container mt-4">
    <div class="card ">
        <div class="card-header text-center">
            Notification
        </div>
        @foreach($dsheet as $value)
            <div class="card-body yourDataElement">
                <h5 class="card-title"><strong style="color:blue">Description:</strong> {{ $value->description }}</h5>
                <h5 class="card-title"><strong style="color:blue">Class_id:</strong> {{ $value->c_name }} </h5>
                <h5 class="card-title"><strong style="color:blue">Subject_id:</strong> {{ $value->s_name }}</h5>
                <h5 class="card-title"><strong style="color:blue">Teacher_id:</strong> {{ $value->name }} </h5>
                <h5 class="card-title"><strong style="color:blue">Date:</strong> {{ $value->date }}</h5>
                <h5 class="card-title strtTime" id="strtTime"><strong style="color:blue">Start_time:</strong>
                    {{ $value->start_time }}</h5>
                <h5 class="card-title endTime" id="endTime"><strong style="color:blue">End_time:</strong>
                    {{ $value->end_time }}</h5>
            <hr style="color:green">
            </div>
        @endforeach
        <div class="col-3 m-3">
            <a href="/home" class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>
</div>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {

        var shouldBlink = false;

        var startTimeElements = $(".strtTime");
        var endTimeElements = $(".endTime");

        for (var i = 0; i < startTimeElements.length; i++) {
            var startTimeText = $(startTimeElements[i]).text();
            var endTimeText = $(endTimeElements[i]).text();

            var startTime = new Date(startTimeText);
            var endTime = new Date(endTimeText);
            // Get the current time
            var currentTime = new Date();

            // Target the specific .yourDataElement for this pair
            var currentDataElement = $(".yourDataElement").eq(i);

            // Compare current time with start and end times
            // if (currentTime >= startTime && currentTime <= endTime)
            if (currentTime <= endTime) {

                shouldBlink = true;
                currentDataElement.show();
                // alert('yes');
            } else {
                currentDataElement.hide();
                // alert('no');
            }
        }
        $(".blink-menu").toggleClass("blinking", shouldBlink);

    });

</script>

<x-footer />
