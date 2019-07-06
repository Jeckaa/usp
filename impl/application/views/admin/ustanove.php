<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 style="text-align:center;">Ustanove</h3>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h5 style="text-align:center;color:red"><?php if(isset($msg)) echo $msg;?></h5>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form name="ustanoveForm" method="post" action="<?php echo site_url('Admin/izmeniUstanovu') ?>">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Naziv</th>
                            <th scope="col">Adresa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($bolnice as $bolnica): ?>
                            <tr class="table-info">
                                <th scope="row"><input type="radio" name="bolnica" value="<?php echo $bolnica->IdBolnica; ?>"><?php echo $bolnica->Naziv; ?></th>
                                <td><?php echo $bolnica->Adresa; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
                <button type="submit" class="btn btn-primary">Izmeni</button>
                <button type="submit" formaction="<?php echo site_url('Admin/izbrisiUstanovu') ?>" class="btn btn-primary">Obrisi</button>
            </form>
        </div>
    </div>
</div>

