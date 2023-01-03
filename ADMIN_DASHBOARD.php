<?php
    include('config.php');
    require_once('session.php');

    AdminSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dasboard</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
 <!--    <link rel="stylesheet" href="css/style.css"> -->
<style type="text/css">
    *{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
}
.container {
    position: absolute;
    background:white;
    max-width: 100%;


}
.slide-1 {
    background: url('https://www.trinity.qld.edu.au/wp-content/uploads/2020/06/Trinity_website_Two-new-Undergraduate-Certificates-Courses-available-now-at-Trinity.jpg');
    background-size: 90%;
  
 
}
.slide-2 {
    background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGVkdWNhdGlvbnxlbnwwfHwwfHw%3D&w=1000&q=80');
}
.slide-3 {
    background: url('https://www.fpsa.org/wp-content/uploads/college-graduate-disconnect_July-21.jpg');
    }

.slide {
    width: 100%;
    height: 89vh;
    background-size: cover;
    background-position: center;
    position: relative;
    overflow-x: hidden;
    background-color: white;
    
}
.caption {
    background: rgba(0, 0, 0, 0.03);
    width: 100%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    padding: 40px 0px;
    opacity: 0.9;
}
.caption h3 {
    color: black;
    text-align: center;
    font-size: 60px;
    padding: 18px;

}
.caption p {
    max-width: 600px;
    width: 90%;
    margin: 10px auto;
    color: blue;
    text-align: center;
    font-size: 28px;
    line-height: 2.5em;
}
.arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    z-index: 10;
    background: rgba(0, 0, 0, .1);
    border-radius: 50%;
    transform: background 500ms;
    margin-left: 0px;
    opacity: 0.6;
    margin-right: 0px;
}
.arrow img {
    width: 40px;
}
.arrow:hover {
    background: rgba(0, 0, 0, .4);
}
.l {
    left: 0;
}
.r {
    right: 0;
}

/*------------------------------------*/
/*img{
max-width: 100%;
    height: 90%;
    position: relative;

}
*/
.header2 {
    font-family: "Montserrat", sans-serif;
    color: #8d97ad;
    font-weight: 300;


}

.header2.bg-success-gradiant {
    font-size: 20px;
    background:linear-gradient(to right,white,white);
    /*width: 2050px;
    */opacity: 0.9;
    border-radius: 0px;
    margin-top: 0px;
    width:100%;
    margin-left:0px ;
}

.header2 .font-12 {
    font-size: 20px
}
.navbar-brand{
    font-size: 20px;
    margin: 0px 0px 0px 0px;
}

.header2 .dropdown-item {
    padding: 8px 1rem;
    color: darkblue;
    font-size: 20px;
}

.header2 .h2-nav .navbar-nav .nav-item .nav-link {
    padding: 12px 0px;
    color:black;
    font-weight: 100px;

}

.header2 .h2-nav .navbar-nav .nav-item .nav-link:hover {
    color: blue;
}

.header2 .h2-nav .navbar-nav .nav-item {
    margin: 0 20px
}

@media (min-width: 1024px) {
    .header2 .navbar-nav>.dropdown .dropdown-menu {
        min-width: 210px;
        margin-top: 60px;
    }
}

@media (min-width: 1024px) {
    .header2 .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }
}

.header2 .dropdown-toggle::after {
    display: none;
}

@media (min-width: 1024px) {
    .header2 .hover-dropdown .navbar-nav>.dropdown:hover>.dropdown-menu {
        display: block;
        margin-top: 0px;
    }
}

.header2 .btn-dark {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
    font-size: 15px;
}

.header2 .btn-dark:hover {
    color: #fff;
    background-color: #23272b;
    border-color: #1d2124;
}

.header2 .h2-nav .navbar-nav .nav-item .btn {
    opacity: 0.9;
}

.header2 .h2-nav .navbar-nav .nav-item .btn:hover {
    opacity: 1;
    background-color: red;
}

.header2 .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-left: 0;
    border-radius: 0.25rem;
    display: none
}
.text,h2{
    text-align: center;
    font-size: 10px;
    margin-top: 20px;
    color: black;
    opacity: 0.8;
}
/*.container{
    width: 100%;
    height: 910px;
    margin-left: 0px;
    margin-top: 10px;
    text-align: center;
}
*/
h2{
    font-size: 10px;
    color: white;
    margin-top: 0px;
    

}
/*.card-body {
        background-color: blueviolet;
        height:0%;
        width: 900px;
        margin-left: 1000px;
}
*/input{
    width: 100%;
    height: 50px;
    font-size: 30px;
}
select{
    height: 50px;
}
.card .btn{
    margin-top: 60px;
}

</style>
</head>

<body>
    <body>
    
    
