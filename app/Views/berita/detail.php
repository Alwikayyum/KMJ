<div class="row">
    <div class="col-md-3">
        <img src="/assets/uploads/images/<?= $berita->sampul ? $berita->sampul : 'no-image.png'; ?>" height="300" class="w-100 rounded">
    </div>
    <div class="col-md-9">
        <table class="text-black table">
            <tr class="align-text-top">
                <td width="150px">Judul </td>
                <td width="5px">:</td>
                <td class="font-weight-bold"><?= $berita->judul; ?></td>
            </tr>
            <tr class="align-text-top">
                <td>Penulis</td>
                <td>:</td>
                <td class="font-weight-bold"><?= $berita->penulis; ?></td>
            </tr>
            <tr class="align-text-top">
                <td>Tanggal</td>
                <td>:</td>
                <td class="font-weight-bold"><?= tanggalIndo($berita->created_at); ?></td>
            </tr>
        </table>
        <tr class="align-text-top">
            <td class="font-weight-bold"><?= $berita->isi; ?></td>
        </tr>
    </div>
</div>