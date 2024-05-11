<?php

class Table{

   public static function get_html_table($table,$columns=""){
        //global $db,$tx;   
       $db=new mysqli("localhost","root","","test");
       $tx="core_";
       
       $sql="select $columns from {$tx}$table";
       $result=$db->query($sql);
       $fields = $result->fetch_fields();
    
        $html="<table class='table table-striped'>";  
        $html.="<thead>"; 
        $html.="<tr>"; 
        foreach($fields as $field){     
            $html.="<th>";
            $html.=ucfirst($field->name);
            $html.="</th>";
        }
        $html.="</tr>";
        $html.="</thead>"; 
        $html.="<tbody>"; 
        while($row=$result->fetch_assoc()){
         $html.="<tr>";
        
            foreach($fields as $field){     
                $html.="<td>";
                $html.=$row["$field->name"];
                $html.="</td>";
            }
         $html.="</tr>";
        }
        $html.="</tbody>"; 
        $html.="</table>";
    
        return $html;
    }
    
    public static function get_array_table($table, $columns, $route) {
        $html = "<table class='table table-striped'>";  
    
        // Table headers
        $html .= "<thead>"; 
        $html .= "<tr>"; 
        foreach ($columns as $column) {     
            $html .= "<th>";
            $html .= ucfirst($column);
            $html .= "</th>";
        }
        $html .= "<th>Action</th>";
        $html .= "</tr>";
        $html .= "</thead>"; 
    
        // Table body
        $html .= "<tbody class='table-group-divider'>"; 
        foreach ($table as $row) {   
            $html .= "<tr>";
            foreach ($columns as $column) {
                $html .= "<td>";                   
                if ($column == "photo" || $column == "image" || $column == "attachment") {
                    $html .= "<img class='shadow rounded' src='img/" . $row->{$column} . "' style='height: 55px; border: 2px solid #dee2e6; padding: 3px;' />";
                } else {
                    $html .= $row->{$column};
                }
                $html .= "</td>";
            }
    
            $html .= "<td>";
            $html .= "<div class='btn-group'>";
            $html .= "<a style='background:#0fb9b1; color:#fff;' class='btn' href='" . url("$route/$row->id") . "'><i class='fa-solid fa-eye'></i></a>";
            $html .= "<a style='background:#3867d6; color:#fff;' class='btn' href='" . url("$route/$row->id/edit") . "'><i class='fa-solid fa-pen-to-square'></i></a>";
            $html .= "<form action='" . url("$route/$row->id") . "' method='post'>";
            $html .= csrf_field();
            $html .= method_field('DELETE');
            $html .= "<button type='submit' style='background:#eb3b5a; color:#fff;' class='btn rounded-start-0' onclick='return confirm(\"Are you sure you want to delete this?\")'><i class='fa-solid fa-trash'></i></button>";
            $html .= "</form>";
            $html .= "</div>";            
            $html .= "</td>";
    
            $html .= "</tr>";
        }    
        $html .= "</tbody>"; 
        $html .= "</table>";
    
        return $html;
    }
    
}

?>