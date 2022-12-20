@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <h2>Popkoor Singing Beat Gebruikers</h2>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-responsive table-hover">
                    <tr>
                        <th>Naam</th>
                        <th>E-mail</th>
                        <th>Rol</th>
                        <th>Acties</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role == 'guest')
                                    <i class="fa fa-question" aria-hidden="true"></i>
                                @endif
                                @if($user->role == 'user')
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @endif
                                @if($user->role == 'admin')
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    @endif
                                {{ $user->role }}
                            </td>
                            <td>
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button id="id"
                                            name="id"
                                            value="{{$user->id}}"
                                            type="submit" class="btn btn-danger">
                                        Verwijder
                                    </button>
                                </form>
                                @if($user->role != 'user' && $user->role != 'admin')
                                    <form action="{{ route('users.verify-guest', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-info" href="{{ route('users.verify-guest',$user->id) }}">
                                            Verifieer
                                        </button>
                                    </form>
                                @endif
                                @if($user->role == 'user' && $user->role != 'admin')
                                    <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-info" href="{{ route('users.make-admin',$user->id) }}">
                                            Maak admin
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

