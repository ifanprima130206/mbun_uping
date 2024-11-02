@extends('admin.layout.main')

@section('content')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $title }}</h5>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addModal">Tambah
                    User</button>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Poin</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Role</th>
                            <th>Poin</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $value)
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->role }}</td>
                                <td>{{ $value->point }}</td>
                                <td>
                                    @if ($value->status == '0')
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    @else
                                        <span class="badge bg-success">Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark updateBtn" type="button"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        data-url="{{ route('dashboard.users.update', Crypt::encrypt($value->id)) }}"
                                        data-name="{{ $value->name }}" data-email="{{ $value->email }}"
                                        data-phone="{{ $value->phone }}" data-point="{{ $value->point }}"
                                        data-role="{{ $value->role }}" data-address="{{ $value->address }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark deleteBtn"
                                        data-name="{{ $value->name }}"
                                        data-url="{{ route('dashboard.users.destroy', Crypt::encrypt($value->id)) }}">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection