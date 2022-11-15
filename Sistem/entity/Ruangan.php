<?php
class Ruangan
{
    private $kode;
    private $nama;

    /**
     * @return mixed
     */
    public function getKodeR()
    {
        return $this->kode;
    }

    /**
     * @param mixed $kode
     */
    public function setKodeR($kode)
    {
        $this->kode = $kode;
    }

    /**
     * @return mixed
     */
    public function getNamaR()
    {
        return $this->nama;
    }

    /**
     * @param mixed $nama
     */
    public function setNamaR ($nama)
    {
        $this->nama = $nama;
    }

    public function __set($nama, $value)
    {    
        switch ($nama) {
            case 'kode_ruangan':
                $this->kode = $value;
                break;
            case 'nama_ruangan':
                $this->nama = $value;
                break;
        }
    }
}
?>