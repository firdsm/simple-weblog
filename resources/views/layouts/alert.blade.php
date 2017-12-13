@if($flash = session('message'))
    <div id="flash-message" class="alert alert-success">
          {{ $flash }}
    </div>
@endif

@if($flash = session('message-error'))
    <div id="flash-message" class="alert alert-danger">
          {{ $flash }}
    </div>
@endif