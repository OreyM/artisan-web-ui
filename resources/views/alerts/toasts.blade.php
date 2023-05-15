@if(session('success'))
    <div>
        <toast-component :session="{{ json_encode([
            'type' => 'success',
            'payload' => session('success')
        ]) }}"/>
    </div>
@endif

@if(session('info'))
    <div>
        <toast-component :session="{{ json_encode([
            'type' => 'info',
            'payload' => session('info')
        ]) }}"/>
    </div>
@endif

@if(session('warning'))
    <div>
        <toast-component :session="{{ json_encode([
            'type' => 'warning',
            'payload' => session('warning')
        ]) }}"/>
    </div>
@endif


@if(session('error'))
    <div>
        <toast-component :session="{{ json_encode([
            'type' => 'error',
            'payload' => session('error')
        ]) }}"/>
    </div>
@endif

@if(session('errors'))
    <div>
        <toast-component :session="{{ json_encode([
            'type' => 'errors',
            'payload' => session('errors')
        ]) }}"/>
    </div>
@endif
