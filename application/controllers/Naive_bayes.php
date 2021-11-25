<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Naive_bayes extends CI_Controller
{

    public function index()
    {
        $kueri1 = "SELECT * FROM durasi";
        $data['durasi'] = $this->db->query($kueri1)->result();

        $kueri2 = "SELECT * FROM konten";
        $data['konten'] = $this->db->query($kueri2)->result();

        $kueri3 = "SELECT * FROM tujuan";
        $data['tujuan'] = $this->db->query($kueri3)->result();

        $durasi = $this->input->post('durasi');
        $konten = $this->input->post('konten');
        $tujuan = $this->input->post('tujuan');

        $data['hasil_durasi'] = $durasi;
        $data['hasil_konten'] = $konten;
        $data['hasil_tujuan'] = $tujuan;

        // kelas
        $total         = $this->db->select('*')->from('data_latih_5_kelas')->count_all_results();
        $sangat_rendah = $this->db->select('*')->from('data_latih_5_kelas')->where('kelas', 'sangat rendah')->count_all_results();
        $rendah        = $this->db->select('*')->from('data_latih_5_kelas')->where('kelas', 'rendah')->count_all_results();
        $sedang        = $this->db->select('*')->from('data_latih_5_kelas')->where('kelas', 'sedang')->count_all_results();
        $tinggi        = $this->db->select('*')->from('data_latih_5_kelas')->where('kelas', 'tinggi')->count_all_results();
        $sangat_tinggi = $this->db->select('*')->from('data_latih_5_kelas')->where('kelas', 'sangat tinggi')->count_all_results();

        if ($sangat_rendah == 0) {
            $sangat_rendah = 0.001;
        }

        if ($rendah == 0) {
            $rendah = 0.001;
        }

        if ($sedang == 0) {
            $sedang = 0.001;
        }

        if ($tinggi == 0) {
            $tinggi = 0.001;
        }

        if ($sangat_tinggi == 0) {
            $sangat_tinggi = 0.001;
        }


        // sangat rendah
        $durasi_sangat_rendah = $this->db->select('*')->from('data_latih_5_kelas')->where('durasi', $durasi)->where('kelas', 'sangat rendah')->count_all_results();
        $konten_sangat_rendah = $this->db->select('*')->from('data_latih_5_kelas')->where('konten', $konten)->where('kelas', 'sangat rendah')->count_all_results();
        $tujuan_sangat_rendah = $this->db->select('*')->from('data_latih_5_kelas')->where('tujuan', $tujuan)->where('kelas', 'sangat rendah')->count_all_results();

        if ($durasi_sangat_rendah == 0) {
            $durasi_sangat_rendah = 0.001;
        }

        if ($konten_sangat_rendah == 0) {
            $konten_sangat_rendah = 0.001;
        }

        if ($tujuan_sangat_rendah == 0) {
            $tujuan_sangat_rendah = 0.001;
        }

        $hasil_sangat_rendah  = ($durasi_sangat_rendah / $sangat_rendah) * ($konten_sangat_rendah / $sangat_rendah) * ($tujuan_sangat_rendah / $sangat_rendah);

        // rendah
        $durasi_rendah = $this->db->select('*')->from('data_latih_5_kelas')->where('durasi', $durasi)->where('kelas', 'rendah')->count_all_results();
        $konten_rendah = $this->db->select('*')->from('data_latih_5_kelas')->where('konten', $konten)->where('kelas', 'rendah')->count_all_results();
        $tujuan_rendah = $this->db->select('*')->from('data_latih_5_kelas')->where('tujuan', $tujuan)->where('kelas', 'rendah')->count_all_results();

        if ($durasi_rendah == 0) {
            $durasi_rendah = 0.001;
        }

        if ($konten_rendah == 0) {
            $konten_rendah = 0.001;
        }

        if ($tujuan_rendah == 0) {
            $tujuan_rendah = 0.001;
        }

        $hasil_rendah  = ($durasi_rendah / $rendah) * ($konten_rendah / $rendah) * ($tujuan_rendah / $rendah);

        // sedang
        $durasi_sedang = $this->db->select('*')->from('data_latih_5_kelas')->where('durasi', $durasi)->where('kelas', 'sedang')->count_all_results();
        $konten_sedang = $this->db->select('*')->from('data_latih_5_kelas')->where('konten', $konten)->where('kelas', 'sedang')->count_all_results();
        $tujuan_sedang = $this->db->select('*')->from('data_latih_5_kelas')->where('tujuan', $tujuan)->where('kelas', 'sedang')->count_all_results();

        if ($durasi_sedang == 0) {
            $durasi_sedang = 0.001;
        }

        if ($konten_sedang == 0) {
            $konten_sedang = 0.001;
        }

        if ($tujuan_sedang == 0) {
            $tujuan_sedang = 0.001;
        }

        $hasil_sedang  = ($durasi_sedang / $sedang) * ($konten_sedang / $sedang) * ($tujuan_sedang / $sedang);

        // tinggi
        $durasi_tinggi = $this->db->select('*')->from('data_latih_5_kelas')->where('durasi', $durasi)->where('kelas', 'tinggi')->count_all_results();
        $konten_tinggi = $this->db->select('*')->from('data_latih_5_kelas')->where('konten', $konten)->where('kelas', 'tinggi')->count_all_results();
        $tujuan_tinggi = $this->db->select('*')->from('data_latih_5_kelas')->where('tujuan', $tujuan)->where('kelas', 'tinggi')->count_all_results();

        if ($durasi_tinggi == 0) {
            $durasi_tinggi = 0.001;
        }

        if ($konten_tinggi == 0) {
            $konten_tinggi = 0.001;
        }

        if ($tujuan_tinggi == 0) {
            $tujuan_tinggi = 0.001;
        }

        $hasil_tinggi  = ($durasi_tinggi / $tinggi) * ($konten_tinggi / $tinggi) * ($tujuan_tinggi / $tinggi);


        // sangat tinggi
        $durasi_sangat_tinggi = $this->db->select('*')->from('data_latih_5_kelas')->where('durasi', $durasi)->where('kelas', 'sangat tinggi')->count_all_results();
        $konten_sangat_tinggi = $this->db->select('*')->from('data_latih_5_kelas')->where('konten', $konten)->where('kelas', 'sangat tinggi')->count_all_results();
        $tujuan_sangat_tinggi = $this->db->select('*')->from('data_latih_5_kelas')->where('tujuan', $tujuan)->where('kelas', 'sangat tinggi')->count_all_results();

        if ($durasi_sangat_tinggi == 0) {
            $durasi_sangat_tinggi = 0.001;
        }

        if ($konten_sangat_tinggi == 0) {
            $konten_sangat_tinggi = 0.001;
        }

        if ($tujuan_sangat_tinggi == 0) {
            $tujuan_sangat_tinggi = 0.001;
        }

        $hasil_sangat_tinggi  = ($durasi_sangat_tinggi / $sangat_tinggi) * ($konten_sangat_tinggi / $sangat_tinggi) * ($tujuan_sangat_tinggi / $sangat_tinggi);

        //hasil akhir
        $hasil_akhir_sangat_rendah = $hasil_sangat_rendah * ($sangat_rendah / $total);
        $hasil_akhir_rendah        = $hasil_rendah * ($rendah / $total);
        $hasil_akhir_sedang        = $hasil_sedang * ($sedang / $total);
        $hasil_akhir_tinggi        = $hasil_tinggi * ($tinggi / $total);
        $hasil_akhir_sangat_tinggi = $hasil_sangat_tinggi * ($sangat_tinggi / $total);

        $prediksi = max($hasil_akhir_sangat_rendah, $hasil_akhir_rendah, $hasil_akhir_sedang, $hasil_akhir_tinggi, $hasil_akhir_sangat_tinggi);

        // untuk data di modal
        $data['hasil'] = [$hasil_akhir_sangat_rendah, $hasil_akhir_rendah, $hasil_akhir_sedang, $hasil_akhir_tinggi, $hasil_akhir_sangat_tinggi];

        if ($prediksi == $hasil_akhir_sangat_rendah) {
            $data['kecerdasan'] = "Berpengaruh Sangat Rendah";
        } elseif ($prediksi == $hasil_akhir_rendah) {
            $data['kecerdasan'] = "Berpengaruh Rendah";
        } elseif ($prediksi == $hasil_akhir_sedang) {
            $data['kecerdasan'] = "Berpengaruh Sedang";
        } elseif ($prediksi == $hasil_akhir_tinggi) {
            $data['kecerdasan'] = "Berpengaruh Tinggi";
        } else {
            $data['kecerdasan'] = "Berpengaruh Sangat Tinggi";
        }


        $this->load->view('naivebayes', $data);
        $this->load->view('script');
    }

    public function detail_data()
    {
        // ==== DURASI ====

        // Inialisasi Subvariabel durasi
        $Q_Durasi = "SELECT durasi FROM data_latih_5_kelas GROUP BY durasi";
        $data['durasi'] = $this->db->query($Q_Durasi)->result_array();

        // Data durasi
        $Q_Sangat_Rendah = "SELECT durasi, COUNT(kelas) as Sangat_Rendah from data_latih_5_kelas WHERE kelas='Sangat Rendah' GROUP BY durasi";
        $sangat_rendah = $this->db->query($Q_Sangat_Rendah)->result_array();
        $nilai_asli = $this->db->query($Q_Sangat_Rendah)->result();

        $Q_Rendah = "SELECT durasi, COUNT(kelas) as Rendah from data_latih_5_kelas WHERE kelas='Rendah' GROUP BY durasi";
        $rendah = $this->db->query($Q_Rendah)->result_array();
        $nilai_asli = $this->db->query($Q_Rendah)->result();

        $Q_Sedang = "SELECT durasi, COUNT(kelas) as Sedang from data_latih_5_kelas WHERE kelas='Sedang' GROUP BY durasi";
        $sedang = $this->db->query($Q_Sedang)->result_array();

        $Q_Tinggi = "SELECT durasi, COUNT(kelas) as Tinggi from data_latih_5_kelas WHERE kelas='Tinggi' GROUP BY durasi";
        $tinggi = $this->db->query($Q_Tinggi)->result_array();

        $Q_Sangat_Tinggi = "SELECT durasi, COUNT(kelas) as Sangat_Tinggi from data_latih_5_kelas WHERE kelas='Sangat Tinggi' GROUP BY durasi";
        $sangat_tinggi = $this->db->query($Q_Sangat_Tinggi)->result_array();
        $nilai_asli = $this->db->query($Q_Sangat_Tinggi)->result();

        // Gabung durasi sangat rendah
        if ($sangat_rendah) {
            $no = 0;
            foreach ($data['durasi'] as $d) :
                foreach ($sangat_rendah as $r) :
                    if ($d['durasi'] == $r['durasi']) :
                        $data['durasi'][$no]['Sangat_Rendah'] = $r['Sangat_Rendah'];
                        break;
                    else :
                        $data['durasi'][$no]['Sangat_Rendah'] = "-";
                    endif;
                endforeach;
                $no++;
            endforeach;
        } else {
            $sangat_rendah = [0, 0, 0, 0, 0];

            $no = 0;
            foreach ($data['durasi'] as $d) :
                foreach ($sangat_rendah as $r) :
                    $data['durasi'][$no]['Sangat_Rendah'] = "-";
                endforeach;
                $no++;
            endforeach;
        }

        // Gabung durasi rendah
        $no = 0;
        foreach ($data['durasi'] as $d) :
            foreach ($rendah as $r) :
                if ($d['durasi'] == $r['durasi']) :
                    $data['durasi'][$no]['Rendah'] = $r['Rendah'];
                    break;
                else :
                    $data['durasi'][$no]['Rendah'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;


        // Gabung durasi sedang
        $no = 0;
        foreach ($data['durasi'] as $d) :
            foreach ($sedang as $s) :
                if ($d['durasi'] == $s['durasi']) :
                    $data['durasi'][$no]['Sedang'] = $s['Sedang'];
                    break;
                else :
                    $data['durasi'][$no]['Sedang'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;

        // Gabung durasi tinggi
        $no = 0;
        foreach ($data['durasi'] as $d) :
            foreach ($tinggi as $t) :
                if ($d['durasi'] == $t['durasi']) :
                    $data['durasi'][$no]['Tinggi'] = $t['Tinggi'];
                    break;
                endif;

                if ($d['durasi'] != $t['durasi']) :
                    $data['durasi'][$no]['Tinggi'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;

        // Gabung durasi sangat tinggi
        $no = 0;
        foreach ($data['durasi'] as $d) :
            foreach ($sangat_tinggi as $t) :
                if ($d['durasi'] == $t['durasi']) :
                    $data['durasi'][$no]['Sangat_Tinggi'] = $t['Sangat_Tinggi'];
                    break;
                endif;

                if ($d['durasi'] != $t['durasi']) :
                    $data['durasi'][$no]['Sangat_Tinggi'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;

        // ==== KONTEN ====

        // Inialisasi Subvariabel konten
        $Q_Konten = "SELECT konten FROM data_latih_5_kelas GROUP BY konten";
        $data['konten'] = $this->db->query($Q_Konten)->result_array();

        // Data konten
        $Q_Sangat_Rendah = "SELECT konten, COUNT(kelas) as Sangat_Rendah from data_latih_5_kelas WHERE kelas='Sangat Rendah' GROUP BY konten";
        $sangat_rendah = $this->db->query($Q_Sangat_Rendah)->result_array();
        $nilai_asli = $this->db->query($Q_Sangat_Rendah)->result();

        $Q_Rendah = "SELECT konten, COUNT(kelas) as Rendah from data_latih_5_kelas WHERE kelas='Rendah' GROUP BY konten";
        $rendah = $this->db->query($Q_Rendah)->result_array();

        $Q_Sedang = "SELECT konten, COUNT(kelas) as Sedang from data_latih_5_kelas WHERE kelas='Sedang' GROUP BY konten";
        $sedang = $this->db->query($Q_Sedang)->result_array();

        $Q_Tinggi = "SELECT konten, COUNT(kelas) as Tinggi from data_latih_5_kelas WHERE kelas='Tinggi' GROUP BY konten";
        $tinggi = $this->db->query($Q_Tinggi)->result_array();

        $Q_Sangat_Tinggi = "SELECT konten, COUNT(kelas) as Sangat_Tinggi from data_latih_5_kelas WHERE kelas='Sangat Tinggi' GROUP BY konten";
        $sangat_tinggi = $this->db->query($Q_Sangat_Tinggi)->result_array();
        $nilai_asli = $this->db->query($Q_Sangat_Tinggi)->result();

        // Gabung konten sangat rendah
        if ($sangat_rendah) {
            $no = 0;
            foreach ($data['konten'] as $d) :
                foreach ($sangat_rendah as $r) :
                    if ($d['konten'] == $r['konten']) :
                        $data['konten'][$no]['Sangat_Rendah'] = $r['Sangat_Rendah'];
                        break;
                    else :
                        $data['konten'][$no]['Sangat_Rendah'] = "-";
                    endif;
                endforeach;
                $no++;
            endforeach;
        } else {
            $sangat_rendah = [0, 0, 0, 0, 0];

            $no = 0;
            foreach ($data['konten'] as $d) :
                foreach ($sangat_rendah as $r) :
                    $data['konten'][$no]['Sangat_Rendah'] = "-";
                endforeach;
                $no++;
            endforeach;
        }

        // Gabung konten rendah
        $no = 0;
        foreach ($data['konten'] as $d) :
            foreach ($rendah as $r) :
                if ($d['konten'] == $r['konten']) :
                    $data['konten'][$no]['Rendah'] = $r['Rendah'];
                    break;
                else :
                    $data['konten'][$no]['Rendah'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;

        // Gabung konten sedang
        $no = 0;
        foreach ($data['konten'] as $d) :
            foreach ($sedang as $s) :
                if ($d['konten'] == $s['konten']) :
                    $data['konten'][$no]['Sedang'] = $s['Sedang'];
                    break;
                else :
                    $data['konten'][$no]['Sedang'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;

        // Gabung konten tinggi
        $no = 0;
        foreach ($data['konten'] as $d) :
            foreach ($tinggi as $t) :
                if ($d['konten'] == $t['konten']) :
                    $data['konten'][$no]['Tinggi'] = $t['Tinggi'];
                    break;
                endif;

                if ($d['konten'] != $t['konten']) :
                    $data['konten'][$no]['Tinggi'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;

        // Gabung konten sangat tinggi
        $no = 0;
        foreach ($data['konten'] as $d) :
            foreach ($sangat_tinggi as $t) :
                if ($d['konten'] == $t['konten']) :
                    $data['konten'][$no]['Sangat_Tinggi'] = $t['Sangat_Tinggi'];
                    break;
                endif;

                if ($d['konten'] != $t['konten']) :
                    $data['konten'][$no]['Sangat_Tinggi'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;


        // ==== TUJUAN ====

        // Inialisasi Subvariabel tujuan
        $Q_tujuan = "SELECT tujuan FROM data_latih_5_kelas GROUP BY tujuan";
        $data['tujuan'] = $this->db->query($Q_tujuan)->result_array();

        // Data tujuan        
        $Q_Sangat_Rendah = "SELECT tujuan, COUNT(kelas) as Sangat_Rendah from data_latih_5_kelas WHERE kelas='Sangat Rendah' GROUP BY tujuan";
        $sangat_rendah = $this->db->query($Q_Sangat_Rendah)->result_array();

        $Q_Rendah = "SELECT tujuan, COUNT(kelas) as Rendah from data_latih_5_kelas WHERE kelas='Rendah' GROUP BY tujuan";
        $rendah = $this->db->query($Q_Rendah)->result_array();

        $Q_Sedang = "SELECT tujuan, COUNT(kelas) as Sedang from data_latih_5_kelas WHERE kelas='Sedang' GROUP BY tujuan";
        $sedang = $this->db->query($Q_Sedang)->result_array();

        $Q_Tinggi = "SELECT tujuan, COUNT(kelas) as Tinggi from data_latih_5_kelas WHERE kelas='Tinggi' GROUP BY tujuan";
        $tinggi = $this->db->query($Q_Tinggi)->result_array();

        $Q_Sangat_Tinggi = "SELECT tujuan, COUNT(kelas) as Sangat_Tinggi from data_latih_5_kelas WHERE kelas='Sangat Tinggi' GROUP BY tujuan";
        $sangat_tinggi = $this->db->query($Q_Sangat_Tinggi)->result_array();

        // Gabung tujuan sangat rendah
        if ($sangat_rendah) {
            $no = 0;
            foreach ($data['tujuan'] as $d) :
                foreach ($sangat_rendah as $r) :
                    if ($d['tujuan'] == $r['tujuan']) :
                        $data['tujuan'][$no]['Sangat_Rendah'] = $r['Sangat_Rendah'];
                        break;
                    else :
                        $data['tujuan'][$no]['Sangat_Rendah'] = "-";
                    endif;
                endforeach;
                $no++;
            endforeach;
        } else {
            $sangat_rendah = [0, 0, 0, 0, 0];

            $no = 0;
            foreach ($data['tujuan'] as $d) :
                foreach ($sangat_rendah as $r) :
                    $data['tujuan'][$no]['Sangat_Rendah'] = "-";
                endforeach;
                $no++;
            endforeach;
        }

        // Gabung tujuan rendah
        $no = 0;
        foreach ($data['tujuan'] as $d) :
            foreach ($rendah as $r) :
                if ($d['tujuan'] == $r['tujuan']) :
                    $data['tujuan'][$no]['Rendah'] = $r['Rendah'];
                    break;
                else :
                    $data['tujuan'][$no]['Rendah'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;

        // Gabung tujuan sedang
        $no = 0;
        foreach ($data['tujuan'] as $d) :
            foreach ($sedang as $s) :
                if ($d['tujuan'] == $s['tujuan']) :
                    $data['tujuan'][$no]['Sedang'] = $s['Sedang'];
                    break;
                else :
                    $data['tujuan'][$no]['Sedang'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;

        // Gabung tujuan tinggi
        $no = 0;
        foreach ($data['tujuan'] as $d) :
            foreach ($tinggi as $t) :
                if ($d['tujuan'] == $t['tujuan']) :
                    $data['tujuan'][$no]['Tinggi'] = $t['Tinggi'];
                    break;
                endif;

                if ($d['tujuan'] != $t['tujuan']) :
                    $data['tujuan'][$no]['Tinggi'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;

        // Gabung tujuan sangat tinggi
        $no = 0;
        foreach ($data['tujuan'] as $d) :
            foreach ($sangat_tinggi as $t) :
                if ($d['tujuan'] == $t['tujuan']) :
                    $data['tujuan'][$no]['Sangat_Tinggi'] = $t['Sangat_Tinggi'];
                    break;
                endif;

                if ($d['tujuan'] != $t['tujuan']) :
                    $data['tujuan'][$no]['Sangat_Tinggi'] = "-";
                endif;
            endforeach;
            $no++;
        endforeach;


        // TOTAL Per Kelas
        $total   = "SELECT kelas,COUNT(id) AS Total FROM data_latih_5_kelas GROUP BY kelas";
        $data['total'] = $this->db->query($total)->result();

        // print_r($data['total']);

        $this->load->view('detail_data', $data);
        $this->load->view('script');
    }
}
