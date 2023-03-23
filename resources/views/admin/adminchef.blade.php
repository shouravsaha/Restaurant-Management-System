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
        <form action="{{ url('/uploadchef') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div>
                <label>Name</label>
                <input class="chef_input" type="text" name="name" placeholder="Enter Chef Name" required>
            </div>
            <div>
                <label>Speciality</label>
                <input class="chef_input" type="text" name="speciality" placeholder="Enter the speciality" required>
            </div>
            <div>
                <input type="file" name="image" required>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Save">
            </div>
        </form>

        <table class="chef_table">
            <tr>
                <th class="chef_table_th">Chef Name</th>
                <th class="chef_table_th">Speciality</th>
                <th class="chef_table_th">Image</th>
                <th class="chef_table_th" colspan="2">Action</th>
            </tr>
            @foreach ($chefdata as $data)
            <tr>
                <td class="chef_table_td">{{ $data->name }}</td>
                <td class="chef_table_td">{{ $data->speciality }}</td>
                <td class="chef_table_td"><img class="chef_table_img" src="chefimage/{{ $data->image }}" alt=""></td>
                <td><a href="{{ url('/updatechef', $data->id) }}" class="btn btn-primary mr-2 ml-2">Edit</a></td>
                <td><a href="{{ url('/deletechef', $data->id) }}" class="btn btn-danger mr-2">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    @include('admin.adminscript')
  </body>
</html>
