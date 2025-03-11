<?php 
include 'header.php'; 

$sorgu=$db->prepare("SELECT *FROM kullanicilar WHERE kul_id=:kul_id");
$sorgu->execute([
    'kul_id' =>$_SESSION['kul_id']
]);
$kullanici=$sorgu->fetch(PDO::FETCH_ASSOC);

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="font-weight-bold text-primary">Profil</h5>
                </div>
                <div class="card-body">
                    <form action="controller/ajax.php" method="post">
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>İsim</label>
                                <input class="form-control " type="text" value="<?php echo $kullanici['kul_isim']?>" name="kul_isim" placeholder="isim girin">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mail</label>
                                <input class="form-control " type="text" value="<?php echo $kullanici['kul_mail']?>" name="kul_mail" placeholder="Mail girin">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Şifre</label>
                                <input class="form-control " type="text" name="kul_sifre" placeholder="şifre girin">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Telefon</label>
                                <input class="form-control " type="text" value="<?php echo $kullanici['kyl_telefon']?>" name="kyl_telefon" placeholder="Telefon girin">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="profilKaydet" >Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>