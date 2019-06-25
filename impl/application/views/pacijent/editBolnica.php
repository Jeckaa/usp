<div class="row">
    <div class="col-sm-12"> 
        <?php if (isset($message)) echo "<p style=\"color:red; text-align:center;\">$message</p>"; ?>
    </div>
</div>

<div class="container-fluid">
    <h1 class="text-center" style="margin-top: 50;">Promena bolnice</h1>
    <div class="row" style="margin-top: 50;">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form name="editBolnica" method="post" action="<?php echo site_url("Pacijent/editBolnica2"); ?>">
                  <?php if(isset($bolnice)) 
                    { ?>
                        <div class="form-group">
                            <label for="bolnice" style="text-align: center;"><b>Izaberite bolnicu:</b></label>
                            <select class="form-control" id="bolnice" name="bolnica">
                                <option value="<?php echo $idBolnice; ?>" selected="selected"><?php echo $nazivBolnice; ?></option>
                              <?php
                                  foreach ($bolnice as $bolnica) {
                                      echo "<option value=\"$bolnica->IdBolnica\">$bolnica->Naziv</option>";
                                  }
                              ?>
                            </select>
                          </div>
                <?php  } ?>
                <div class="row text-center" style="margin-top: 50; margin-bottom: 170;">
                    <div class="col-sm-3"> </div>
                    <div class="col-sm-3">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success disabled">Dalje</button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-danger disabled" formaction="<?php echo site_url("Pacijent/index"); ?>">Otkazi</button>
                        </div>
                    </div>
                    <div class="col-sm-3"> </div>
                </div> 
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>  
</div>
