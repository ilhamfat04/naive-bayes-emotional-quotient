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
  <div class="container ">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="card o-hidden border-0 shadow-lg my-5 ">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h5 text-gray-900 "><b>KLASIFIKASI PENGARUH PENGGUNAAN GADGET TERHADAP KEMATANGAN KECERDASAN EMOSI</b></h1>
                  </div>
                  <br>

                  <form method="post" action="<?= base_url('naive_bayes'); ?>">
                    <div class=" form-group">
                      <select class="form-control" id="durasi" name="durasi" required>
                        <option value="" hidden>Durasi</option>
                        <?php foreach ($durasi as $drs) : ?>
                          <option value="<?= $drs->durasi ?>" <?php if ($drs->durasi == $hasil_durasi) {
                                                                echo "selected";
                                                              } ?>><?= $drs->durasi ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control" id="durasi" name="konten" required>
                        <option value="" hidden>Konten</option>
                        <?php foreach ($konten as $ktn) : ?>
                          <option value="<?= $ktn->konten ?>" <?php if ($ktn->konten == $hasil_konten) {
                                                                echo "selected";
                                                              } ?>><?= $ktn->konten ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control" id="tujuan" name="tujuan" required>
                        <option value="" hidden>Tujuan</option>
                        <?php foreach ($tujuan as $tjn) : ?>
                          <option value="<?= $tjn->tujuan ?>" <?php if ($tjn->tujuan == $hasil_tujuan) {
                                                                echo "selected";
                                                              } ?>><?= $tjn->tujuan ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Klasifikasikan
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="text-center" href="<?= base_url('Naive_bayes/detail_data') ?>" style="color: blue; text-decoration: none;">
                      Detail Data Latih
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="px-5 pb-5">
          <div class="table-responsive">
            <?php if ($hasil_durasi) { ?>
              <table class="table table-bordered rounded" style="background-color: aliceblue;">
                <thead class="thead-dark text-center">
                  <tr>
                    <th class="align-middle ">Durasi</th>
                    <th class="align-middle ">Konten</th>
                    <th class="align-middle ">Tujuan</th>
                    <th class="align-middle ">Tingkat Pengaruh Pola Penggunaan Gadget Anda Terhadap Tingkat Kematangan Kecerdasan Emosi Anda</th>
                    <th class="align-middle ">Detail</th>
                    <th class="align-middle ">Penanganan</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <tr>
                    <td><?= $hasil_durasi; ?></td>
                    <td><?= $hasil_konten; ?></td>
                    <td><?= $hasil_tujuan; ?></td>
                    <td><?= $kecerdasan; ?></td>
                    <td>
                      <button class="btn btn-primary btn-user btn-sm" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                          <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        </svg>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-primary btn-user btn-sm" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal2">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                          <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        </svg>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>



  </div>
</body>

</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Perhitungan Naive Bayes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="col-lg-10 mx-auto">
                <tr>
                  <th>Nilai Kelas Sangat Rendah</th>
                  <th>:</th>
                  <td><?= $hasil[0]; ?></td>
                </tr>
                <tr>
                  <th>Nilai Kelas Rendah</th>
                  <th>:</th>
                  <td><?= $hasil[1]; ?></td>
                </tr>
                <tr>
                  <th>Nilai Kelas Sedang</th>
                  <th>:</th>
                  <td><?= $hasil[2]; ?></td>
                </tr>
                <tr>
                  <th>Nilai Kelas Tinggi</th>
                  <th>:</th>
                  <td><?= $hasil[3]; ?></td>
                </tr>
                <tr>
                  <th>Nilai Kelas Sangat Tinggi</th>
                  <th>:</th>
                  <td><?= $hasil[4]; ?></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF" style="line-height:20px;" colspan=3>&nbsp;</td>
                </tr>
                <tr>
                  <th>Nilai Terbesar</th>
                  <th>:</th>
                  <td><?= max($hasil) ?></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF" style="line-height:7px;" colspan=3>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3">Sehingga, yang terpilih adalah <b> Kelas
                      <?php if (max($hasil) == $hasil[0]) {
                        echo "Sangat Rendah";
                      } elseif (max($hasil) == $hasil[1]) {
                        echo "Rendah";
                      } elseif (max($hasil) == $hasil[2]) {
                        echo "Sedang";
                      } elseif (max($hasil) == $hasil[3]) {
                        echo "Tinggi";
                      } else {
                        echo "Tinggi";
                      } ?> </b>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal2-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="">
              <div class="table-responsive">
                <?php if ($hasil_durasi) { ?>
                  <table class="table table-bordered rounded" style="background-color: aliceblue;">
                    <thead class="thead-dark text-center">
                      <tr>
                        <th>Penanganan
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="">
                      <?php if ($kecerdasan == "Berpengaruh Sangat Rendah") { ?>
                        <tr>
                          <td>
                            Anda memiliki tingkat kematangan kecerdasan emosi yang sangat baik, <b>pertahankan</b>
                          </td>
                        </tr>
                      <?php } ?>
                      <?php if ($kecerdasan == "Berpengaruh Rendah") { ?>
                        <tr>
                          <td>
                            Anda memiliki tingkat kematangan kecerdasan emosi yang baik, <b>tingkatkan</b>
                          </td>
                        </tr>
                      <?php } ?>
                      <?php if ($kecerdasan == "Berpengaruh Sedang") { ?>
                        <tr>
                          <td>
                            <b>Ada baiknya</b> anda dapat meningkatkan: <br>
                            1. Mengenali emosi diri <br>
                            2. Mengelola emosi <br>
                            3. Memotivasi diri sendiri <br>
                            4. Mengenali emosi orang lain <br>
                            5. Membina hubungan
                          </td>
                        </tr>
                      <?php } ?>
                      <?php if ($kecerdasan == "Berpengaruh Tinggi") { ?>
                        <tr>
                          <td>
                            <b>Disarankan</b> anda dapat meningkatkan: <br>
                            1. Mengenali emosi diri <br>
                            2. Mengelola emosi <br>
                            3. Memotivasi diri sendiri <br>
                            4. Mengenali emosi orang lain <br>
                            5. Membina hubungan
                          </td>
                        </tr>
                      <?php } ?>
                      <?php if ($kecerdasan == "Berpengaruh Sangat Tinggi") { ?>
                        <tr>
                          <td>
                            <b>Segera</b> anda berkonsultasi dengan pihak yang berkompeten (konselor/psikiater)
                          </td>
                        </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>