<div class="header2 bg-success-gradiant">

    <div class="">
        <!-- Header 1 code -->
        <nav class="navbar navbar-expand-lg h2-nav">

         <a class="navbar-brand" href="#">ADMIN </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header2" aria-controls="header2" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-menu"></span> </button>
            <div class="collapse navbar-collapse hover-dropdown" id="header2">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item dropdown position-relative"> <a class="nav-link dropdown-toggle" href="#" id="h2-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Entries <i class="fa fa-angle-down ml-1 font-12"></i> </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="COURSECODE_INSERT_FORM.php"><b>Course Code</b></a></li>
                            <li><a class="dropdown-item" href="SINGLE_INTERNALMARK_INSERT.php"><b>Single internal mark</b></a></li>
                           
                            <li><a class="dropdown-item" href="OVERALL_INTERNALMARK_INSERT.php"><b>overall Internal mark</b></a></li>
                            <li><a class="dropdown-item" href="INTERNALMARK_EXCELFILE_UPLOAD.php"><b>Internal File Uploads</b></a></li>
                            <li class="divider" role="separator"></li>
                            <li><a class="dropdown-item" href="EXTERNALMARK_INSERT_FORM.php"><b>Single Semester mark</b></a></li>
                            

                            <li><a class="dropdown-item" href="EXTERNALMARK_EXCELFILE_UPLOAD.php"><b>Semester File Uploads</b></a></li>
                            <li class="divider" role="separator"></li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown position-relative"> <a class="nav-link dropdown-toggle" href="#" id="h2-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Table view<i class="fa fa-angle-down ml-1 font-12"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="COURSECODE_UPDATION_TABLE.php"><b>Course Code Updation</b></a></li>
                            <li><a class="dropdown-item" href="INTERNALMARK_TABLE_UPDATION.php"><b>Internal marks Table</b></a></li>
                            <li><a class="dropdown-item" href="EXTERNALMARK_UPDATION_TABLE.php"><b>External marks Table</b></a></li>
                            
                            <li><a class="dropdown-item" href="#"><b>Something else here</b></a></li>
                            <li class="divider" role="separator"></li>
                            <li><a class="dropdown-item" href="#"><b>Separated link</b></a></li>
                            <li class="divider" role="separator"></li>
                           
                        </ul>
                    </li>
                     <!--  <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                     -->
                    <li class="nav-item"><a class="nav-link" href="COURSE_LOGIN.php">Course Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Reports</a></li>
                
                    </ul>
                <ul class="navbar-nav ml-auto">
                <!--     <li class="nav-item active"><a class="nav-link" href="#"><i class="icon-bubble"></i> Need help?</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#">Login</a></li>
                 -->    <li class="nav-item"><a class="btn rounded-pill btn-dark py-2 px-4" href="session_out.php">
                 LOGOUT</a></li>
                </ul>
            </div>


        </nav> <!-- End Header 1 code -->
        <div class="card">
                  <div class="container">
        <div class="arrow l" onclick="prev()">
            <img src="img/l.png" alt="l">
        </div>
        <div class="slide slide-1">
             <div class="caption">
                 <h3>ADMIN</h3>
                 <p>WELCOME TO OUR ADMIN </p>
             </div>
        </div>
        <div class="slide slide-2">
            <div class="caption">
                <h3>ADMIN</h3>
                <p>WELCOME TO OUR ADMIN</p>
            </div>
       </div>
       <div class="slide slide-3">
            <div class="caption">
                <h3>ADMIN</h3>
                <p>Thank you for visiting</p>
            </div>
       </div>
       <div class="arrow r" onclick="next()">
            <img src="img/r.png" alt="r">
        </div>
    </div>

    
            
  
        
        </div>

            </div>

        </div>
            
                

    
</div>
<script>
        let slide = document.querySelectorAll('.slide');
        var current = 0;

        function cls(){
            for(let i = 0; i < slide.length; i++){
                  slide[i].style.display = 'none';
            }
        }

        function next(){
            cls();
            if(current === slide.length-1) current = -1;
            current++;

            slide[current].style.display = 'block';
            slide[current].style.opacity = 0.4;

            var x = 0.4;
            var intX = setInterval(function(){
                x+=0.1;
                slide[current].style.opacity = x;
                if(x >= 1) {
                    clearInterval(intX);
                    x = 0.4;
                }
            }, 100);

        }

        function prev(){
            cls();
            if(current === 0) current = slide.length;
            current--;

            slide[current].style.display = 'block';
            slide[current].style.opacity = 0.4;

            var x = 0.4;
            var intX = setInterval(function(){
                x+=0.1;
                slide[current].style.opacity = x;
                if(x >= 1) {
                    clearInterval(intX);
                    x = 0.4;
                }
            }, 100);

        }

        function start(){
            cls();
            slide[current].style.display = 'block';
        }
        start();
    </script>

</body>
</html>

<?php
?>

