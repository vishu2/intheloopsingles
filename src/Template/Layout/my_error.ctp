<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Error Page</title>

<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">

<style>
	* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
  border-top: 2px solid #f99827;
  overflow: hidden;
}

.st0{font-family:'FootlightMTLight';}
.st1{font-size:83.0285px;}
.st2{fill:gray;}

svg{
  width: 300px;
    height: 200px;
    text-align: center;
    fill: #16a085;
}
path#XMLID_5_ {
   
    fill: #16a085;
    filter: url(#blurFilter4);
}
path#XMLID_11_ ,path#XMLID_2_ {
    fill: #16a085;
}
.circle{
  animation: out 2s infinite ease-out;
  fill: #16a085;
}

#container{
  text-align:center;
  margin-top: 7%;
}
.message{
  color:#16a085;
}
.message:after{
  content:"]";
}
.message:before{
  content:"[";
}

.message:after, .message:before {
  
  color: #16a085;
  font-size: 20px;
  -webkit-animation-name: opacity;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-name: opacity;
          animation-name: opacity;
  -webkit-animation-duration: 2s;
          animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
          margin:0 50px;
}

@-webkit-keyframes opacity {
  0%, 100% {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
}

@keyframes opacity {
  0%, 100% {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
}

@keyframes out {
  0% {r:1;  opacity: 0.9 ;}
  25%{r:5;  opacity: 0.3 ;}
  50%{r:10; opacity: 0.2 ;}
  75%{r:15;opacity:0.1;}
  100% {r:20;opacity:0;}
}




.notfound {
  max-width: 520px;
  width: 100%;
  text-align: center;
  line-height: 1.4;
margin:0 auto;
}
.notfound a {
    font-family: 'Montserrat', sans-serif;
    display: inline-block;
    padding: 6px 30px;
    font-weight: 600;
    background-color: #f99827;
    color: #fff;
    border-radius: 0px;
    box-shadow: 3px 2px 4px #945800;
    text-decoration: none;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
    margin: 20px 10px;
    letter-spacing: 2px;
    border:2px solid #f99827;
}
.notfound a:hover{
	background: #ffffff;
    color: #f99827;
    font-weight: 600;
    border:2px solid #f99827;
}

.notfound p {
    font-family: 'Montserrat', sans-serif;
    color: #787878;
    font-weight: 300;
    font-size: 15px;
}
.notfound h2 {
    font-family: 'Montserrat', sans-serif;
    font-size: 22px;
    font-weight: 700;
    margin: 0;
    text-transform: uppercase;
    color: #232323;
}


  
@media only screen and (max-width: 767px) {
  .notfound .notfound-404 {
    height: 115px;
  }
  .notfound .notfound-404 h1 {
    font-size: 86px;
  }
  .notfound .notfound-404 h1>span {
    width: 86px;
    height: 86px;
  }
}

</style>


<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body>
	<div style="background-color: #f0f3fb;
    height: 78px;
    box-shadow: 0px 0px 4px 0px #989795;
    padding:10px;
    text-align: center;"><a class="navbar-brand" href="/"> <img src="/img/logo.png" alt="" height="50px"></a></div>
<div id="container">

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 200 82.7" style="enable-background:new 0 0 200 82.7;" xml:space="preserve">

<g id="Calque_1">
  <text id="XMLID_3_" transform="matrix(1.2187 0 0 1 13 75.6393)" class="st0 st1">4</text>
  <text id="XMLID_4_" transform="matrix(1.2187 0 0 1 133.0003 73.6393)" class="st0 st1">4</text>
</g>
<g id="Calque_2">
<g>
  <path id="XMLID_11_" d="M81.8,29.2c4.1-5.7,10.7-9.4,18.3-9.4c6.3,0,12.1,2.7,16.1,6.9c0.6-0.4,1.1-0.7,1.7-1.1
    c-4.4-4.8-10.8-7.9-17.8-7.9c-8.3,0-15.6,4.2-20,10.6C80.7,28.5,81.3,28.8,81.8,29.2z"/>
    <path id="XMLID_2_" d="M118.1,53.7c-4,5.7-10.7,9.5-18.2,9.5c-6.3,0-12.1-2.6-16.2-6.8c-0.6,0.4-1.1,0.7-1.7,1.1
    c4.4,4.8,10.8,7.8,17.9,7.8c8.3,0,15.6-4.3,19.9-10.7C119.2,54.5,118.6,54.1,118.1,53.7z"/>
     <animateTransform attributeName="transform" type="rotate" from="360 100 41.3" to="0 100 41.3" dur="10s" repeatCount="indefinite" />
  </g>
  <g id="XMLID_6_">
  <g  id="XMLID_18_"> 
    

      
      <circle class="circle"  cx="100" cy="41" r="1"></circle>
    </g>
  </g><defs>
      <filter id="blurFilter4" x="-20" y="-20" width="200" height="200">
        <feGaussianBlur in="SourceGraphic" stdDeviation="2" />
      </filter>
    </defs>
  <path    id="XMLID_5_" class="st2" d="M103.8,16.7c0.1,0.3,0.1,0.6,0.1,0.9c11.6,1.9,20.4,11.9,20.4,24.1c0,13.5-10.9,24.4-24.4,24.4
  S75.6,55.1,75.6,41.7c0-3.2,0.6-6.3,1.7-9.1c-0.3-0.2-0.5-0.3-0.7-0.5c-1.2,3-1.9,6.2-1.9,9.6c0,14,11.3,25.3,25.3,25.3
  s25.3-11.3,25.3-25.3C125.3,29,115.9,18.5,103.8,16.7z"/>


</g>
</svg>

</div>

<div class="notfound">
<?= $this->Flash->render() ?>

 <?= $this->fetch('content') ?>
  <?= $this->Html->link(__('BACK'), 'javascript:history.back()') ?>
  <?= $this->Html->link(__('GO TO HOMEPAGE'), 'javascript:history.back()') ?>
</div>
</div>
</div>
</body>
</html>