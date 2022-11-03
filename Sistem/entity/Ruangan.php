<?php
class Ruangan
{
    private $kode;
    private $nama;

    /**
     * @return mixed
     */
    public function getKode()
    {
        return $this->kode;
    }

    /**
     * @param mixed $kode
     */
    public function setKode($kode)
    {
        $this->kode = $kode;
    }

    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * @param mixed $nama
     */
    public function setNama ($nama)
    {
        $this->nama = $nama;
    }
}
?>