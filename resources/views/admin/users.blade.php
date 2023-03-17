<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')

  </head>
  <body>
    <div class="container-scroller">
    @include('admin.navbar')
        <div class="users_table_div">
            <table class="users_table">
                <tr>
                    <th class="users_th">Name</th>
                    <th class="users_th">Email</th>
                    <th class="users_th">Action</th>
                </tr>
                @foreach ($user_data as $data)
                <tr class="users_data_tr">
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    @if($data->usertype=="0")
                    <td><a href="{{ url('/deleteUser', $data->id) }}" class="btn btn-danger">Delete</a></td>
                    @else
                    <td style="color:green;">Not Allowed</td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>




    </div>
    <!-- container-scroller -->
    @include('admin.adminscript')
  </body>
</html>
