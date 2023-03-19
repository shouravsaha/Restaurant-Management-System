<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.admincss')
  </head>
  <body>
    <!-- container-scroller -->
    <div class="container-scroller">
        @include('admin.navbar')
        <div>
            <div class="food_menu_div">
                <form action="{{ url('/update_food', $food_menu_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div>
                        <label for="title">Title</label>
                        <input class="food_menu_input" type="text" name="title" value="{{ $food_menu_data->title }}">
                    </div>
                    <div>
                        <label for="title">Price</label>
                        <input class="food_menu_input" type="number" name="price" value="{{ $food_menu_data->price }}">
                    </div>
                    <div>
                        <label for="title">Description</label>
                        <input class="food_menu_input" type="text" name="description" value="{{ $food_menu_data->description }}">
                    </div>
                    <div>
                        <label for="Image">Old Image</label>
                        <img style="width: 200px; height:200px; padding-bottom: 5px;" src="/foodimage/{{ $food_menu_data->image }}" alt="">
                    </div>
                    <div>
                        <label for="Image">Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input type="submit" class="button btn btn-primary" value="Update">
                    </div>
                </form>
        </div>
    </div>


    @include('admin.adminscript')
  </body>
</html>

