<div>
    @include('content-header', ['headerTitle' => 'Dashboard'])

    <div class="container">
        <h1>Welcome to Dashboard {{ auth()->user()->fname }}</h1>
    </div>
</div>
