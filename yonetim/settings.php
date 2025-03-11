<?php 
include 'header.php'; 


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
                            <div class="col-md-6 form-group">
                                <label>Site Logo</label>
                                <input type="file" name="site_logo" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Site Başlık</label>
                                <input type="text" name="site_baslik" class="form-control" 
                                       value="<?= $ayar['site_baslik'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>ana Sayfa Açıklama</label>
                                <input type="text" name="home_aciklama" class="form-control" 
                                       value="<?= $ayar['home_aciklama'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Site Açıklama</label>
                                <input type="text" name="site_aciklama" class="form-control" 
                                       value="<?= $ayar['site_aciklama'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Site Link</label>
                                <input type="text" name="site_link" class="form-control" 
                                       value="<?= $ayar['site_link'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Admin Mail</label>
                                <input type="text" name="site__sahip_mail" class="form-control" 
                                       value="<?= $ayar['site__sahip_mail'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Mail Host</label>
                                <input type="text" name="site_mail_host" class="form-control" 
                                       value="<?= $ayar['site_mail_host'] ?? '' ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mail Adresi</label>
                                <input type="text" name="site_mail" class="form-control" 
                                       value="<?= $ayar['site_mail'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Mail Port Numara</label>
                                <input type="text" name="site_mail_port" class="form-control" 
                                       value="<?= $ayar['site_mail_port'] ?? '' ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mail Şifresi</label>
                                <input type="text" name="site_mail_sifre" class="form-control" 
                                       value="<?= $ayar['site_mail_sifre'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>X</label>
                                <input type="text" name="x" class="form-control" 
                                       value="<?= $ayar['x'] ?? '' ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Github</label>
                                <input type="text" name="github" class="form-control" 
                                       value="<?= $ayar['github'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary" name="settings">Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
