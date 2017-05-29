<div id="container" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center">Pridanie záznamu</h2>
            <br><br>
            <form method="post" action="<?php echo base_url('index.php/Sluzba/submit_data'); ?>" name="data_register">
                <label for="Datum" style="color: white">Datum</label>
                <input type="date" class="form-control" name="Datum" required >
                <br>
                <label for="title"  style="color: white">Vodiči</label>
                <select class="form-control" name="Vodici_id">
                    <?php
                    if($vodici){
                        foreach($vodici as $vodici){
                            ?>
                            <option value="<?php echo $vodici->Meno; ?> <?php echo $vodici->Priezvisko;?>"><?php echo $vodici->Meno;?><?php echo $vodici->Priezvisko;?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <br>
                <a href="<?php echo base_url('index.php/Sluzba'); ?>"<button class="btn btn-danger pull">Späť</button></a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <br><br>
            </form>
        </div>
    </div>
</div>