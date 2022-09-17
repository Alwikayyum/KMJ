<div class="row">
    <div class="col-md-5">
        <img src="/assets/uploads/galeri/<?= $foto->imggaleri ? $foto->imggaleri : 'no-image.png'; ?>" height="300" class="w-100 rounded">
    </div>
    <div class="col-md-7">
        <table class="text-black table">
            <tr class="align-text-top">
                <td width="150px">Judul </td>
                <td width="5px">:</td>
                <td class="font-weight-bold"><?= $foto->judul; ?></td>
            </tr>
        </table>
    </div>
</div>