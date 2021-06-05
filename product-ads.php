<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Search</title>
  <link rel="stylesheet" href="./semantic-css/semantic.min.css">
</head>

<body>
  <div class="ui fluid menu">

    <div style="margin-left: 20px" class="header item">
      Recycle Bin
    </div>
    <div class="right menu">
      <a class="item active" href="../HomePage/homepage.php">Home</a>
      <a href="../About-Us-Page/about-us.php" class="item">About US</a>
      <a class="item">Seller Dashboard</a>
      <a class="item">Sign Up</a>
      <a class="item">Sign In</a>
      <a class="item">Log Out</a>
    </div>
  </div>

  <div class="ui grid">
    <div class="ui twelve wide column" style="background-image: url('./images/back.jpg'); background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover; min-height: 100vh;">
      <div style="padding: 20px" id="img_container">
        <img style="height: 400px;width: 1000px; margin-left:auto;margin-right:auto;display:block " src="./images/product1.jpg">
      </div>
      <div class="ui grid">
        <h1 style="padding: 100px" class="center"></h1>
        <div class="ui eight wide column" id="product_details_container">

          <h1>Product Name</h1>
          <h6>04/05/2021</h6>
          <h6>city</h6>
          <h6>local area</h6>
          <hr>
          <h3>Tk 62,00</h3>
          <h4>description</h4>
          <h6>description_details</h6>

        </div>



      </div>

      <!-- <div style="padding:0 10% 0 10%" class="ui form">
        <div class="field">
          <labels>Comment:</label>
            <textarea></textarea>
        </div>
        <button style="margin-top: 10px" class="ui center floated fluid button" type="submit">Comment</button>
      </div> -->
      <div style="padding:30px">
      </div>
    </div>
    <div class="ui four wide column" style="background-image: url('./images/back2.jpg'); background-repeat: no-repeat ;background-size: cover; min-height: 100vh;">
      <div style="padding: 20px" class="ui card">
        <div class="image">
          <!-- <img src="./images/men.jpg"> -->
        </div>
        <div class="content" id="user_info_container">
          <a class="header">User name</a>
          <div class="meta">
            <span class="date">Owner</span>
          </div>
          <div class="description">user phn no</div>

        </div>

      </div>

    </div>
  </div>



  <!-- Rest of the page content -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/semantic.min.js"></script>

  <!-- controling -->

  <script>
    var id = <?php echo $_GET['id'] ?>;

    var api_dir_path = "../api/api/post/";

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var item_details = JSON.parse(this.responseText);
        // document.getElementById("searched_item_container").style.color = "black";
        document.getElementById("img_container").innerHTML = ``;
        document.getElementById("product_details_container").innerHTML = ``;
        document.getElementById("user_info_container").innerHTML = ``;

        for (let i = 0; i < 1; i++) {
          ////////////////  img_container //////////////////
          document.getElementById("img_container").innerHTML += `

                <img style="margin-left:auto;margin-right:auto;display:block " src="${api_dir_path+item_details[0]['image_path']}">

                `;

          ////////////////  product_details_container //////////////////
          document.getElementById("product_details_container").innerHTML += `

                  <h1>${item_details[0]['product_name']} </h1>
                  <h5>${item_details[0]['date_time']}</h5>
                  <h5>${item_details[0]['city']}</h5>
                  <h5>${item_details[0]['local_area']}</h5>
                  <hr>
                  <h3 style="color:green;">TK ${item_details[0]['price']}/-</h3>
                  <h4><b><u>Category</u></b></h4>
                  <h5>${item_details[0]['category']}</h5>
                  <h4><b><u>description</u></b></h4>
                  <h5>${item_details[0]['description']}</h5>

          `;

          ////////////////  user_info_container //////////////////
          document.getElementById("user_info_container").innerHTML += `

              <div class="meta">
                <span class="date">Owner name</span>
              </div>
              <a class="header">${item_details[0]['user_name']}</a>
              <div class="meta">
                <span class="date">Phone No.</span>
              </div>
              <div class="description">${item_details[0]['phone_no']}</div>

                `;
        }
      }
    };



    xmlhttp.open("POST", api_dir_path + "api_read_ad_details.php");
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("id=" + id);
  </script>
</body>

</html>
