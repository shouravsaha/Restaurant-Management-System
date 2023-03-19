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
    <!-- container-scroller -->
    <div class="reservation_div">
        <table class="reservation_table">
            <tr>
                <th class="reservation_table_th">Name</th>
                <th class="reservation_table_th">Email</th>
                <th class="reservation_table_th">Phone</th>
                <th class="reservation_table_th">Date</th>
                <th class="reservation_table_th">Time</th>
                <th class="reservation_table_th">Message</th>
            </tr>
            @foreach ($reservation_data as $data)
            <tr align="center">
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->phone }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->time }}</td>
                <td>{{ $data->message }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    </div>
    @include('admin.adminscript')
  </body>
</html>
