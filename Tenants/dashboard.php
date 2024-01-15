<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-some-hash>" crossorigin="anonymous" />
</head>
<body>
  <div class="container">
    <nav>
      <ul>

        <li><a href="#" class="logo">
          <span class="nav-item">DashBoard</span>

        </a></li>
        <li><a href="dashboard.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
  

        <li><a href="profile.php">
          <i class="fas fa-chart-bar"></i>
          <span class="nav-item">Tenant Profile</span>
        </a></li>

        <li><a href="bills.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Utility Bills</span>
        </a></li>

        <li><a href="sms.html">
            <i class="fas fa-cog"></i>
            <span class="nav-item">SMS Configuration</span>
          </a></li>

          <li><a href="message.html">
            <i class="fas fa-question-circle"></i>
            <span class="nav-item">Help</span>
          </a></li>

  
        <li><a href="sign-in.html" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1>Dashboard</h1>
      </div>


      <div class="main-skills">
        <div class="card">
            <i class="fa-regular fa-user"></i>
          <h3>10</h3>
          <p style="font-weight: bold;  font-size: 15px;">Number of Tenants</p>
          <a href="tenants.html"><button> View List</button></a>
        </div>
        
        
        <div class="card">
            <i class="fa-solid fa-house"></i>
          <h3>15</h3>
          <p style="font-weight: bold;  font-size: 15px;">Number of Rooms</p>
          <a href="room.html"><button>View List</button></a>
        </div>

        <div class="card">
            <i class="fa-solid fa-bed"></i>
          <h3>30</h3>
          <p style="font-weight: bold;  font-size: 15px;">Number of Beds</p>
          <a href="due-dates.html"><button>View List</button></a>
        </div>

        <div class="card">
            <i class="fa-solid fa-money-bill"></i>
          <h3>3</h3>
          <p style="font-weight: bold;  font-size: 15px;">Due Dates of Payment</p>
          <a href="due-dates.html"><button> View List</button></a>
          </div>

          <div class="card">
            <i class="fa-solid fa-money-bill"></i>
          <h3>3</h3>
          <p style="font-weight: bold;  font-size: 15px;">Reports</p>
          <a href="Report.html"><button> View List</button></a>
          </div>
        </div>
      </div>
    </section>      
  </div>
</body>
</html>