<x-user-base>
    <x-slot:content>

        <x-navbar />

        <!-- Begin Page Content -->
        <div class="container">

            <div class="d-sm-flex align-items-center mb-5 mt-5">
                <h1 class="h3 mb-0 text-gray-800">Update Data</h1>
            </div>

            <form action="{{ route('saveGuestBook', $guestBook->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                        required value="{{ $guestBook->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" required value="{{ $guestBook->email }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="address" required
                        value="{{ $guestBook->address }}">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required
                        value="{{ $guestBook->city }}">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <input type="text" class="form-control" id="message" name="message" required
                        value="{{ $guestBook->message }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

        <!-- /.container-fluid -->
    </x-slot:content>
</x-user-base>
