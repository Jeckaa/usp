<h1 class="text-center" style="margin-bottom: 25; margin-top: 25;">Brisanje lekara</h1>
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h5>Lekari:</h5>
            <form name="brisanjeLekara" method="post" action="<?php echo site_url('Sluzbenik/brisanjeLekara')?>">
                <ul class="list-group">
                    <?php if (isset($lekari)) {
                        foreach ($lekari as $lekar) {
                            ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="checkbox[]" value="<?php echo $lekar->Username; ?>">
                                <?php echo "$lekar->Username  -  $lekar->Ime $lekar->Prezime"; ?>
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