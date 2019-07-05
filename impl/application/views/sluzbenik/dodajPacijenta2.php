<html>
    <head>
        <title>Sluzbenik</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
    </head>
    <body>
        
        <div class="row">
            <div class="col-sm-12"> 
                <?php if (isset($message)) echo "<p style=\"color:red; text-align:center;\">$message</p>"; ?>
            </div>
        </div>
        <div class="container-fluid">
            <h1 class="text-center" style="margin-top: 50;">Izaberite lekara:</h1>
            <div class="row" style="margin-top: 100;">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form name="dodajPacijenta3" method="post" action="<?php echo site_url("Sluzbenik/dodajPacijentaFinal"); ?>">
                          <?php if(isset($lekari)) 
                            { ?>
                                <div class="form-group">
                                    <label for="lekari" style="text-align: center;"><b>Izaberite lekara:</b></label>
                                    <select class="form-control" id="lekari" name="lekar">
                                        <option value="null" selected="selected"> -- izaberite lekara --</option>
                                      <?php
                                          foreach ($lekari as $lekar) {
                                              echo "<option value=\"$lekar->Username\">$lekar->Ime $lekar->Prezime</option>";
                                          }
                                      ?>
                                    </select>
                                  </div>
                        <?php  } ?>
                        <div class="row text-center" style="margin-top: 50; margin-bottom: 170;">
                            <div class="col-sm-3"> </div>
                            <div class="col-sm-3">
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-success disabled" value="Dalje">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger disabled" formaction="<?php echo site_url("Sluzbenik/otkaziDodavanje"); ?>">Otkazi</button>
                                </div>
                            </div>
                            <div class="col-sm-3"> </div>
                        </div> 
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>  
        </div>
    </body>
</html>

