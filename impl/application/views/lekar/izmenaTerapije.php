<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 align="center">Terapija #<?php echo $id;?></h3>
        </div>
    </div>
    <div class="row">
        <form name="izmenaTher" method="post">
        <div class="col-sm-12">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="form-group">
                <label for="exampleTextarea">Sadržaj</label>
                <textarea class="form-control" id="exampleTextarea" name="text" maxlength="200" rows="3" name><?php echo $text;?></textarea>
            </div>
            <button type="submit" formaction="<?php echo site_url("Lekar/izmeniTerapijuFn");?>" class="btn btn-primary">Postavi</button>
            <button type="submit" formaction="<?php echo site_url("Lekar/izmenaNazad");?>" class="btn btn-primary">Nazad</button>
        </div>
        </form>
    </div>
</div>
