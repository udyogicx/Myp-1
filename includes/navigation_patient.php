<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.php">Good Life</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="index.php">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Dashboard</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Doctors">
        <a class="nav-link" href="doctor.php">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Doctors</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Appointments">
        <a class="nav-link" href="appointment.php">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Appointments</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Order Medicine">
        <a class="nav-link" href="order.php?order=<?php echo $user->data()->id; ?>">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Order Medicine</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ordered Medicne">
        <a class="nav-link" href="orderedMedicine.php">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Ordered Medicine</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Medical History">
        <a class="nav-link" href="medicalHistory.php">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Medical History</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Settings">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-wrench"></i>
          <span class="nav-link-text">Settings</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents">

          <li>
            <a href="changepassword.php">Change Password</a>
          </li>
        </ul>
      </li>

    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
