<?php
class Page{

   public static function header($config){
    
    $title=isset($config["title"])?$config["title"]:"Page Title";
    $url = url('/');

     $html=<<<HTML
        <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 align-items-center">
            <div class="col-sm-12">
              <h3 class="m-0">$title</h3>
              <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="$url">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">$title</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    HTML;
    return $html;
    }
    
    
      
    public static function body_open($config=["col"=>12]){
        $col=$config["col"];
        $html=<<<HTML
        <div class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-lg-$col">
    HTML;
    return $html;
    }
    
    public static function body_close(){
        $html=<<<HTML
         </div>
        </div>    
      </div> 
    </div>
    HTML;
    return $html;
    }


    public static function content_open($config=[]) {
      $config["title"] = isset($config["title"]) ? $config["title"] : "&nbsp;"; 
      $config["route"] = isset($config["route"]) ? $config["route"] : "#"; 
  
      $html = "<div class='card' style='margin-top:30px; box-shadow:0 0 19px 3px rgba(0,0,0,.2)'>";
  
      $html .= "<div class='card-header d-flex justify-content-between align-items-center' style='background-color: #c6d9ff;'>";
      $html .= "<div style='font-size:21px; color:#012970; font-weight: 600;' class='flex-fill'>{$config["title"]}";
      $html .= "<nav style='--bs-breadcrumb-divider: \">\";' aria-label='breadcrumb'>";
      $html .= "<ol class='breadcrumb m-0'>";
      $html .= "<li class='breadcrumb-item'><a href='".url('/')."'>Home</a></li>";
      $html .= "<li class='breadcrumb-item active' aria-current='page'>{$config["title"]}</li>";
      $html .= "</ol>";
      $html .= "</nav>";
      $html .= "</div>";
  
      if (isset($config["button"])) {
          $html .= "<a class='btn btn-success my-primary-btn' href='{$config["route"]}'>{$config["button"]}</a>";
      }
  
      $html .= "</div>";
  
      return $html;
  }
  


    public static function content_body(){
      $html="<div class='card-body'>";
      return $html; 
    }
    public static function content_body_close(){
      $html="</div>";
      return $html; 
    }
    public static function content_footer(){
      $html="<div class='card-footer'>";
      return $html; 
    }
    public static function content_footer_close(){
      $html="</div>";
      return $html; 
    }
      
    public static function content_close(){
      $html="</div>";
      return $html;
    }

}

?>