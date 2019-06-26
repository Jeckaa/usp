<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 align="center"><?php echo $ime . " - Merenja"?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php foreach($merenja as $merenje):
                $tip = "";
                switch($merenje->Tip){
                case "K":
                    $tip = "Analiza Krvi";
                    break;
                case "P":
                    $tip = "Merenje Pulsa";
                    break;
                case "R":
                    $tip = "Merenje Krvnog Pritiska";
                    break;
                }?>
            <div class="card border-primary" style="max-width: 20rem;">
                <div class="card-header"><?php echo $tip;?></div>
                <div class="card-body">
                    <h4 class="card-title">Rezultati:</h4>
                    <p class="card-text"><?php echo $merenje->Podaci;?></p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
