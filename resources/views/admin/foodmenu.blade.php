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
        <div class="food_menu_div">
            <form action="{{ url('/upload_food') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div>
                    <label for="title">Title</label>
                    <input class="food_menu_input" type="text" name="title" placeholder="Write Food Name" required>
                </div>
                <div>
                    <label for="title">Price</label>
                    <input class="food_menu_input" type="number" name="price" placeholder="Product Price" required>
                </div>
                <div>
                    <label for="Image">Image</label>
                    <input type="file" name="image" required>
                </div>
                <div>
                    <label for="title">Description</label>
                    <input class="food_menu_input" type="text" name="description" placeholder="Description" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
            <div>
                <table class="food_menu_table">
                    <tr>
                        <th class="food_menu_table_th">Food Name</th>
                        <th class="food_menu_table_th">Price</th>
                        <th class="food_menu_table_th">Description</th>
                        <th class="food_menu_table_th">Image</th>
                        <th class="food_menu_table_th">Action</th>
                    </tr>
                    @foreach ($food_menu_items as $data)
                    <tr class="food_menu_table_tr">
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->description }}</td>
                        <td><img class="food_menu_img" src="foodimage/{{ $data->image }}"></td>
                        <td><a class="btn btn-danger" href="{{ url('/delete_food_menu', $data->id) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
        @include('admin.adminscript')
  </body>
</html>
