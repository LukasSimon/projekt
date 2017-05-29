<div id="container" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center">Pridanie záznamu</h2>
            <br><br>
            <form method="post" action="<?php echo base_url('index.php/Vodici/submit_data'); ?>" name="data_register">
                <label for="Meno" style="color: white">Meno</label>
                <input type="text" class="form-control" name="Meno" required >
                <br>
                <label for="Priezvisko" style="color: white">Priezvisko</label>
                <input type="text" class="form-control" name="Priezvisko" required>
                <br>
                <label for="Telefonne_cislo" style="color: white">Telefonne_cislo</label>
                <input type="number" class="form-control" name="Telefonne_cislo" required>
                <br>

                <label for="title"  style="color: white">Auta</label>
                        <select class="form-control" name="Auta_id">
                            <?php
                            if($auta){
                                foreach($auta as $auta){
                                    ?>
                                    <option value="<?php echo $auta->Znacka; ?>"><?php echo $auta->Znacka;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                <br>
                <a href="<?php echo base_url('index.php/Vodici'); ?>"<button class="btn btn-danger pull">Späť</button></a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <br><br>
            </form>
        </div>
    </div>
</div>