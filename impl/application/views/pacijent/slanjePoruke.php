
<h1 class="text-center" style="margin-top: 25; margin-bottom: 25;">SLANJE PORUKE</h1>
<br>
<h2 class="text-center" style="margin-bottom: 50;">Za: <b><?php if(isset($lekar)) echo $lekar;?></b></h2>

<div class="container-fluid">
    <form name="PorukaForm" method="post" action="<?php echo site_url("Pacijent/posaljiPoruku"); ?>">
        <div class="row">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6">
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
                <input type="submit" class="btn btn-danger disabled" value="Otkazi" formaction="<?php echo site_url("Pacijent/index"); ?>">
            </div>
            <div class="col-sm-3"> </div>
        </div>
    </form>
</div>