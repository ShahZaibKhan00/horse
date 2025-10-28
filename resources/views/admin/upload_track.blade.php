<form action="{{ route('track.upload') }}" method="POST">
    @csrf
    <div>
        <label for="track_name">Track Name:</label>
        <input type="text" id="track_name" name="track_name" required>
    </div>
    <div>
        <label for="artist_name">Artist Name:</label>
        <input type="text" id="artist_name" name="artist_name" required>
    </div>
    <button type="submit">Upload Track</button>
</form>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif