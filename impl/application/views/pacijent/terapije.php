<h1 class="text-center" style="margin-top: 25; margin-bottom: 25;">TERAPIJE</h1>

<div class="container-fluid">
    <?php if(isset($terapije)) { $i=0; foreach ($terapije as $terapija) {
        if ($i===0)
        { ?>
            <div class="row" style="margin-top: 15;">
                <div class="col-sm-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header"><?php echo "Lekar: $terapija->Lekar <br> Datum: $terapija->Datum";  ?></div>
                        <div class="card-body">
                            <h5 class="card-title">Opis:</h5>
                            <p class="card-text"><?php echo $terapija->Opis; ?></p>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            $i=1;
        }
        else
        {
            ?>
            <div class="row" style="margin-top: 15;">
                <div class="col-sm-12">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header"><?php echo "Tip: $terapija->Lekar <br> Datum: $terapija->Datum";  ?></div>
                        <div class="card-body">
                            <h5 class="card-title">Opis:</h5>
                            <p class="card-text"><?php echo $terapija->Opis; ?></p>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        $i=0;}
?>
    <?php } }
    else {
        echo '<h4 class="text-center" style="color: red;">Nemate nijednu terapiju!</h4>';
    }
?>
</div>