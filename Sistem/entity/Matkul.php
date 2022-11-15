<?php
class Matkul
{
    private $kode;
    private $nama;

    /**
     * @return mixed
     */
    public function getKodeM()
    {
        return $this->kode;
    }

    /**
     * @param mixed $kode
     */
    public function setKodeM($kode)
    {
        $this->kode = $kode;
    }

    /**
     * @return mixed
     */
    public function getNamaM()
    {
        return $this->nama;
    }

    /**
     * @param mixed $nama
     */
    public function setNamaM ($nama)
    {
        $this->nama = $nama;
    }

    public function __set($nama, $value)
    {    
        switch ($nama) {
            case 'kode_matkul':
                $this->kode = $value;
                break;
            case 'nama_matkul':
                $this->nama = $value;
                break;
        }
    }

}
?>