<?php if (isset($poruka)) { ?>
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h3 style="margin-top: 25;">Od: <?php echo $poruka->PorukaOd; ?></h3>
            <h3>Za: <?php echo $poruka->PorukaDo; ?></h3>
            <h3>Datum: <?php echo $poruka->Datum; ?></h3>
            <br><hr><br>
            <textarea readonly="true" rows="5" style="width: 100%; resize: none;"><?php echo $poruka->Sadrzaj; ?></textarea>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row text-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form name="backForm" action="<?php echo site_url("Pacijent/pregledPoruka");?>">
                <input type="submit" class="btn btn-primary" style="margin-top: 25;" value="Nazad">
            </form>
        </div> 
        <div class="col-sm-3"></div>
    </div>
</div>
<?php }
    else { echo "Nemate pristup ovoj strani!";}
?>
