@extends('layout.template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Type</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Project</h2>
        @if (Session::get('success'))
            <div class="alert alert-success">{{Session::get('success') }}</div>
        @endif
        @if (Session::get('deleted'))
            <div class="alert alert-success">{{Session::get('deleted') }}</div>
        @endif
        <form action="{{route('project.createProject')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Masukan Nama Project</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Tipe" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($projects as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('project.edit', $item['id'])}}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('project.delete', $item['id']) }}" method="POST">
                            @csrf 
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger">Hapus</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
