<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 align="center"><?php echo $ime . " - Terapije"?></h3>
        </div>
    </div>
    <form name="Terapije" method="post">
    <div class="row">
        <div class="col-sm-12">
            <?php foreach($terapije as $terapija):?>
            <div class="card border-secondary" style="max-width: 20rem;">
                <div class="card-header"><input type="radio" name="theradio" value="<?php echo $terapija->IdTerapija; ?>">Terapija #<?php echo $terapija->IdTerapija;?></div>
                <div class="card-body">
                    <h4 class="card-title">Opis:</h4>
                    <p class="card-text"><?php echo $terapija->Opis;?></p>
                    
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button type="submit" formaction="<?php echo site_url("Lekar/obrisiTerapiju");?>" class="btn btn-primary">Obriši</button>
            <button type="submit" formaction="<?php echo site_url("Lekar/izmeniTerapiju");?>" class="btn btn-primary">Izmeni</button>
            <button type="submit" formaction="<?php echo site_url("Lekar/pacijenti");?>" class="btn btn-primary">Nazad</button>
        </div>
    </div>
    </form>
</div>
</div>
        
