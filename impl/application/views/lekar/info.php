
<div class="container-fluid">
    <h1 class="text-center" style="margin-bottom: 25; margin-top: 25;">  Dobro dosli <?php if(isset($ime) && isset($prezime)) echo "$ime $prezime"; ?>! </h1>    
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <table class="table table-hover align-items-center">
                <tbody>
                    <tr>
                        <th scope="row">Korisnicko ime:</th>
                        <td><?php if(isset($username)) echo $username; ?></td>
                    </tr>
                    <tr class="table-active">
                        <th scope="row">Ime:</th>
                        <td><?php if(isset($ime)) echo $ime; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Prezime:</th>
                        <td><?php if(isset($prezime)) echo $prezime; ?></td>
                    </tr>
                    <tr class="table-active">
                        <th scope="row">JMBG:</th>
                        <td><?php if(isset($JMBG)) echo $JMBG; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Adresa:</th>
                        <td><?php if(isset($adresa)) echo $adresa; ?></td>
                    </tr>
                    <tr class="table-active">
                        <th scope="row">Bolnica:</th>
                        <td><?php if(isset($bolnica)) echo $bolnica;?><text style="color:red;"><i><?php if($active==0) echo "[UGAŠENA USTANOVA]";?></i></text</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <form action="<?php echo site_url("Lekar/promeniUstanovu"); ?>" method="post">
        <div class="row">
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3 text-center">
                <input type="submit" class="btn btn-success"  value="Promeni bolnicu">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>