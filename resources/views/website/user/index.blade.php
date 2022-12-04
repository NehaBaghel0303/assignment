@extends('backend.layout.app')
@section('section')
    <div class="container mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>Dob</th>
                    <th>Created aT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as  $user)
                    <tr>
                        <td><a href="">{{ $user }}</a></td>
                        {{-- <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->created_at }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script type="text/javascript">
 
</script>