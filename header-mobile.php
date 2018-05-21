<!DOCTYPE html>
<html lang="it">
<head>
<title>Meteo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<!--FAVICON-->


<!--
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
-->


<style type='text/css'>   
*{padding:0;margin:0;}            
html {
/*background:url(img_meteo_7.png) no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;*/
}
body{background-color:dodgerblue;overflow-x:hidden;}                      
#risoluzione {
    display: none;
    position: fixed;
    left: 1px;
    bottom: 1px;
    z-index: 5000;
    padding:8px;
    font-weight: bold;
    border-radius: 50%;
}                             
/*RESPONSIVE**********************************RESPONSIVE**************************************************RESPONSIVE*/
/*PORTRAIT************************************PORTRAIT******************************************************PORTRAIT*/
@media screen and (orientation: portrait) {
/*260*******260**************************************************************************************************260*/
@media(min-width:260px){
#risoluzione{background-color:yellow;} 
#container{min-height:100vh;text-align:center;width:100%;background:linear-gradient(to bottom, royalblue, cornflowerblue);}
#titolo{padding-top:35px;font-weight:bold;color:white;font-size:80px;}
#autore{display:none;}     
form{padding:5px;} 
.form-group{padding:5px;margin:0 auto;width:90%;}
label{color:white;margin-top:20px;font-weight:bold;font-size:20px;}
.btn-primary{margin-top:40px;padding:0 30px;font-weight:bold;font-size:30px;height:60px;}
.btn-danger{margin-top:40px;padding:0 5px;font-weight:bold;font-size:20px;width:60px;height:60px;}
.alert{width:90%;text-align:center;margin:0 auto;}
#freccia-container{position:absolute;bottom:0px;left:50%;transform:translateX(-50%);height:80px;}
#freccia-img{width: 100px;}  
#descrizione{background-color:cornflowerblue;width:100%;margin:0 auto;}  
#citta{text-align:center;font-size:30px;}
#geo{text-align:center;}
.day{width: 310px;margin:35px auto 0;font-size:16px;border-top:1px dotted lightskyblue;text-align: center;}
.colore-a{width: 310px;text-align:center;margin:2px auto;border-radius:8px;background-color:lightskyblue;}
.colore-b{width: 310px;text-align:center;margin:2px auto;border-radius:8px;background-color:deepskyblue;}
.icona{padding:0;float:left;}
.icon-meteo{width:38px;}
.info{font-size:15px;float:left;} 
.paragrafo{text-align:left;margin:0;}
.hour{width:12px;margin-right:2px;display:none;}
/*.hour{width: 12px;margin-right:2px;}*/
.tempAvg{font-weight: bold;}
.altri-dati{display:inline;font-size:14px;}
.linea{clear:left;}       
}
/*576*******576***************************************************************************************************/
@media (min-width: 576px) {
#risoluzione{background-color:green;}  
.hour{display:inline;}
}
/*768*******768***************************************************************************************************/
@media (min-width: 768px){
#risoluzione{background-color:blue;} 
.hour{width:12px;margin-right:2px;display:block;}
}
/*992*******992***************************************************************************************************/
@media (min-width: 992px){
#risoluzione{background-color:red;} 
.hour{width:12px;margin-right:2px;display:block;}
}
/*1200***********1200*********************************************************************************************/
@media (min-width: 1200px){  
#risoluzione{background-color:violet;}
.hour{width:12px;margin-right:2px;display:block;}
}   
                   
#freccia-img{
    opacity: 0.5;
    width: 50px;
    position: relative;
    -webkit-animation-name: freccia-up-down; /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 3s; /* Safari 4.0 - 8.0 */
    -webkit-animation-timing-function: ease; /* Safari 4.0 - 8.0 */
    -webkit-animation-iteration-count: infinite; /* Safari 4.0 - 8.0 */
    animation-name: freccia-up-down;
    animation-duration: 3s;
    animation-timing-function: ease;
    animation-iteration-count: infinite;
}
@-webkit-keyframes freccia-up-down{0%{top:0px;}50%{top:30px;}100%{top:0px;}} /* Safari 4.0 - 8.0 */
@keyframes freccia-up-down{0%{top:0px;}50%{top:30px;}100%{top:0px;}} /* Standard syntax */
}
/*LANDSCAPE**********************************LANDSCAPE**************************************************LANDSCAPE*/
@media screen and (orientation: landscape) {
    #risoluzione{background-color:yellow;}
#container{min-height:100vh;text-align:center;width:100%;background:linear-gradient(to bottom, royalblue, cornflowerblue);}
#titolo{padding-top:35px;font-weight:bold;color:white;font-size:120px;}
#autore{display:block;padding:0px 0 50px;text-align:center;} 
#autore p{font-size:20px}
/*
.social{list-style-type:none;padding:0;margin:0;} 
.social li{display:inline;margin-right:10px;}
*/
#copyright {margin:10px;padding:10px;}     
form{display:none;} 
#freccia-container{display:none;}
#descrizione{display:none;}
.alert{display:none;} 
}
</style>      
</head>