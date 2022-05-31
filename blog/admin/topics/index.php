<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../assets/css/admin.css">

  <title>Admin - Manage Topics</title>
</head>

<body>

  <!-- header --
  <header class="clearfix">
    <div class="logo">
      <!- <img src="images/logo-placeholder.png" alt="Logo"> --
    </div>
    <div class="fa fa-reorder menu-toggle"></div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li>
          <a href="#" class="userinfo">
            <i class="fa fa-user"></i>
            Awa Melvine
            <i class="fa fa-chevron-down"></i>
          </a>
          <ul class="dropdown">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#" class="logout">logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <!- // header -->
  <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <div class="admin-wrapper clearfix">

  <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- Left Sidebar --
    <div class="left-sidebar">
      <ul>
        <li><a href="../posts/index.php">Manage Posts</a></li>
        <li><a href="index.php">Manage Topics</a></li>
        <li><a href="../users/index.php">Manage Users</a></li>
      </ul>
    </div>
    <!- // Left Sidebar -->

    <!-- Admin Content -->
    <div class="admin-content clearfix">
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add Topic</a>
        <a href="index.php" class="btn btn-sm">Manage Topics</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Manage Topic</h2>
          
            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
          
        <table>
          <thead>
            <th>N</th>
            <th>Name</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
              
  	<?php foreach ($topics as $key => $topic): ?>
              
            <tr class="rec">
                  <td> <?php echo $key + 1 ; ?> </td>
                  <td>
                    <a href="#"> <?php echo $topic['name'] ; ?> </a>
                  </td>
                  <td>
                    <a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">
                      Edit
                    </a>
                  </td>
                  <td>
                    <a href="index.php?del-id=<?php echo $topic['id']; ?>" class="delete">
                      Delete
                    </a>
                  </td>
            </tr>
              
  	<?php endforeach ?>
              
          </tbody>
        </table>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="../../assets/js/scripts.js"></script>

</body>

</html>