<?php
class Jadwal
{
    private $kelas;
    private $tipe;
    private $matkul;
    private $ruangan;
    private $dosen;
    private $semester;


    /**
     * @return mixed
     */
    public function getKelas()
    {
        return $this->kelas;
    }

    /**
     * @param mixed $kelas
     */
    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }

    /**
     * @return mixed
     */
    public function getTipe()
    {
        return $this->tipe;
    }

    /**
     * @param mixed $tipe
     */
    public function setTipe($tipe)
    {
        $this->tipe = $tipe;
    }

    /**
     * @return Matkul
     */
    public function getMatkul()
    {
        if (!isset($this->matkul)) {
            $this->matkul = new Matkul();
        }
        return $this->matkul;
    }
    public function setMatkul($matkul)
    {
        $this->matkul = $matkul;
    }

    public function __set($nama, $value)
    {
        if (!isset($this->matkul)) {
            $this->matkul = new Matkul();
        }

        switch ($nama) {
            case 'Matkul kode':
                $this->matkul->setKode($value);
                break;
            case 'Matkul nama':
                $this->matkul->setNama($value);
                break;
        }
    }

    /**
     * @return Ruangan
     */
    public function getRuangan()
    {
        if (!isset($this->ruangan)) {
            $this->ruangan = new Ruangan();
        }
        return $this->ruangan;
    }
    public function setRuangan($ruangan)
    {
        $this->ruangan = $ruangan;
    }

    public function __set($nama, $value)
    {
        if (!isset($this->ruangan)) {
            $this->ruangan = new Ruangan();
        }

        switch ($nama) {
            case 'Ruangan_kode':
                $this->ruangan->setId($value);
                break;
            case 'Ruangan nama':
                $this->ruangan->setName($value);
                break;
        }
    }

    /**
     * @return Dosen
     */
    public function getDosen()
    {
        if (!isset($this->dosen)) {
            $this->dosen = new Dosen();
        }
        return $this->dosen;
    }
    public function setDosen($dosen)
    {
        $this->dosen = $dosen;
    }

    public function __set($nama, $value)
    {
        if (!isset($this->dosen)) {
            $this->dosen = new Dosen();
        }

        switch ($nama) {
            case 'Dosen nrp':
                $this->dosen->setNrp($value);
                break;
            case 'Dosen nama':
                $this->dosen->setNama($value);
                break;
        }
    }

    /**
     * @return Semester
     */
    public function getSemester()
    {
        if (!isset($this->semester)) {
            $this->semester = new Semester();
        }
        return $this->semester;
    }
    public function setSemester($semester)
    {
        $this->semester = $semester;
    }

    public function __set($jumlah, $value)
    {
        if (!isset($this->semester)) {
            $this->semester = new Semester();
        }

        switch ($jumlah) {
            case 'Semester_periode':
                $this->semester->setPeriode($value);
                break;
            case 'Semester jumlah':
                $this->semester->setJumlah($value);
                break;
        }
    }
}
