<li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#merchandise-nav">
            <i class="bi bi-file-earmark-text-fill"></i><span>Merchandise</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="merchandise-nav" class="nav-content collapse @if(Request::is('styles') || Request::is('categories') || Request::is('styleattachments') || Request::is('rmaterials') || Request::is('rmcategories') || Request::is('smquantities') || Request::is('fabrics') || Request::is('trims') || Request::is('sttrims') || Request::is('sizes') || Request::is('stsizes') || Request::is('measurements') || Request::is('mtsizes') || Request::is('mtattachments')) show @endif" data-bs-parent="#sidebar-nav">
          <li @if(Request::is('styles')) class="active" @endif>
              <a href="{{url('styles')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Style</span>
              </a>
          </li>
          <li @if(Request::is('categories')) class="active" @endif>
              <a href="{{url('categories')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Style Category</span>
              </a>
          </li>
          <li @if(Request::is('styleattachments')) class="active" @endif>
              <a href="{{url('styleattachments')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Style Attachment</span>
              </a>
          </li>
          <li @if(Request::is('rmaterials')) class="active" @endif>
              <a href="{{url('rmaterials')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Raw Material</span>
              </a>
          </li>
          <li @if(Request::is('rmcategories')) class="active" @endif>
              <a href="{{url('rmcategories')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Raw Material's Category</span>
              </a>
          </li>
          <li @if(Request::is('smquantities')) class="active" @endif>
              <a href="{{url('smquantities')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Style Material Quantity</span>
              </a>
          </li>
          <li @if(Request::is('fabrics')) class="active" @endif>
              <a href="{{url('fabrics')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Fabric</span>
              </a>
          </li>
          <li @if(Request::is('trims')) class="active" @endif>
              <a href="{{url('trims')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Trim</span>
              </a>
          </li>
          <li @if(Request::is('sttrims')) class="active" @endif>
              <a href="{{url('sttrims')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Style Trim</span>
              </a>
          </li>
          <li @if(Request::is('sizes')) class="active" @endif>
              <a href="{{url('sizes')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Size</span>
              </a>
          </li>
          <li @if(Request::is('stsizes')) class="active" @endif>
              <a href="{{url('stsizes')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Style Size</span>
              </a>
          </li>
          <li @if(Request::is('measurements')) class="active" @endif>
              <a href="{{url('measurements')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Measurement</span>
              </a>
          </li>
          <li @if(Request::is('mtsizes')) class="active" @endif>
              <a href="{{url('mtsizes')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Measurement Size</span>
              </a>
          </li>
          <li @if(Request::is('mtattachments')) class="active" @endif>
              <a href="{{url('mtattachments')}}">
                  <i class="bi bi-arrow-right-short"></i><span>Measurement Attachment</span>
              </a>
          </li>
        </ul>
    </li>