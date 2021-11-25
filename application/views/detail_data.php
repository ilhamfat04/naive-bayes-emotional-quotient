<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/cotton/64/000000/artificial-intelligence.png" />
    <link rel="stylesheet" href="<?= base_url('assets/css/particles.css') ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Naive Bayes</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="table-responsive">
                    <table class="table table-bordered rounded  table-sm" style="background-color: aliceblue;">
                        <thead class="text-center thead-dark">
                            <tr>
                                <th rowspan="2" class="align-middle">Variabel</th>
                                <th rowspan="2" class="align-middle">Subvariabel</th>
                                <th colspan="5">Kelas Klasifikasi</th>
                            </tr>
                            <tr>
                                <th>Sangat Rendah</th>
                                <th>Rendah</th>
                                <th>Sedang</th>
                                <th>Tinggi</th>
                                <th>Sangat Tinggi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="6" class="align-middle text-center">Durasi</th>
                            </tr>
                            <?php foreach ($durasi as $r) : ?>
                                <tr>
                                    <td class="px-4"><?= $r['durasi'] ?></td>
                                    <td class="text-center"><?= $r['Sangat_Rendah'] ?></td>
                                    <td class="text-center"><?= $r['Rendah'] ?></td>
                                    <td class="text-center"><?= $r['Sedang'] ?></td>
                                    <td class="text-center"><?= $r['Tinggi'] ?></td>
                                    <td class="text-center"><?= $r['Sangat_Tinggi'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr>
                                <th rowspan="6" class="align-middle text-center">Konten</th>
                            </tr>
                            <?php foreach ($konten as $r) : ?>
                                <tr>
                                    <td class="px-4"><?= $r['konten'] ?></td>
                                    <td class="text-center"><?= $r['Sangat_Rendah'] ?></td>
                                    <td class="text-center"><?= $r['Rendah'] ?></td>
                                    <td class="text-center"><?= $r['Sedang'] ?></td>
                                    <td class="text-center"><?= $r['Tinggi'] ?></td>
                                    <td class="text-center"><?= $r['Sangat_Tinggi'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th rowspan="6" class="align-middle text-center">Tujuan</th>
                            </tr>
                            <?php foreach ($tujuan as $r) : ?>
                                <tr>
                                    <td class="px-4"><?= $r['tujuan'] ?></td>
                                    <td class="text-center"><?= $r['Sangat_Rendah'] ?></td>
                                    <td class="text-center"><?= $r['Rendah'] ?></td>
                                    <td class="text-center"><?= $r['Sedang'] ?></td>
                                    <td class="text-center"><?= $r['Tinggi'] ?></td>
                                    <td class="text-center"><?= $r['Sangat_Tinggi'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="text-center  thead-dark">
                                <th colspan="2">Total Data Per Kelas Klasifikasi</th>
                                <?php if (count($total) == 4) { ?>
                                    <th>0</th>
                                    <th><?= $total[0]->Total ?></th>
                                    <th><?= $total[2]->Total ?></th>
                                    <th><?= $total[3]->Total ?></th>
                                    <th><?= $total[1]->Total ?></th>
                                <?php } else { ?>
                                    <th><?= $total[1]->Total ?></th>
                                    <th><?= $total[0]->Total ?></th>
                                    <th><?= $total[3]->Total ?></th>
                                    <th><?= $total[4]->Total ?></th>
                                    <th><?= $total[2]->Total ?></th>
                                <?php } ?>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2">
                <a class="align-middle" href="<?= base_url('Naive_bayes') ?>" style="color: white; text-decoration: none;">
                    <button class="btn btn-primary btn-user btn-block">
                        <svg class="align-middle" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                        </svg>
                        Kembali
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>