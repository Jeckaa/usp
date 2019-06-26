<h1 class="text-center" style="margin-bottom: 25; margin-top: 25;">DOBRO DOSLI <?php if(isset($username)) echo strtoupper($username); ?></h1>
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <h5>Lekari:</h5>
            <ul class="list-group">
                <?php if (isset($lekari)) {
                    foreach ($lekari as $lekar) {
                        ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo "$lekar->Username  -  $lekar->Ime $lekar->Prezime";?></li>
                <?php
                    }
                } ?>
            </ul>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <h5>Pacijenti:</h5>
            <ul class="list-group">
                <?php if (isset($pacijenti)) {
                    foreach ($pacijenti as $pacijent) {
                        ?>
                <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo "$pacijent->Username  -  $pacijent->Ime $pacijent->Prezime"; ?></li>
                <?php
                    }
                } ?>
            </ul>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>