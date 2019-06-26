<h1 class="text-center" style="margin-bottom: 25; margin-top: 25;">Brisanje pacijenata</h1>
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h5>Pacijenti:</h5>
            <form name="brisanjePacijenta" method="post" action="<?php echo site_url('Sluzbenik/brisanjePacijenata')?>">
                <ul class="list-group">
                    <?php if (isset($pacijenti)) {
                        foreach ($pacijenti as $pacijent) {
                            ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="checkbox[]" value="<?php echo $pacijent->Username; ?>">
                                <?php echo "$pacijent->Username  -  $pacijent->Ime $pacijent->Prezime"; ?>
                            </label>
                        </div>
                    </li>
                    <?php
                        }
                    } ?>
                </ul>
                <input type="submit" class="btn btn-primary" value="Izbrisi" style="margin-top: 25; margin-right: 25;">
                <input type="submit" class="btn btn-secondary" value="Otkazi" style="margin-top: 25;" formaction="<?php echo site_url('Sluzbenik/index');?>">
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>