<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <style>
        /* Custom Styles */
        body {
          background-image: url('img1.jpg');
          background-repeat: no-repeat;
          background-size:cover;
          background-position:inherit;
        }
        
        .transparent.login-container{
          border: 1px solid black;
          max-width: 500px;
          margin: auto;
          margin-top:50px;
          padding: 20px;
          text-align:center;
          border-collapse: collapse;
          box-shadow:0 0 10px rgba(0,0,0,0.1);
          border-radius: 8px;
          position: relative;
          top: 180px; 
          background-color: rgba(192, 181, 188, 0.7);
        }
        .transparent.login-container h1 {
            text-align: center;
        }
        .form-group label {
            color: black;
            font-size: 20px;
        }
        .btn-primary {
            background-color: #05283c;
            border-color: #5f9ac2;
        } 


        
    </style>
</head>
<body>
     <div class="transparent login-container">
        <h1 class="text-center mb-4">User Registration Form</h1>

        <form id="registrationForm" action="sr.php" method="post">
            <div class="form-group">
                <label for="id">Hostel ID:</label>
                <input class="form-control" type="text" id="id" name="id" required><br><br>
            </div>


            <div class="form-group">    
                <label for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password" required><br><br>
            </div>
        
        <input type="submit" value="Register"><br>
        <font>Already Account have <a href="login.php"> Login</a></font>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            var id = document.getElementById("id").value;

            // AJAX request to check if the ID exists
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "check_id.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText === "exists") {
                        // ID exists, proceed with form submission
                        document.getElementById("registrationForm").submit();
                    } else {
                        // ID does not exist, alert the user
                        alert("ID does not exist. Please enter a valid ID.");
                    }
                }
            };
            xhr.send("id=" + id);
        });
    </script>
</body>
</html>
