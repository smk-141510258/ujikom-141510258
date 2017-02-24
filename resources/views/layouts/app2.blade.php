<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <br>
    <br>
    <center><h1> SMK ASSALAAM BANDUNG</h1></center>
    <!-- CSRF Token -->

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
     <style type="text/css">
nav {
  margin : 50px auto;
  width  : 100%;
}
menu {
  border-radius : 3px;
}
menu:after , menu:before {
  display : block;
  content : ' ';
}
menu:after {
  clear : both;
}
li {
  list-style-type : none;
  background      : linear-gradient(rgba(220,220,255,0.4) 85%, rgba(255,255,255,0.5) 100%);
  float   : left;
  cursor  : pointer;
  padding : 3px 10px;
  border-top    : 2px solid rgba(200,200,255,0.5);
  border-bottom : 2px solid rgba(50,50,50,0.4);
}
li:first-child {
  border-radius : 5px 0 0 5px;
}
li:last-child {
  border-radius : 0 5px 5px 0;
}
a {
  display : block;
  padding : 10px 13px;
  font-size : 20px;
  text-decoration : none;
  border-radius   : 5px;
  position        : relative;
  top   : 0;
  color : #FFF;     
  transition : all .4s;
}
li:hover a {
  top   : -20px;
  color : #4eacff;
  background-color: #fff;
  box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
  transition : all .4s;
}
li a:after {
  display  : block;
  content  : '';
  position : absolute;
  top  : 100%;
  left : 42%;
  border-style : solid;
  border-color : transparent;
  border-width : 5px 5px 0 5px;
  transition   : all .4s;
}
li:hover a:after {
  border-color : white transparent transparent transparent;
  transition   : all .4s;
}

body{
     background-color:#4169E1;
  }
 .menu2 {
  width : 100%;
}
.menu2 a {
  font-family : georgia;
  font-size   : 14px;
  font-style  : italic;
  text-transform : capitalize;
}
.menu2 li {
  border-right  : 1px solid rgba(200,200,255,0.5);
  border-left   : 1px solid rgba(40,40,40,0.2); 
}
.selected {
  top   : -20px;
  color : #4eacff;
  background-color: #fff;
  box-shadow : 0 0 5px 0 rgba(255, 255, 255, 0.7);
  transition : all .4s;
}
.selected:after {
  border-color : white transparent transparent transparent;
  transition   : all .4s;

}
h1{
    color: white;
    font-family: georgia;
    font-size: 50px;
}
</style>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
}

</head>
<body>

                    <!-- Left Side Of Navbar -->

  




                        
              
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
