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


<style> 
*{padding:0;margin:0; } 
html { 
/*background:url(img_meteo_7.png) no-repeat center center fixed;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;*/
}
body{ background-color:dodgerblue;}  
#autore{display:none;}                                
              
/*RESPONSIVE**********************************RESPONSIVE**************************************************RESPONSIVE*/
/*260*******260*******************************GIALLO*************************************************************260*/
@media(min-width:260px){
#risoluzione{display:block;position:fixed;left:2px;bottom:2px;z-index:500;padding:20px;font-weight:bold;background-color:yellow;}   
#container{min-height:100vh;text-align:center;width:100%;background:linear-gradient(to bottom, royalblue, cornflowerblue);}     
#titolo{padding-top:100px;font-weight:bold;color:white;font-size:80px;}
form{padding:50px 2px;margin-top:50px;} 
.form-group{padding:2px;margin:0 auto;width:60%;} 
label{color:white;padding:0;margin:20px 0;font-weight:bold;font-size:20px;}
.btn-primary{margin-top:40px;padding:0 30px;font-weight:bold;font-size:30px;height:60px;}
.btn-danger{margin-top:40px;padding:0 5px;font-weight:bold;font-size:20px;width:60px;height:60px;}
.alert{width:90%;text-align:center;margin:0 auto;}
#freccia-container{position:absolute;bottom:0px;left:50%;transform:translateX(-50%);height:200px;}
#freccia-img{width: 100px;}   
#descrizione{width: 266px;background-color:cornflowerblue;margin:0 auto;}  
#citta{text-align:center;font-size:30px;}  
#geo{text-align:center;}
.day{width:100%;margin:35px auto 0;font-size:16px;border-top:1px dotted lightskyblue;text-align:center;}
.colore-a{width:100%;text-align:center;margin:3px auto;background-color:lightskyblue;}
.colore-b{width:100%;text-align:center;margin:3px auto;background-color:deepskyblue;}
.icona{padding:0;float:left;}
.icon-meteo{width:40px;}
.info{margin-left:5px;font-size:17px;float:left;}
.paragrafo{text-align: center; margin:0;}
.hour{display:none}
.tempAvg{font-weight:bold;}
.altri-dati{display:none;}
.linea{clear:left;}    
}
/*576*******576*******************************VERDE**************************************************************576*/
@media(min-width:576px){
#risoluzione{background-color:green;} 
.form-group{width:50%;}
.alert{width:60%;}  
#descrizione{padding:2px;width:100%;}
.day{width: 330px;}
.colore-a{width:360px;border-radius:8px;}
.colore-b{width:360px;border-radius:8px;} 
.icon-meteo{width:70px;}
.info{font-size:15px;} 
.paragrafo{text-align:left; margin:0;}
.hour{width:12px;margin-right:2px;display:inline;}
.altri-dati{display:inline;font-size:14px;}
}
/*768*******768*******************************BLUE***************************************************************768*/
@media(min-width:768px){
#risoluzione{background-color:blue;} 
.form-group{width:40%;}
.alert{width:50%;}
.day{width:400px;font-size:18px;}
.colore-a{width: 420px;} 
.colore-b{width: 420px;}
.icon-meteo{width:90px;} 
.info{font-size:17px;} 
.hour{width: 14px;}
.altri-dati{font-size:16px;}
   
}
/*992*******992*******************************ROSSO**************************************************************992*/
@media(min-width: 992px){
#risoluzione{background-color:red;} 
form{padding:50px 2px;margin-top:50px;} 
.alert{width:40%;}
}
/*1200***********1200*************************VIOLA*************************************************************1200*/
@media (min-width: 1200px){  
#risoluzione{background-color:violet;}   
.form-group{width:30%;}  
.alert{width:24%;}
.colore-a{border-radius:8px;}  
.colore-b{border-radius:8px;}
}   
    
#freccia-img{
    opacity: 0.5;
    width: 100px;
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
@-webkit-keyframes freccia-up-down{0%{top:0px;}50%{top:100px;}100%{top:0px;}} /* Safari 4.0 - 8.0 */
@keyframes freccia-up-down{0%{top:0px;}50%{top:100px;}100%{top:0px;}} /* Standard syntax */
</style>      
</head>