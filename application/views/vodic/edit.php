<div id="container" class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center" >Úprava záznamu </h2>
            <br><br>
            <?php
            if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
                foreach ($edit_data as $key => $data) {
                    ?>
                    <form method="post" action="<?php echo base_url('index.php/Vodici/update_data/'.$data['id'].''); ?>" name="data_register">
                        <label for="Meno" style="color: white">Meno</label>
                        <input type="text" class="form-control" name="Meno" value="<?php echo $data['Meno']; ?>" required >
                        <br>
                        <label for="Priezvisko" style="color: white">Priezvisko</label>
                        <input type="text" class="form-control" name="Priezvisko" value="<?php echo $data['Priezvisko']; ?>" required>
                        <br>
                        <br>
                        <label for="Telefonne_cislo" style="color: white">Telefonne cislo</label>
                        <input type="number" class="form-control" name="Telefonne_cislo" value="<?php echo $data['Telefonne_cislo']; ?>" required>
                        <br>
                        <br>
                        <label for="title"   style="color: white">Auta</label>
                            <select class="form-control" name="Auta_id">
                                <?php
                                    if($auta){
                                        foreach($auta as $auta){
                                            if($auta->id == $edit_data->Auta_ID) {
                                                ?>
                                                <option selected value="<?php echo $auta->Znacka; ?>"><?php echo $auta->Znacka; ?></option>
                                                <?php
                                            }else {
                                                ?>
                                                <option value="<?php echo $auta->Znacka; ?>"><?php echo $auta->Znacka; ?></option>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                        <br>
                        <a href="<?php echo base_url('index.php/Vodici'); ?>"<button class="btn btn-danger pull">Späť</button></a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        <br><br>
                    </form>
                    <?php
                }endif;
            ?>
            <br><br>
        </div>
    </div>

</div>