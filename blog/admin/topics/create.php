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
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">-->
    
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Candal|Lora">
    
  <!-- Custom Styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../assets/css/admin.css">

  <title>Admin - Create Topic</title>
</head>

<body>

<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <div class="admin-wrapper clearfix">
      
<?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content clearfix">
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add Topic</a>
        <a href="index.php" class="btn btn-sm">Manage Topics</a>
      </div>
      <div class="content">
        <h2 style="text-align: center;">Create Topic</h2>
          
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
          
        <form action="create.php" method="post">
          <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name ?>" class="text-input">
          </div>
          <div class="input-group">
            <label>Description</label>
            <textarea class="text-input" name="description" id="description"><?php echo $description ?></textarea>
          </div>
          <div class="input-group">
            <button type="submit" name="add-topic" class="btn" >Save Topic</button>
          </div>
        </form>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="../../assets/js/scripts.js"></script>

</body>

</html>