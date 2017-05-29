<div id="container" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center">Pridanie záznamu</h2>
            <br><br>
            <form method="post" action="<?php echo site_url('Kam/submit_data'); ?>" name="data_register">
                <label for="Obec" style="color: white">Obec</label>
                <input type="text" class="form-control" name="Obec" required >
                <br>
                <label for="Ulica" style="color: white">Ulica</label>
                <input type="text" class="form-control" name="Ulica" required>
                <br>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <br><br>
            </form>
        </div>
    </div>
</div>