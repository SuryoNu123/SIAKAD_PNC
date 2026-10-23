<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use App\Models\TranscriptModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Transcript extends BaseController
{
    public function index($npm)
    {
        $mhsModel   = new ProfileModel();
        $nilaiModel = new TranscriptModel();

        $mahasiswa = $mhsModel->where('npm', $npm)->first();

        if (!$mahasiswa) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mahasiswa dengan NPM $npm tidak ditemukan");
        }

        $npm = $mahasiswa['npm'];

        // Ambil semester
        $semester = $this->request->getGet('semester');
        if (!$semester) {
            $first = $nilaiModel->getFirstSemester($npm);
            $semester = $first['semester'] ?? 1;
        }

        $data['mahasiswa'] = $mahasiswa;
        $data['nilai']     = $nilaiModel->getTranskripByMahasiswa($npm, $semester);
        $data['semester']  = $semester;
        $data['npm']       = $npm;

        return view('transcript/index', $data);
    }


    // DOWNLOAD KHS (per semester)
    public function downloadKHS()
    {
        $id       = $this->request->getGet('id');
        $semester = $this->request->getGet('semester');

        $nilaiModel = new TranscriptModel();
        $mhsModel   = new ProfileModel();

        $data['mahasiswa'] = $mhsModel->find($id);
        $data['semester']  = $semester;
        $data['nilai']     = $nilaiModel->getTranskripByMahasiswa($id, $semester);

        // Render view ke HTML
        $html = view('transcript/pdf_khs', $data);

        // Convert ke PDF
        return $this->generatePDF($html, "KHS-Semester-$semester.pdf");
    }


    // DOWNLOAD TRANSKRIP FULL
    public function downloadFull()
    {
        $id = $this->request->getGet('id');

        $nilaiModel = new TranscriptModel();
        $mhsModel   = new ProfileModel();

        $data['mahasiswa'] = $mhsModel->find($id);
        $data['nilai']     = $nilaiModel->getAllTranskrip($id);

        $html = view('transcript/pdf_full', $data);

        return $this->generatePDF($html, "Transkrip-Nilai-Full.pdf");
    }


    // DOWNLOAD GRADE
    public function downloadGrade()
    {
        $id = $this->request->getGet('id');

        $nilaiModel = new TranscriptModel();
        $mhsModel   = new ProfileModel();

        $data['mahasiswa'] = $mhsModel->find($id);
        $data['nilai']     = $nilaiModel->getAllTranskrip($id);

        $html = view('transcript/pdf_grade', $data);

        return $this->generatePDF($html, "Grade-Report.pdf");
    }


    // FUNGSI UMUM PDF
    private function generatePDF($html, $filename)
{
    $options = new Options();
    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // TAMPIL DI BROWSER
    return $dompdf->stream($filename, ["Attachment" => false]);
}

}

