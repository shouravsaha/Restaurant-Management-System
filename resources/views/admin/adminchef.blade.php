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
    </div>
    @include('admin.adminscript')
  </body>
</html>
