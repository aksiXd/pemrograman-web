<x-user-base>
    <x-slot:content>

        <x-navbar />

        <!-- Begin Page Content -->
        <div class="container">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-center mb-5 mt-5">
                <h1 class="h3 mb-0 text-gray-800">Selamat datang {{ Session::get('username') }} pada hari
                    {{ $today }}</h1>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="ml-5 btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Guestbook
                    </button>
                </div>
                <div class="col-md-9">
                    @if (Session::get('error'))
                        <div class="m-0 alert alert-danger" role="alert">
                            Gagal menambah Guest Book
                        </div>
                    @endif
                    @if (Session::get('deleteSuccess'))
                        <div class="m-0 alert alert-success" role="alert">
                            Berhasil menghapus guest book
                        </div>
                    @endif
                    @if (Session::get('addSuccess'))
                        <div class="m-0 alert alert-success" role="alert">
                            Berhasil menambah guest book
                        </div>
                    @endif
                    @if (Session::get('saveSuccess'))
                        <div class="m-0 alert alert-success" role="alert">
                            Berhasil mengubah guest book
                        </div>
                    @endif
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Guestbook</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addGuestBook') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name"
                                        aria-describedby="emailHelp" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="address"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <input type="text" class="form-control" id="message" name="message" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table m-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date Posted</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guestBooks as $guestBook)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $guestBook->name }}</td>
                            <td>{{ $guestBook->email }}</td>
                            <td>{{ $guestBook->address }}</td>
                            <td>{{ $guestBook->city }}</td>
                            <td>{{ $guestBook->message }}</td>
                            <td>{{ $guestBook->posted }}</td>
                            <td>
                                <a href="{{ route('updateGuestBook', $guestBook->id) }}"
                                    class="btn btn-warning">Edit</a>
                                <a href="{{ route('deleteGuestBook', $guestBook->id) }}"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- /.container-fluid -->
    </x-slot:content>
</x-user-base>
