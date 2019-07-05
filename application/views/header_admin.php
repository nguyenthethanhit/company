	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url(); ?>index.php/ctl">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url(); ?>index.php/ctl/signup">Add User</a>
	      </li>

		  <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url(); ?>index.php/ctl/ChangePass_view">Đổi mật khẩu</a>
	      </li>

	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url(); ?>index.php/ctl/logout">Đăng xuất</a>
	      </li>
	      
	      
	    </ul>
	    <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo base_url()?>index.php/ctl/Search">
	      <input class="form-control mr-sm-2" type="search" placeholder="@username" name="search" aria-label="Search">
	      <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>