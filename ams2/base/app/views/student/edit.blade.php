@extends('layout.main')

@section('content')
@if (isset($_SESSION['errors']) && isset($_GET['msg']))
    <ul>
        @foreach ($_SESSION['errors'] as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
@endif

@if (isset($_SESSION['success']) && isset($_GET['msg']))
    <span>{{ $_SESSION['success'] }}</span>
@endif

<form action="{{ route('update', ['id' => $student->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $student->id }}">

    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ $student->name }}" required>

    <label for="year_of_birth">Year Of Birth</label>
    <input type="text" id="year_of_birth" name="year_of_birth" value="{{ $student->year_of_birth }}" required>

    <label for="phone_number">Phone Number</label>
    <input type="text" id="phone_number" name="phone_number" value="{{ $student->phone_number }}" required>

    <button type="submit" name="btn-submit" value="Cập nhật">Cập nhật</button>
</form>
@endsection
