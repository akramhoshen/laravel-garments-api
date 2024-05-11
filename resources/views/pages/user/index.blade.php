@extends('layouts.app')

@section('page')

<?php 
echo page_header(['title'=>'Manage Role']);
echo page_body_open();
echo page_content_open(['title'=>'Create Role']);
echo get_html_table("teachers","id,name,dob,phone,address");
// echo File::info();

//File Helpers functions
// echo read('data/log.txt');
// echo write('data/log.txt','i am software developer');
// echo write('data/log.txt','i am software developer');
// echo word_count('data/log.txt');
// echo file_ext('data/log.txt');
echo page_content_close();
echo page_body_close();
?>
<!-- <table border="1" width="300" style="border-collapse: collapse;" class="table table-bordered">
    <tr>
        <th>SL.</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Jahid</td>
        <td>
            <div class="row" style="display: flex; justify-content:space-evenly;">
                <a href="{{url("/users/1")}}">Show</a>
                <a href="{{url("/users/1/edit")}}">Edit</a>
                <form action="{{url("/users/1")}}" method="post">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete">
                </form>
            </div>
        </td>
    </tr>
</table> -->

@endsection