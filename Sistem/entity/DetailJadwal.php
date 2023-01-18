<?php
class DetailJadwal
{

    private $jumlah_pertemuan;
    private $tgl_pertemuan;
    private $waktu_mulai;
    private $waktu_selesai;
    private $materi;
    private $gambar;

    private $jadwal;

    /**
     * @return mixed
     */
    public function getJumlahP()
    {
        return $this->jumlah_pertemuan;
    }

    /**
     * @param mixed $jumlah
     */
    public function setJumlahP($jumlah_pertemuan)
    {
        $this->jumlah_pertemuan = $jumlah_pertemuan;
    }

    /**
     * @return mixed
     */
    public function getTglPertemuan()
    {
        return $this->tgl_pertemuan;
    }

    /**
     * @param mixed $waktu
     */
    public function setTglPertemuan($tgl_pertemuan)
    {
        $this->tgl_pertemuan = $tgl_pertemuan;
    }

    /**
     * @return mixed
     */
    public function getJMulai()
    {
        return $this->waktu_mulai;
    }

    /**
     * @param mixed $mulai
     */
    public function setJMulai($waktu_mulai)
    {
        $this->waktu_mulai = $waktu_mulai;
    }

    /**
     * @return mixed
     */
    public function getJSelesai()
    {
        return $this->waktu_selesai;
    }

    /**
     * @param mixed $selesai
     */
    public function setJSelesai($waktu_selesai)
    {
        $this->waktu_selesai = $waktu_selesai;
    }

    /**
     * @return mixed
     */
    public function getMateri()
    {
        return $this->materi;
    }

    /**
     * @param mixed $materi
     */
    public function setMateri($materi)
    {
        $this->materi = $materi;
    }

    /**
     * @return mixed
     */
    public function getGambar()
    {
        return $this->gambar;
    }

    /**
     * @param mixed $gambar
     */
    public function setGambar($gambar)
    {
        $this->gambar = $gambar;
    }

    /**
     * @return Jadwal
     */
    public function getJadwal()
    {
        if (!isset($this->jadwal)) {
            $this->jadwal = new Jadwal();
        }
        return $this->jadwal;
    }
    public function setJadwal($jadwal)
    {
        $this->jadwal = $jadwal;
    }

    public function __set($nama, $value)
    {
        if (!isset($this->jadwal)) {
            $this->jadwal = new Jadwal();
        }
        switch ($nama) {
            case 'jumlah_pertemuan':
                $this->setJumlahP($value);
                break;
            case 'waktu_pertemuan':
                $this->setTglPertemuan($value);
                break;
            case 'waktu_mulai':
                $this->setJMulai($value);
                break;
            case 'waktu_selesai':
                $this->setJSelesai($value);
                break;
            case 'kodematkul':
                $this->jadwal->getMatkul()->setKodeM($value);
                break;
            case 'nama_matkul':
                $this->jadwal->getMatkul()->setNamaM($value);
                break;
            case 'kelas':
                $this->jadwal->setKelas($value);
                break;
            case 'nrpdosen':
                $this->jadwal->getDosen()->setNrp($value);
                break;
            case 'namadosen':
                $this->jadwal->getDosen()->setNama($value);
                break;
            case 'periodesems':
                $this->jadwal->getSemester()->setPeriode($value);
                break;
            case 'tipe':
                $this->jadwal->setTipe($value);
                break;
        }
    }
}
