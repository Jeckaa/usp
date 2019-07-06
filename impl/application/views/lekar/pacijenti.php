<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 align="center">Pregled pacijenata</h3>
        </div>
        <form name="selectPacijent" method="post">
            <div class="form-group">
                <label for="exampleSelect1">Izaberite pacijenta</label>
                <select name="selectPacijent" class="form-control" id="exampleSelect1">
                    <?php foreach($patients as $patient):?>
                    <option value="<?php echo $patient->Username;?>"><?php echo $patient->Ime;?> <?php echo $patient->Prezime;?></option>
                    <?php endforeach;?>
                </select>
                <button type="submit" formaction="<?php echo site_url("Lekar/merenja");?>" class="btn btn-primary">Pregled merenja</button>
                <button type="submit" formaction="<?php echo site_url("Lekar/terapije");?>" class="btn btn-primary">Pregled terapija</button>
                <button type="submit" formaction="<?php echo site_url("Lekar/dodajTerapiju");?>" class="btn btn-primary">Dodaj Terapiju</button>
                
            </div>
        </form>
    </div>
        </form>
    </div>
</div>