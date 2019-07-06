<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 style="text-align:center;">Brisanje sluzbenika</h3>
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
            <form name="addForm" method="post" action="<?php echo site_url('Admin/izbrisiSluzbenikaFn') ?>">
                <div class="form-group">
                    <label for="exampleSelect1">Izaberite sluzbenika</label>
                    <select name="selectSluzbenik" class="form-control" id="exampleSelect1">
                        <?php foreach ($sluzbenici as $sluzbenik): ?>
                            <option value="<?php echo $sluzbenik->Username; ?>"><?php echo $sluzbenik->Username; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-danger">Obrisi</button>
            </form>
        </div>
    </div>
</div>



