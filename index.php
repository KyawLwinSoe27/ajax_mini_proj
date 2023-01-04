<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <style>
    table td th {
      vertical-align: middle !important;
    }
  </style>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card my-5 shadow p-3">
          <div class="d-flex justify-content-between">
            <h4>Contact List</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Add Contact
            </button>
          </div>
          <div class="card-content">
            <div id="output"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New Contact <span id="result"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="save.php" method="post" id="addContact">
            <div class="form-group d-flex flex-column">
              <div class="row">
                <div class="col-6">
                  <label class="form-label" for="">Name</label>
                  <input type="text" required class="form-control" name="name" placeholder="Contact Name" />
                </div>
                <div class="col-6">
                  <label class="form-label" for="">Phone Number</label>
                  <input type="text" required class="form-control" name="phone_number" placeholder="Phone Number" />
                </div>
              </div>
              <button type="submit" class="btn btn-primary my-2" data-bs-dismiss="modal">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script>
    function showList() {
      $.get("list.php", function(data) {
        $("#output").html(data);
      });
    }

    $('#addContact').on('submit', function(e) {
      e.preventDefault();
      let input = $(this).serialize();
      let url = $(this).attr('action');
      // $.ajax({
      //   type: 'POST',
      //   url: $(this).attr('action'),
      //   data: input,
      //   success: function(data) {
      //     console.log(data);
      //   },
      // })
      
      $.post(url, input, function(data) {
        $("#result").html("<span class='badge rounded-pill bg-success'>Contact Added</span>");
        showList();
      })
      $("input").val("");
    })

    showList();
  </script>
</body>

</html>

this project is using ajax , ajax is update data withoud reloading web page ...