<?php
class Semester
{
    private $periode;
    private $jumlah;

    /**
     * @return mixed
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * @param mixed $periode
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;
    }

    /**
     * @return mixed
     */
    public function getJumlah()
    {
        return $this->jumlah;
    }

    /**
     * @param mixed $jumlah
     */
    public function setJumlah($jumlah)
    {
        $this->jumlah = $jumlah;
    }

    public function __set($nama, $value)
    {    
        switch ($nama) {
            case 'periode':
                $this->periode = $value;
                break;
            case 'jumlah_semester':
                $this->jumlah = $value;
                break;
        }
    }

}
?>