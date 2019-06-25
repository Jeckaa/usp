<div class="row">
    <div class="col-sm-12"> 
        <?php if (isset($message)) echo "<p style=\"color:red; text-align:center;\">$message</p>"; ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row" style="margin-top: 25;">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form name="editForm" method="post" action="<?php echo site_url("Pacijent/promeniPodatke"); ?>">
                <div class="form-group">
                  <label for="ime">Ime:</label>
                  <input type="text" name="ime" class="form-control" id="ime" placeholder="<?php if(isset($ime)) echo $ime; ?>">
                </div>
                <div class="form-group">
                  <label for="prezime">Prezime:</label>
                  <input type="text" name="prezime" class="form-control" id="prezime" placeholder="<?php if(isset($prezime)) echo $prezime; ?>">
                </div>
                <div class="form-group">
                  <label for="adresa">Adresa:</label>
                  <input type="text" name="adresa" class="form-control" id="adresa" placeholder="<?php if(isset($adresa)) echo $adresa; ?>">
                </div>
                <?php if(isset($lekari)) 
                { ?>
                <div class="form-group">
                  <label for="lekari">Lekar:</label>
                  <select class="form-control" id="lekari" name="lekar">
                      <option value="<?php echo $lekarUsername; ?>" selected="selected"><?php echo $lekarImePrez; ?></option>
                    <?php
                        foreach ($lekari as $lekar) {
                            echo "<option value=\"$lekar->Username\">$lekar->Ime $lekar->Prezime</option>";
                        }
                    ?>
                  </select>
                </div>
                <?php  } ?>
                <div class="form-group">
                  <label for="password">Lozinka:</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="row text-center">
                    <div class="col-sm-3"> </div>
                    <div class="col-sm-6">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Potvrdi</button>
                        </div>
                    </div>
                    <div class="col-sm-3"> </div>
                </div> 

            </form>            
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>


