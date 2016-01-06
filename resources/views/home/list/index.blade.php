@extends('home.public.app')

@section('content')
<div class="row text-left">
    <a id="get_calendar_button" class="success button" href="#">取得我的日历</a>
</div>

<div class="row">
    <div class="large-6 medium-6 columns">
        <div class="callout">
            <p>Six columns</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-6 medium-6 columns">
        <div class="callout">
            <p>Six columns</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-6 medium-6 columns">
        <div class="callout">
            <p>Six columns</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-6 medium-6 columns">
        <div class="callout">
            <p>Six columns</p>
        </div>
    </div>
</div>
<script>
    $('#get_calendar_button').click(function() {
        window.open(
            "{{ url('/home/auth') }}",
            "_blank",
            "toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=650, height=600, left=360, top=85"
        );
        
        /*$.ajax({
            type: "post",
            url: "{:U('/home/auth/oauth2callback')}",
            async: true,
            dataType: "json",
            data: {
                status: 123,
            },
            success: function(data) {
                console.log(data);
            }
        });*/
    });
</script>
@endsection
