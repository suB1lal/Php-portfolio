<?php 
include 'header.php'; 
$sorgu = $db->prepare("SELECT * FROM sayfalar WHERE id = :id");
$sorgu->execute(['id' => 1]);
$sayfa = $sorgu->fetch(PDO::FETCH_ASSOC);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="font-weight-bold text-primary">Ayarlar</h5>
                </div>
                <div class="card-body">
                    <form action="controller/ajax.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label>Tanıtım </label>
                                <input type="text" name="tanitim_sayfasi" class="form-control" 
                                       value="<?= $sayfa['tanitim_sayfasi'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label>Projeler </label>
                                <input type="text" name="calismalarim_sayfasi" class="form-control" 
                                       value="<?= $sayfa['calismalarim_sayfasi'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label>Hakkımda </label>
                                <input type="text" name="hakkimda_sayfasi" class="form-control" 
                                       value="<?= $sayfa['hakkimda_sayfasi'] ?? '' ?>">
                            </div>
                        </div>

              
                  
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary" name="pages">Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
