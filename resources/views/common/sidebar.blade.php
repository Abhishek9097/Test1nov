<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          
          <li class="nav-item ">
            <a class="nav-link" href="{{asset('company')}}">
              <i class="material-icons">person</i>
              <p>Manage Company</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{asset('employees')}}">
                <i class="material-icons">person</i>
              <p>Manage Employees</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{asset('logout')}}">
              <i class="material-icons">content_paste</i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>