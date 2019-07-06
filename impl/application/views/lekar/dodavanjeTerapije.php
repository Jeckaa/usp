<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 align="center"><?php echo $ime . " - Nova Terapija"?></h3>
        </div>
    </div>
    <form name="Terapije" method="post" action="<?php echo site_url("Lekar/dodajTerapijuFn");?>">
        <input type="hidden" name="userPac" value="<?php echo $usernamePac;?>">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                    <label for="poruka">Opis Terapije:</label>
                    <textarea class="form-control" id="poruka" maxlength="200" rows="5" name="sadrzaj"></textarea>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button type="submit"  class="btn btn-primary">Dodaj</button>
            <button type="submit" formaction="<?php echo site_url("Lekar/pacijenti");?>" class="btn btn-primary">Nazad</button>
        </div>
    </div>
    </form>
</div>
</div>
        
