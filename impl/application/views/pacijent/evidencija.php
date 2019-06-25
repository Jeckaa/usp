<div class="container-fluid">
    
    <?php if (isset($merenja)) {$i=0; foreach ($merenja as $merenje) {
        if ($i===0)
        { ?>
            <div class="row" style="margin-top: 15;">
                <div class="col-sm-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header"><?php echo "Tip: $merenje->Tip <br> Datum: $merenje->Datum";  ?></div>
                        <div class="card-body">
                            <h5 class="card-title">Podaci:</h5>
                            <p class="card-text"><?php echo $merenje->Podaci; ?></p>
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
                        <div class="card-header"><?php echo "Tip: $merenje->Tip <br> Datum: $merenje->Datum";  ?></div>
                        <div class="card-body">
                            <h5 class="card-title">Podaci:</h5>
                            <p class="card-text"><?php echo $merenje->Podaci; ?></p>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        $i=0;}
?>
    <?php } }
    else echo "<h2> Nemate podatke o merenjima jer ih jos niste obavili! </h2>"; ?>
    
</div>