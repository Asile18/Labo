<br>
<?php
    if(!empty($hostel)){
?>
<div style="text-align:center;">
    <h1>Hotel <?= $hostel ?> (<?= $hostelStringStars ?>)</h1>
    <p><?= $hostelRue ?> <?= $hostelNumber ?></p>
    <p><?= $hostelPostCode ?> <?= $hostelCountry ?></p>
</div>
<?php
    }
?>
<div class="containerLogin">
    <img src="<?= $picturePath ?>" alt="Your room" class="roomImg">
    <div  style="width:40%;">
        <h1><?= $roomName ?></h1>
        <h2>
            <?= $roomType ?> ROOM 
            <?php
            if(isset($price1,$price2)){
                if($price1 == $price2 || empty($price2)){
                    echo $price1 . "€" . " par jour";
                }
                else{
                    echo "de " . $price1 . "€ à " . $price2 . "€". " par jour";
                }
            }
            ?>
        </h2>
        <h3><?= $descriptionShort ?></h3>
        <p><?= $description ?></p>
        <p>Capacité enfant(s): <?= $children ?></p>
        <p>Capacité adulte(s): <?= $adults ?></p>
        <p>Salle de bain(s): <?= $bathrooms ?></p>
        <p>Toilette(s): <?= $toilets ?></p>
        <p>Balcon(s): <?= $balcony ?></p> 
    </div>
</div>
<div class="containerLogin">
    <?php if(isset($_GET["daterange"])){ ?>
    <button class="itemGrow" id="reserve">Réserver</button>
    <?php }else{ ?>
    <button class="itemGrow" id="reserve" disabled>Réserver</button>
    <?php } ?>
</div>
<?php
    if(!empty($hostel)){
?>
<div class="containerLogin">
    <div id="meteo">
    </div>
    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=<?= ($hostelLong-0.2) ?>%2C<?= ($hostelLat-0.2) ?>%2C<?= ($hostelLong+0.2) ?>%2C<?= ($hostelLat+0.2) ?>&amp;layer=mapnik&amp;marker=<?= $hostelLat ?>%2C<?= $hostelLong ?>" style="border: 1px solid black">
    </iframe>
</div>
<?php
    }
    if($review){
        $admin = false;
        if(isset($_SESSION["roleId"])){
            if($_SESSION["roleId"] == 2){
                $admin = true;
            }
        }
        if($admin || $approvedReviewCount || $canReview){
?>
<div style="text-align:center;">
    <div style="border:1px solid black; margin:25px;">
        <h2>Avis de la chambre (<?= $reviewStars ?>):</h2>
        <?= $reviewData ?>
    </div>
    <?php
            if($canReview){
    ?>
    <div style="border:1px solid black; margin:25px; padding:5px;">
        <form action="" method="POST">
            <label for="comment">Laisser un commentaire:</label>
            <textarea name="comment" id="comment" cols="30" rows="2"></textarea>
            <br>
            <label for="stars">Note</label>
            <select name="stars" id="stars">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br>
            <input type="submit" value="Envoyer">
        </form>
    </div>
    <?php
            }
    ?>
</div>
<?php
        }
    }
?>
<script>
    <?php
    if(!empty($hostel)){
    ?>
        let uri = "http://api.openweathermap.org/data/2.5/weather?lat=<?= $hostelLat ?>&lon=<?= $hostelLong ?>&appid=dc3c01b6da799bb1d9a45979d60eb196&units=metric";
        
        $.ajax({
            url : uri,
            type : 'GET',
            dataType : 'html',
            success:function(rep, statut){
                let object = eval('('+rep+')');
                $("#meteo").append('<h2>Meteo de ' + object["name"] + '</h2><p>Date: ' + EpochToDate(object["dt"]).toLocaleDateString("fr-BE") + '</p><p>Température: '+ object["main"]["temp"] +'°C</p><img border="0" alt="Jour" title="Jour" src="http://openweathermap.org/img/wn/' + object["weather"][0]["icon"] + '@2x.png" width="100" height="100">');
                if(object["weather"].length == 2){
                    $("#meteo").append('<img border="0" alt="Nuit" title="Nuit" src="http://openweathermap.org/img/wn/' + object["weather"][1]["icon"] + '@2x.png" width="100" height="100">');
                }
            }
        });
    <?php
    } 
    ?>

    $("#reserve").click(function(){
        let link = window.location.href;
        let res = link.substring(0, link.search("section"));
        res = res + "section=reservation";
        window.location.href = res;
    });

    function EpochToDate(epoch) {
        if (epoch < 10000000000)
            epoch *= 1000;
        var epoch = epoch + (new Date().getTimezoneOffset() * -1);       
        return new Date(epoch);
    }
</script>

