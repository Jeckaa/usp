<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 style="text-align:center;">Dodavanje ustanova</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h5 style="text-align:center;color:red"><?php if(isset($msg)) {echo $msg;}?></h5>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form name="addForm" method="post" action="<?php echo site_url('Admin/dodajUstanovuFn') ?>">
                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Naziv</label>
                    <input type="text" class="form-control" name="naziv" placeholder="Ime ustanove" id="inputDefault">
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Adresa</label>
                    <input type="text" class="form-control" name="adresa" placeholder="Adresa ustanove" id="inputDefault">
                </div>
                <button type="submit" class="btn btn-danger">Dodaj</button>
            </form>
        </div>
    </div>
</div>

