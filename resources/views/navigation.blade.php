 <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Demo WebShop</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="items">Item</a></li>
            </ul>
             <ul class="nav navbar-nav pull-right">
              <li><a href="logout">Logout</a></li>
			 </ul>
          <p class="navbar-brand pull-right">Welcome, {{session('name')}}</p>
         </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
 </div>