<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
    @include('admin.navbar')
    <!-- container-scroller -->
    <form action="{{ url('/updatefoodchef', $chefdata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div>
                <label>Name</label>
                <input class="chef_input" type="text" name="name" value="{{ $chefdata->name }}">
            </div>
            <div>
                <label>Speciality</label>
                <input class="chef_input" type="text" name="speciality" value="{{ $chefdata->speciality }}">
            </div>
            <div>
                <label>Old Image</label>
                <img style="height: 200" width="200" src="/chefimage/{{ $chefdata->image }}" alt="">
            </div>
            <div>
                <label>Old Image</label>
                <input type="file" name="image">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
    @include('admin.adminscript')
  </body>
</html>
