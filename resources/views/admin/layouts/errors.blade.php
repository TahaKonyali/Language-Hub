@error('danger')
    <div class="alert alert-danger" role="alert">
        <button aria-label="" class="close" data-dismiss="alert"></button>
        {{ $message }}
    </div>
@enderror
@error('info')
    <div class="alert alert-info" role="alert">
        <button aria-label="" class="close" data-dismiss="alert"></button>
        {{ $message }}
    </div>
@enderror
@error('warning')
    <div class="alert alert-warning" role="alert">
        <button aria-label="" class="close" data-dismiss="alert"></button>
        {{ $message }}
    </div>
@enderror
@error('success')
    <div class="alert alert-success" role="alert">
        <button aria-label="" class="close" data-dismiss="alert"></button>
        {{ $message }}
    </div>
@enderror
