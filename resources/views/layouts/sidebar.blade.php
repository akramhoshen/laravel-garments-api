<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Main</li>
      @include('layouts.menus.dashboard')
      <!-- End Dashboard Nav -->
      <li class="nav-heading">Sale</li>
      @include('layouts.menus.buyer')
      @include('layouts.menus.country')
      @include('layouts.menus.order')
      @include('layouts.menus.merchandise')
      <!-- End Components Nav -->
      @include('layouts.menus.bom')
      <li class="nav-heading">Purchase</li>
      @include('layouts.menus.inventory')
      @include('layouts.menus.vendor')
      @include('layouts.menus.uom')
      <li class="nav-heading">Production</li>
      @include('layouts.menus.requisition')
      <li class="nav-heading">Hr</li>
      @include('layouts.menus.department')
      <li class="nav-heading">Settings</li>
      @include('layouts.menus.system')
      @include('layouts.menus.signout')

    </ul>

  </aside>