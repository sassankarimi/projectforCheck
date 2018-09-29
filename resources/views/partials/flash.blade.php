
@if(session()->has('flash_message'))
    <script>
        swal({
            title: "{{session('flash_message.title')}}",
            text: "{{session('flash_message.message')}}",
            icon: "{{session('flash_message.level')}}",
            timer: "3000",
            button: false,
        });
    </script>
@endif
@if(session()->has('flash_message_overlay'))
    <script>
        swal({
            title: "{{session('flash_message_overlay.title')}}",
            text: "{{session('flash_message_overlay.message')}}",
            icon: "{{session('flash_message_overlay.level')}}",
            button: "Aww yiss!",
        });
    </script>
@endif