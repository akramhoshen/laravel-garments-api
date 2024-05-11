<h2>Edit</h2>

<form action="{{route("users.update",1)}}" method="post">
    @csrf
    @method("PUT")
    Name:
    <input type="text" name="name">
    <input type="submit" value="Update">
</form>