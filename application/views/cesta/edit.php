<div id="container" class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center" >Úprava záznamu </h2>
            <br><br>
            <?php
            if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
                foreach ($edit_data as $key => $data) {
                    ?>
                    <form method="post" action="<?php echo base_url('index.php/Cesta/update_data/'.$data['id'].''); ?>" name="data_register">
                        <label for="Datum" style="color: white">Datum</label>
                        <input type="date" class="form-control" name="Datum" value="<?php echo $data['Datum']; ?>" required >
                        <br>
                        <label for="Cena" style="color: white">Cena</label>
                        <input type="number" class="form-control" name="Cena" value="<?php echo $data['Cena']; ?>" required >
                        <br>
                        <label for="title"   style="color: white">Vodič</label>
                        <select class="form-control" name="Vodici_id">
                            <?php
                            if($vodici){
                                foreach($vodici as $vodici){
                                    if($vodici->id == $edit_data->Vodici_ID) {
                                        ?>
                                        <option selected value="<?php echo $vodici->Meno; ?>, <?php echo $vodici->Priezvisko; ?>"><?php echo $vodici->Meno; ?> <?php echo $vodici->Priezvisko; ?></option>
                                        <?php
                                    }else {
                                        ?>
                                        <option value="<?php echo $vodici->Meno; ?>, <?php echo $vodici->Priezvisko; ?>"><?php echo $vodici->Meno; ?> <?php echo $vodici->Priezvisko; ?></option>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        <br>
                        <label for="title"   style="color: white">Odkial</label>
                        <select class="form-control" name="Odkial_id">
                            <?php
                            if($odkial){
                                foreach($odkial as $odkial){
                                    if($odkial->id == $edit_data->Odkial_ID) {
                                        ?>
                                        <option selected value="<?php echo $odkial->Obec; ?>, <?php echo $odkial->Ulica; ?>"><?php echo $odkial->Obec; ?>, <?php echo $odkial->Ulica; ?></option>
                                        <?php
                                    }else {
                                        ?>
                                        <option value="<?php echo $odkial->Obec; ?>, <?php echo $odkial->Ulica; ?>"><?php echo $odkial->Obec; ?>, <?php echo $odkial->Ulica; ?></option>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        <br>
                        <label for="title"   style="color: white">Kam</label>
                        <select class="form-control" name="Kam_id">
                            <?php
                            if($kam){
                                foreach($kam as $kam){
                                    if($kam->id == $edit_data->Kam_ID) {
                                        ?>
                                        <option selected value="<?php echo $kam->Obec; ?>, <?php echo $kam->Ulica; ?>"><?php echo $kam->Obec; ?>, <?php echo $kam->Ulica; ?></option>
                                        <?php
                                    }else {
                                        ?>
                                        <option value="<?php echo $kam->Obec; ?>, <?php echo $kam->Ulica; ?>"><?php echo $kam->Obec; ?>, <?php echo $kam->Ulica; ?></option>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        <br>
                        <a href="<?php echo base_url('index.php/Cesta'); ?>"<button class="btn btn-danger pull">Späť</button></a>
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