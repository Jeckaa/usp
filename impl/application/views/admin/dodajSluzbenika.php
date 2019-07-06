<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 style="text-align:center;">Dodavanje sluzbenika</h3>
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
            <form name="addForm" method="post" action="<?php echo site_url('Admin/dodajSluzbenikaFn') ?>">
                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Korisnicko ime</label>
                    <input type="text" class="form-control" name="username" id="inputDefault">
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Lozinka</label>
                    <input type="password" class="form-control" name="pass" id="inputDefault1">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="inputDefault">Potvrda lozinke</label>
                    <input type="password" class="form-control" name="confPass" id="inputDefault2">
                </div>
                <button type="submit" class="btn btn-danger">Dodaj</button>
            </form>
        </div>
    </div>
</div>


