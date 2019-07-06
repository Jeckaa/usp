<div class="row">
    <div class="col-sm-12"> 
        <?php if (isset($message)) echo "<p style=\"color:red; text-align:center;\">$message</p>"; ?>
    </div>
</div>

<h1 class="text-center" style="margin-top: 25; margin-bottom: 25;">SLANJE PORUKE</h1>
<br>

<div class="container-fluid">
    <form name="PorukaForm" method="post" action="<?php echo site_url("Lekar/posaljiPoruku"); ?>">
        <div class="row">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleSelect1">Za:</label>
                    <select class="form-control" id="exampleSelect1" name="pacSelect">
                        <?php foreach($patients as $patient):?>
                        <option value="<?php echo $patient->Username;?>"><?php echo $patient->Ime;?> <?php echo $patient->Prezime;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="poruka">Sadrzaj poruke:</label>
                    <textarea class="form-control" id="poruka" rows="5" name="sadrzaj"></textarea>
                </div>
            </div>
            <div class="col-sm-3"> </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3"> </div>
            <div class="col-sm-3"> 
                <input type="submit" class="btn btn-success disabled" value="Posalji">
            </div>
            <div class="col-sm-3"> 
                <input type="submit" class="btn btn-danger disabled" value="Otkazi" formaction="<?php echo site_url("Lekar/index"); ?>">
            </div>
            <div class="col-sm-3"> </div>
        </div>
    </form>
</div>