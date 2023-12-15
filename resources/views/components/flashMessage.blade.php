<div >
    {{-- flash message for all post and comments --}}
    @if (session('success'))
        <div class="alert alert-success"  style="border-radius: 10px; w-100" role="alert">
            <p style="color:white; font-size:large;">
                {{ session('success') }}</p>
        </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#flash-message').fadeOut('slow');
        }, 10000); // <-- time in milliseconds, 10000 ms = 10 sec
    });
</script>
