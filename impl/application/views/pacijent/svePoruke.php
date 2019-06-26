<h1 class="text-center">PORUKE</h1>
<div class="container-fluid">
    <form method="get" action="<?php echo site_url("Pacijent/procitajPoruku");?>">
    <?php if (isset($poruke) && isset($username)) {
        foreach ($poruke as $poruka) {
            if ($poruka->PorukaOd === $username)
            {
               ?>
               <div class="row">
                   <div class="col-sm-12">
                       <div class="card border-secondary mb-3">
                           <div class="card-header">
                               <h6>Za: <?php echo $poruka->PorukaDo; ?><br> </h6>
                               <h6><small>Od: <?php echo $poruka->PorukaOd; ?></small></h6>
                               <h6>Datum: <?php echo $poruka->Datum; ?></h6>
                           </div>
                           <div class="card-body">
                               <p class="card-text"><?php echo $poruka->Sadrzaj; ?></p>
                               <button type="submit" name="idPoruka" class="btn btn-secondary" style="position: absolute; right:5; bottom:5; "value="<?php echo $poruka->IdPoruka; ?>">Procitaj</button>
                           </div>
                       </div>
                   </div>
               </div>
       <?php
            }
            else if( $poruka->Procitana==='1')
            { ?>
                <div class="row">
                   <div class="col-sm-12">
                       <div class="card border-primary mb-3">
                           <div class="card-header">
                               <h6>Od: <?php echo $poruka->PorukaOd; ?><br> </h6>
                               <h6><small>Za: <?php echo $poruka->PorukaDo; ?></small></h6>
                               <h6>Datum: <?php echo $poruka->Datum; ?></h6>
                           </div>
                           <div class="card-body">
                               <p class="card-text"><?php echo $poruka->Sadrzaj; ?></p>
                               <button type="submit" name="idPoruka" class="btn btn-primary" style="position: absolute; right:5; bottom:5; "value="<?php echo $poruka->IdPoruka; ?>">Procitaj</button>
                           </div>
                       </div>
                   </div>
               </div>
           <?php }
            else
            { ?>
                <div class="row">
                   <div class="col-sm-12">
                       <div class="card text-white bg-primary mb-3">
                           <div class="card-header">
                               <h6>Od: <?php echo $poruka->PorukaOd; ?><br> </h6>
                               <h6><small>Za: <?php echo $poruka->PorukaDo; ?></small></h6>
                               <h6>Datum: <?php echo $poruka->Datum; ?></h6>
                           </div>
                           <div class="card-body">
                               <p class="card-text"><?php echo $poruka->Sadrzaj; ?></p>
                               <button type="submit" name="idPoruka" class="btn btn-secondary" style="position: absolute; right:5; bottom:5; "value="<?php echo $poruka->IdPoruka; ?>">Procitaj</button>
                           </div>
                       </div>
                   </div>
               </div>
          <?php  }
     }
    }
    else {
        echo '<h4 class="text-center" style="color: red;">Nemate nijednu poslatu ni primljenu poruku!</h4>';
    }
?>
    </form>
</div>
