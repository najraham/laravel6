@extends('layouts.app')

@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Users</h2>
            </div>

            <div class="row">
                <div class="row justify-content-end">
                    <a href="{{ route('add_user') }}" class="btn btn-success col-md-2 m-3">Add User</a>
                </div>
                <div class=" pt-4 pt-lg-0 content text-center">
                    <div class="row">
                        <table class="table table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Admin</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $key => $user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->is_admin)
                                                <h3 class="bx bx-check-circle text-success"></h3>
                                            @else
                                                <h3 class="bx bx-x-circle text-danger"></h3>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit_user', $user->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No users yet</p>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
