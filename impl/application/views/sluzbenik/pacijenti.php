<h1 class="text-center" style="margin-bottom: 25; margin-top: 25;">Svi pacijenti u sistemu</h1>
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
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
        <div class="col-sm-3"></div>
    </div>
</div>
