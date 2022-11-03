<?php 
class Dosen
{
    private $nrp;
    private $nama;

    /**
     * @return mixed
     */
    public function getNrp()
    {
        return $this->nrp;
    }

    /**
     * @param mixed $nrp
     */
    public function setNrp($nrp)
    {
        $this->nrp = $nrp;
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
    public function setNama($nama)
    {
        $this->nama = $nama;
    }
}
?>