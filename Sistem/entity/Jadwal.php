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
    
    public function __set($nama, $value)
    {
        if (!isset($this->matkul)) {
            $this->matkul = new Matkul();
        }
        if (!isset($this->ruangan)) {
            $this->ruangan = new Ruangan();
        }
        if (!isset($this->dosen)) {
            $this->dosen = new Dosen();
        }
        if (!isset($this->semester)) {
            $this->semester = new Semester();
        }
    
        switch ($nama) {
            case 'kodematkul':
                $this->matkul->setKodeM($value);
                break;
            case 'nama_matkul':
                $this->matkul->setNamaM($value);
                break;
            case 'koderuangan':
                $this->ruangan->setKodeR($value);
                break;
            case 'nama_ruangan':
                $this->ruangan->setNamaR($value);
                break;
            case 'nrpdosen':
                $this->dosen->setNrp($value);
                break;
            case 'nama_dosen':
                $this->dosen->setNama($value);
                break;
            case 'periodesems':
                $this->semester->setPeriode($value);
                break;
            case 'jumlah_semester':
                $this->semester->setJumlah($value);
                break;
        }
    }
}
