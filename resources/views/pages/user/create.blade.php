<h2>Create</h2>

<form action="{{route("users.store")}}" method="post">
    @csrf
    Name:
    <input type="text" name="name">
    <input type="submit" value="Save">
</form>