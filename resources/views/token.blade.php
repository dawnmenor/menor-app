<form method="POST" action="/token">
    @csrf

    {{-- <input type="" name="_token" value="{{ csrf_token() }}" /> --}}
    Search term: <input type="text" name="term" value="" />
    <button type="submit">Go</button>
</form>
