@extends('layouts.app')

@section('page')
<?php 
echo page_header(['title'=>'Manage Role']);
echo page_body_open();
echo page_content_open(['title'=>'Create Role',"button"=>"Role","route"=>"roles"]);

echo get_array_table($roles,["id","name"],"roles");
?>


<?php
echo page_content_close();
echo page_body_close();
?>
@endsection