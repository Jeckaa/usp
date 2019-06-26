<h1 class="text-center" style="margin-bottom: 25; margin-top: 25;">Dodavanje pacijenta</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12"> 
            <?php if (isset($message)) echo "<p style=\"color:red; text-align:center;\">$message</p>"; ?>
        </div>
    </div>
    <form name="dodavanjePacijenta" method="post" action="<?php echo site_url("Sluzbenik/dodajPacijenta2"); ?>">
        <div class="row text-center">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6 text-center">
                 <div class="form-group">
                    <label for="username">Korisnicko ime:</label>
                    <input type="text" class="form-control" name="username" id="username" maxlength="38" placeholder="Unesite korisnicko ime pacijenta" size="38">
                </div>
            </div>
            <div class="col-sm-3"> </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6 text-center">
                 <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" class="form-control" name="ime" id="ime" maxlength="38" placeholder="Unesite ime pacijenta" size="38">
                </div>
            </div>
            <div class="col-sm-3"> </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6 text-center">
                 <div class="form-group">
                    <label for="prezime">Prezime:</label>
                    <input type="text" class="form-control" name="prezime" id="prezime" maxlength="38" placeholder="Unesite prezime pacijenta" size="38">
                </div>
            </div>
            <div class="col-sm-3"> </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6 text-center">
                 <div class="form-group">
                    <label for="jmbg">JMBG:</label>
                    <input type="text" class="form-control" name="jmbg" id="jmbg" maxlength="13" placeholder="Unesite JMBG pacijenta" size="38">
                </div>
            </div>
            <div class="col-sm-3"> </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6 text-center">
                 <div class="form-group">
                    <label for="adresa">Adresa:</label>
                    <input type="text" class="form-control" name="adresa" id="adresa" maxlength="38" placeholder="Unesite adresu pacijenta" size="38">
                </div>
            </div>
            <div class="col-sm-3"> </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?php if(isset($bolnice)) 
                    { ?>
                        <div class="form-group">
                            <label for="bolnice" style="text-align: center;"><b>Izaberite bolnicu:</b></label>
                            <select class="form-control" id="bolnice" name="bolnica">
                                <option value="null" selected="selected"> -- izaberite bolnicu --</option>
                              <?php
                                  foreach ($bolnice as $bolnica) {
                                      echo "<option value=\"$bolnica->IdBolnica\">$bolnica->Naziv</option>";
                                  }
                              ?>
                            </select>
                          </div>
                <?php  } ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="pass">Lozinka:</label>
                    <input type="password" class="form-control" name="password" id="pass" placeholder="Unesite pacijentovu sifru" maxlength="38">
                </div>    
            </div>
            <div class="col-sm-3"> </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="confpass">Potvrda lozinke:</label>
                    <input type="password" class="form-control" name="conf_pass" id="confpass" placeholder="Unesite potvrdu pacijentove sifre" maxlength="38">
                </div>    
            </div>
            <div class="col-sm-3"> </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3"> </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Potvrdi</button>
                </div>
            </div>
            <div class="col-sm-3"> 
                <div class="form-group">
                    <input type="submit" value="Otkazi" class="btn btn-secondary" formaction="<?php echo site_url("Sluzbenik/index"); ?>">
                </div>
            </div>
            <div class="col-sm-3"> </div>
        </div>
    </form>
</div>