<?php
class Matkul
{
    private $kode_matkul;
    private $nama_matkul;

    /**
     * @return mixed
     */
    public function getKodeM()
    {
        return $this->kode_matkul;
    }

    /**
     * @param mixed $kode
     */
    public function setKodeM($kode_matkul)
    {
        $this->kode_matkul = $kode_matkul;
    }

    /**
     * @return mixed
     */
    public function getNamaM()
    {
        return $this->nama_matkul;
    }

    /**
     * @param mixed $nama
     */
    public function setNamaM($nama_matkul)
    {
        $this->nama_matkul = $nama_matkul;
    }

    public function __set($nama, $value)
    {
        switch ($nama) {
            case 'kode_matkul':
                $this->kode_matkul = $value;
                break;
            case 'nama_matkul':
                $this->nama_matkul = $value;
                break;
        }
    }
}
