<?php
class Semester
{
    private $periode;
    private $jumlah_semester;

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
    public function getJumlahSemester()
    {
        return $this->jumlah_semester;
    }

    /**
     * @param mixed $jumlah
     */
    public function setJumlahSemester($jumlah_semester)
    {
        $this->jumlah_semester = $jumlah_semester;
    }

    public function __set($nama, $value)
    {
        switch ($nama) {
            case 'periode':
                $this->periode = $value;
                break;
        }
    }
}
