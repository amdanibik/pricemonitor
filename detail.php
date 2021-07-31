<?php
    date_default_timezone_set('Asia/Jakarta');
    include "function.php";
    include "connect.php";
    $url = $_GET['link'];
    $status = $_GET['status'];
    $idLink = "";
    
    if($status == 1){

        $teks = file_get_contents($url);
        $name = getStringBetween($teks, '<h1 class="block font-600 mt-0 text-24 mb-1" id="product-name">','</h1>');
        $price = getStringBetween($teks, '<div class="text-24 font-600" id="product-final-price">','</div>');
        $desc = getStringBetween($teks, '<div class="MuiGrid-root text-16 MuiGrid-item MuiGrid-grid-xs-6">','</div>');
        $image = getStringBetween($teks, 'https://cdn-m2.fabelio.com/catalog/product/','?auto=format');
        $rprice = preg_replace('/[Rp.]/','',$price);

        $query = "SELECT * FROM links WHERE link = '$url'";
        $check = $connect->query($query)->num_rows;
        if($check == 0){
            // echo "Belum ada link ";
            $connect2->query("INSERT INTO links (link,namelink,price,descri,img) VALUES('$url','$name','$rprice','$desc','$image')");
            // echo $connect2->insert_id;
            $tanggal = date("Y-m-d H:i:s");
            $connect3->query("INSERT INTO details(links_id,price,tanggal) VALUES ('$connect2->insert_id','$rprice','$tanggal')");
            $dataLink = $connect2->insert_id;
            // echo $connect3->insert_id;
            $idLink = $connect2->insert_id;
        } else {
            $dataLink = $connect->query($query)->fetch_array(MYSQLI_NUM);
            $tanggal = date("Y-m-d H:i:s");
            $connect2->query("UPDATE link SET price = '$rprice' WHERE id = '$dataLink[0]'");
            $connect3->query("INSERT INTO details(links_id,price,tanggal) VALUES ('$dataLink[0]','$rprice','$tanggal')");
            $idLink = $dataLink[0];
            // echo $connect3->insert_id;
        }
    } else {
            $id = $_GET['id'];
            $query = "SELECT * FROM links WHERE id = '$id'";
            $data = $connect->query($query)->fetch_array(MYSQLI_NUM);
            $name = $data[2];
            $price = $data[3];
            $desc = $data[4];
            $image = $data[5];
            $idLink = $id;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fabelio | Detail Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fabelio - Product | <a href="index.php"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back </button></a>| <a href="list.php"><button type="button" class="btn btn-primary"><i class="fa fa-list"></i> List Products </button></a></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $name; ?></h3>
              <div class="col-12">
                <?php echo "<img src=https://cdn-m2.fabelio.com/catalog/product/$image width='300' height='300' class='product-image' alt='Product Image'>"; ?>
                <!-- <img src="dist/img/prod-1.jpg" class="product-image" alt="Product Image" width="300" height="300"> -->
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $name; ?></h3>
              <p><?php echo $desc; ?></p>

              <hr>
              
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                    <?php echo $price; ?>
                </h2>
              </div>
              <hr>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Comment
              </button>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments
                <?php
                  $qc = "SELECT * FROM comments WHERE links_id = '$idLink' ORDER BY id DESC";
                  $rc = $connect->query($qc)->num_rows;
                  echo "(".$rc.")";
                ?>
                </a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $desc; ?></div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
                <?php
                  $dc = $connect->query($qc);
                  while($result = $dc->fetch_array(MYSQLI_NUM)){
?>
                    <!-- Post -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="post">
                          <span class="username">
                              <b><?php echo $result[2]?></b>
                            </span>
                            | <span class="description"><?php echo $result[5];?></span>
                          <!-- /.user-block -->
                          <p>
                            <?php echo $result[4]; ?>
                            <br>
                            <?php
                            $qlike = "SELECT * FROM upvote WHERE comment_id = '$result[0]'";
                            echo $rlike = $connect->query($qlike)->num_rows; 
                            ?>
                            &nbsp <a href="voteup.php?id=<?php echo $result[0]; ?>&idlink=<?php echo $idLink; ?>" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a> &nbsp
                            |
                            <?php
                            $qdlike = "SELECT * FROM downvote WHERE comment_id = '$result[0]'";
                            echo $rlike = $connect->query($qdlike)->num_rows; 
                            ?>
                            &nbsp<a href="votedown.php?id=<?php echo $result[0]; ?>&idlink=<?php echo $idLink; ?>" class="link-black text-sm"><i class="far fa-thumbs-down mr-1"></i> Dislike</a>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!-- /.post -->
<?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
</div>
<!-- ./wrapper -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="comment" method="post" action="comment.php">
      <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-md-9 col-sm-9 col-xs-12">Name : </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="hidden" name="id" value="<?php echo $idLink;?>">
                <input type="text" name="name" class="form-control">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-9 col-sm-9 col-xs-12">Email : </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="email" class="form-control">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-9 col-sm-9 col-xs-12">Comment : </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea name="comment" class="form-control"></textarea>
              </div>
          </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submmit" class="btn btn-primary">Add Comment</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</body>
</html>