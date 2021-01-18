<?php
session_start();
require 'crud/config.php';

if (isset($_POST['add'])) {
  addmovie();
}

$id = $_POST['id'];

include 'tamplate/header.php'
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php
    include 'tamplate/sidebar.php'
    ?>
    <div class="content-wrapper">
      <!-- Content Wrapper. Contains page content -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add New Series</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <!-- general form elements -->
              <div class="col-md-9">
                <input name="judul" type="text" class="form-control" placeholder="judul" style="font-size: 20px; margin-bottom: 10px;">
                <textarea id="summernote" name="sinopsis" class="form-control"></textarea>
                <div class="card card-default">
                  <div class="card-header">Cover</div>
                  <div class="card-body">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="file" type="file" class="custom-file-input costumfile">
                        <label class="custom-file-label filename" for="cover">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <a name="submit" class="btn btn-secondary btn-preview">preview</a>
                      </div>
                      <img class="preview" style="min-width: 100%;">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-default">
                  <div class="card-header">Upload</div>
                  <div class="card-body">
                    <p>Saat anda telah selesai mengedit untuk menyimpanya klik add</p>
                    <input name="add" class="float-right btn btn-danger" type="submit" value="Add">
                  </div>
                </div>
                <div class="card card-default">
                  <div class="card-header">Series Info</div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Durasi">Durasi</label>
                      <input name="durasi" type="text" class="form-control" placeholder="durasi">
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select name="status" class="custom-select rounded-0">
                        <option>Ongoing</option>
                        <option>Complated</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Type">Type</label>
                      <select name="type" class="custom-select rounded-0">
                        <option>TV</option>
                        <option>BD</option>
                        <option>Movie</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Episode">Jumlah Episode</label>
                      <input name="episode" type="number" class="form-control" placeholder="episode">
                    </div>
                    <div class="form-group">
                      <label for="Studio">Studio</label>
                      <input name="studio" type="text" class="form-control" placeholder="studio">
                    </div>
                    <div class="form-group">
                      <label for="Rilis Date">Rilis Date</label>
                      <input name="rilis" type="text" class="form-control" placeholder="rilis">
                    </div>
                    <div class="form-group">
                      <label for="Rate">Rate</label>
                      <input name="rate" type="text" class="form-control" placeholder="rate">
                    </div>
                    <div class="form-group">
                      <label for="Genre">Genre</label>
                      <input name="genre" type="text" class="form-control" placeholder="genre">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
    <?php
    include 'tamplate/footer.php'
    ?>
  </div>
  <!-- /.content-wrapper -->
</body>
<script>
  $(document).ready(function() {
    $('.costumfile').on('change', function(event) {
      var test = event.target.files[0].name;
      $('.filename').text(test);
    })

    $('.btn-preview').on('click', function(event) {
      console.log($('.costumfile')[0].files[0]);
      if ($('.costumfile')[0].files[0]) {
        if ($('.btn-preview').text() == "preview") {
          $('.btn-preview').text("hide");
          $('.preview').attr("src", URL.createObjectURL($('.costumfile')[0].files[0]));
        } else {
          $('.btn-preview').text("preview");
          $('.preview').removeAttr("src");
        }
      }
    })

    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>