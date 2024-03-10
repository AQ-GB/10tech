<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
          font-family: 'lato', sans-serif;
          background: #0e161d;
        }
        .container {
          max-width: 1000px;
          margin-left: auto;
          margin-right: auto;
          padding-left: 10px;
          padding-right: 10px;
        }

        h2 {
          font-size: 26px;
          color: white;
          margin: 20px 0;
          text-align: center;
        }

        .responsive-table {
          li {
            border-radius: 3px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
          }
          .table-header {
            background-color: #95A5A6;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
          }
          .table-row {
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
          }
          .col-1 {
            flex-basis: 10%;
          }
          .col-2 {
            flex-basis: 40%;
          }
          .col-3 {
            flex-basis: 25%;
          }
          .col-4 {
            flex-basis: 25%;
          }

          @media all and (max-width: 767px) {
            .table-header {
              display: none;
            }
            .table-row{

            }
            li {
              display: block;
            }
            .col {

              flex-basis: 100%;

            }
            .col {
              display: flex;
              padding: 10px 0;
              &:before {
                color: #6C7A89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
              }
            }
          }
        }

        /* Modal */
        .modal {
          display: none;
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgba(0,0,0,0.4);
          padding-top: 60px;
        }

/* CSS */
.addbutton {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 6px 14px;
  font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
  border-radius: 6px;
  border: none;

  background: #6E6D70;
  box-shadow: 0px 0.5px 1px rgba(0, 0, 0, 0.1), inset 0px 0.5px 0.5px rgba(255, 255, 255, 0.5), 0px 0px 0px 0.5px rgba(0, 0, 0, 0.12);
  color: #DFDEDF;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-12:focus {
  box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1px rgba(0, 0, 0, 0.1), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
  outline: 0;
}

/* Modal content */
.modal-content {
  background-color: #95A5A6;
  margin: 5% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Adjust the width as needed */
  text-align: center; /* Center the content */
  border-radius: 10px; /* Rounded corners */
}


/* Modal close button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  position: absolute;
  top: 10px;
  right: 10px;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

    </style>
</head>
<body>
    
<div class="container">
  <h2>Users</h2>
  <button class="addbutton" id="addButton">Add User</button>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">User Id</div>
      <div class="col col-2">Email</div>
      <div class="col col-3">Date Created</div>
    </li>
    @foreach($data as $item)
    <li class="table-row">
      <div class="col col-1" data-label="UserId">{{ $item->id}}</div>
      <div class="col col-2" data-label="Email">{{ $item->email }}</div>
      <div class="col col-3" data-label="Date Created">{{ $item->created_at }}</div>
    </li>
    @endforeach
  </ul>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="{{ route('admin.adduser') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button class="addbutton" type="submit">Add User</button>
    </form>
  </div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("addButton");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

</body>
</html>
