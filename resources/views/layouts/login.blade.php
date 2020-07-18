
<!DOCTYPE html>
<html>
<head>
 <title>{{ config('app.name', 'Dealapp-Admin') }}</title>	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('img/c.png')}}" type="image/gif" sizes="16x16">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
*{
box-sizing: border-box;
}
html,body{
    margin:0px;
    padding:0px;
    font-family: 'Montserrat', sans-serif;
}
h1{
    margin-top:18px;
    margin-bottom:19px;
    color:rgb(154, 0, 149);
}
.container-fluid{
    width:100%;
    height:730px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    background-color:rgb(236, 240, 249);
}
.leftdiv{
    clip-path: polygon(0 44%, 0% 100%, 100% 100%);
    height:100%;
    width:100%;
    background-color:rgb(154, 0, 149);
    position: absolute;
    left:0px;
    bottom:0px;
    z-index:5;
}
.rightdiv{
    clip-path: polygon(100% 64%, 26% 100%, 100% 100%);
    position: absolute;
    width:100%;
    height:100%;
    bottom:0px;
    background-color:rgb(233, 178, 0);
    right:0px;
    z-index:10;
}
.container{
    width:100%;
    height:100%;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .26);
    position: relative;
    z-index:15;
    background-color: white;
}
.col-md-6:first-of-type{
    position: relative;
}
.col-md-6:first-of-type::after{
    content:"";
    height:75%;
    width:2px;
    background-color: rgb(240, 240, 240);
    position: absolute;
    right:0px;
    border:50%;

}
h6{
    color:rgb(154, 0, 149);
    position:relative;
    margin-bottom:20px;
}
h6::before{
    content:"";
    height:4px;
    width:50px;
    position:absolute;
    top:-10px;
    background-color:rgb(154, 0, 149);
}
.inputwithicon{
    position: relative;
}
.inputwithicon input{
    border:1px solid rgba(120, 120, 120, 0.588);
    border-radius: 20px;
    outline: none;
    padding: 5px 20px;
    width:100%;
    margin-top: 30px;
}
.inputwithicon input:focus{
    border:1px solid rgba(80, 80, 80, 0.78);
}

.inputwithicon i{
    position: absolute;
    right:20px;
    top:15px;
    color:rgba(120, 120, 120);
}

input[type='submit']{
    text-transform: uppercase;
    width:100%;
    letter-spacing: 10px;
    font-size: 12px;
    font-weight: bold;
    background-color:rgb(154, 0, 149);
    color:white;
    border-radius: 20px;
    padding: 10px;
    margin-top: 30px;
    border: 1px solid rgb(154, 0, 149);
    outline: none;
}
input[type='submit']:hover{
    transition: 0.5s;
    background-color: rgb(130, 3, 126);
    color:white;
}
input[type = "submit"]:focus{
    outline:none;
}
a{
    text-align: center;
    color:grey;
    font-size: small;
}
a:first-of-type{
    margin-top: 10px;
}
a:hover{
    text-decoration: none;
    color:black;
}
span{
    color:grey;
}
a:last-of-type{
    margin-bottom: 10px;
}
/* For removing divider at middle scree */
@media only screen and (max-width:768px) {
    .col-md-6:first-of-type::after{
        display:none;
    }

    .col-md-6:last-of-type{
        padding-top:0px !important;
        margin:0px;
    }
    .col-md-6:first-of-type{
        padding:0px !important;
    }
    .inputwithicon input{
        margin-top:20px;
    }
    .inputwithicon i{
        top:30px;
    }
    input[type = "submit"]{
        margin-top:20px;
    }
    img{
        padding:0px !important;
        margin:0px;
    }
  }
</style>
</head>
<body>
@yield('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>







