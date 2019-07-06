<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 style="text-align:center;">Promena radnog mesta</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h5 style="text-align:center;color:red"><?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?></h5>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form name="addForm" method="post" action="<?php echo site_url('Lekar/promenaBolniceFn') ?>">
                <div class="form-group">
                    <label for="exampleSelect1">Izaberite bolnicu</label>
                    <select name="selectBolnica" class="form-control" id="exampleSelect1">
                        <?php foreach ($bolnice as $bolnica): ?>
                            <option value="<?php echo $bolnica->IdBolnica; ?>"><?php echo $bolnica->Naziv; ?> - <?php echo $bolnica->Adresa; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-danger">Izaberi</button>
            </form>
        </div>
    </div>
</div>





