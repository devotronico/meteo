<!------METEO----------------------------------->
<?php
require_once('api.php');
?>
<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
require_once('header-mobile.php');  
} else {
require_once('header-desktop.php');      
}
?>
    <body>
        <div id='container'>
            <div id="titolo">Meteo</div>
            <div id="autore">  
    <p id="copyright">&copy; Daniele Manzi 2017</p>
</div>
            <form>
                <div class="form-group">
                    <label for="city">digitare il nome della città</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="es. Napoli" value="<?=isset($_GET['city'])?$_GET['city']:''?>">
                </div>
                <button type="submit" class="btn btn-primary">Cerca</button>
                <button type="reset" onclick="location.href='index.php'" class="btn btn-danger">Canc</button>               
            </form>
            <?php if (isset($_GET['city'])): ?> 
                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger" role="alert"><?=$errorMessage?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php else: ?>
                    <div id="freccia-container"><a href="#descrizione"><img id="freccia-img" src="arrow-down.svg" alt="freccia"></a></div>
                <?php endif ?>
            <?php endif ?>
        </div>
<?php if (isset($_GET['city'])): ?>   
    <div id='descrizione'> 
     <?php if (!$errorMessage): ?>
        <div id="citta"><?=$weather['city']['name']?>&#44;&nbsp;<?=$weather['city']['country']?></div>
            <div id="geo">geo coords&#91;<?=$weather['city']['coord']['lat']?>&#44;&nbsp;<?= $weather['city']['coord']['lon']?>&#93;</div>  
            <?php $day = ''; $color = 'colore-a';?>
            <?php for ($i=0; $i<count($meteo);$i++) : ?>
                <?php if ( $day != $meteo[$i]['day'] ) : ?>
                    <?php $day = $meteo[$i]['day']; if ($color == 'colore-a') { $color = 'colore-b'; } else { $color = 'colore-a'; } ?>          
                    <div class="day"><b><?=$day?></b>&nbsp;<?=$meteo[$i]['date']?></div>
                <?php endif ?>
                <div class="<?=$color?>">
                    <div class="icona"><img class="icon-meteo" src="http://openweathermap.org/img/w/<?=$meteo[$i]['icona']?>.png"></div>
                    <div class="info">  
                        <p class="paragrafo">
                           <span><img class="hour" src="hour.svg"><?=$meteo[$i]['time']?>&nbsp;<b><?=$meteo[$i]['descr']?></b>&nbsp;</span><span class="altri-dati"><?=$meteo[$i]['pioggia']?><?=$meteo[$i]['neve']?></span><br>
                            <span class="tempAvg"><?=$meteo[$i]['tempAvg']?>&deg;С</span><span class="altri-dati">&nbsp;|&nbsp;temp.&nbsp;da&nbsp;<?=$meteo[$i]['tempMin']?>&deg;С&nbsp;a&nbsp;<?=$meteo[$i]['tempMax']?>&deg;С</span><br> 
                            <span class="altri-dati">nuvole<?=$meteo[$i]['nuvole']?>%&nbsp;|&nbsp;venti<?=$meteo[$i]['vento']?>m/s&nbsp;|&nbsp;umidità<?=$meteo[$i]['umidità']?>%</span>
                        </p> 
                    </div>  
                    <div class="linea"></div>
                </div>
            <?php endfor ?>
    <?php endif ?>
     </div>
<?php endif ?>

<div id='risoluzione'></div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      
      <script>
          
var risoluzione = $(window).width()+17;
$('#risoluzione').html('<p>' + risoluzione + '</p>');
$(window).resize(function() { // This will execute whenever the window is resized
risoluzione = $(window).width()+17;
$('#risoluzione').html('<p>' + risoluzione + '</p>');
}); 
          
 /*         
          function loop() {
    $('#freccia-div').animate({'top': '850'}, {
        duration: 1000, 
        complete: function() {
            $('#freccia-div').animate({top: 800}, {
                duration: 1000, 
                complete: loop});
        }});
}
loop();
*/// SU E GIU ALL INFINITO       
      </script>
  </body>
</html>
