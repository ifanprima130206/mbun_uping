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
                        @foreach ($users as $value)
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
                                    @if ($value->status == '0')
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark activatedBtn"
                                            data-url="{{ route('dashboard.users.activated', Crypt::encrypt($value->id)) }}"
                                            data-name="{{ $value->name }}">
                                            <i class="fa-regular fa-circle-check"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-datatable btn-icon btn-transparent-dark disactivatedBtn"
                                            data-url="{{ route('dashboard.users.disactivated', Crypt::encrypt($value->id)) }}"
                                            data-name="{{ $value->name }}">
                                            <i class="fa-regular fa-circle-xmark"></i>
                                        </button>
                                    @endif
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

@section('modal')
    <!-- Modal Tambah-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah {{ $title }}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama"
                                    name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Masukkan Email"
                                    name="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-2 col-form-label">Nomor WA</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="phone"
                                    placeholder="Masukkan Nomor Whatsapp" name="phone">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan Password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="role" class="col-sm-2 col-form-label" style="margin-top: -7px">Role</label>
                            <div class="col-sm-10">
                                <select name="role" class="form-select" style="width: 100%;" id="add-role"
                                    class="role">
                                    <option selected disabled>Pilih Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Pembeli</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="address" rows="5" name="address" placeholder="Masukkan Alamat"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary add" type="button"
                        data-url="{{ route('dashboard.users.store') }}"><span>Simpan</span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit {{ $title }}</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama"
                                    name="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Masukkan Email"
                                    name="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-2 col-form-label">Nomor WA</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="phone"
                                    placeholder="Masukkan Nomor Whatsapp" name="phone">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan Password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="role" class="col-sm-2 col-form-label" style="margin-top: -7px">Role</label>
                            <div class="col-sm-10">
                                <select name="role" class="form-select" style="width: 100%;" id="edit-role"
                                    class="role">
                                    <option selected disabled>Pilih Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Pembeli</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="address" rows="5" name="address" placeholder="Masukkan Alamat"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary save" type="button"><span>Simpan</span></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom')
    <script src="{{ url('assets/admin/custom/js/user.js') }}"></script>
@endpush
