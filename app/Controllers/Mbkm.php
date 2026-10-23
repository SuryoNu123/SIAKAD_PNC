<?php
namespace App\Controllers;

use App\Models\ProgramModel;
use App\Models\ReportModel;
use App\Models\EvaluationModel;
use App\Models\MahasiswaModel;
use App\Models\DeadlineModel;
use App\Models\MeetingModel;
use App\Models\CertificateModel;

class Mbkm extends BaseController
{
    protected $programModel;
    protected $reportModel;
    protected $evaluationModel;
    protected $mahasiswaModel;
    protected $deadlineModel;
    protected $meetingModel;
    protected $certificateModel;

    public function __construct()
    {
        $this->programModel = new ProgramModel();
        $this->reportModel = new ReportModel();
        $this->evaluationModel = new EvaluationModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->deadlineModel = new DeadlineModel();
        $this->meetingModel = new MeetingModel();
        $this->certificateModel = new CertificateModel();
    }

    

    public function index()
    {
        $npm = session()->get('npm'); 
        if (!$npm) return redirect()->to('/login');

        $mahasiswa = $this->mahasiswaModel
            ->where('npm', $npm)
            ->first();

        $data = [
            'title'         => 'MBKM - Dashboard',
            'mahasiswa'    => $mahasiswa,
            'programs'      => $this->programModel->orderBy('id','ASC')->findAll(),
            'reports'       => $this->reportModel->forUser($mahasiswa['npm']),
            'evaluations'   => $this->evaluationModel->orderBy('rating','DESC')->findAll(),
            'deadlines'   => $this->deadlineModel->where('npm', $mahasiswa['npm'])->findAll(),
            'meetings'    => $this->meetingModel->where('npm', $mahasiswa['npm'])->findAll(),
            'certificates'=> $this->certificateModel->where('npm', $mahasiswa['npm'])->findAll(),
        ];

        return view('mbkm/index', $data);
    }

    public function register()
    {
        $npm = session()->get('npm');
        if (!$npm) return redirect()->to('/login');

        $mahasiswa = $this->mahasiswaModel
            ->where('npm', $npm)
            ->first();

        $data = [
            'title'      => 'Register Program MBKM',
            'mahasiswa'  => $mahasiswa
        ];

        return view('mbkm/register', $data); 
    }

    public function saveProgram()
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'company' => $this->request->getPost('company'),
            'duration' => $this->request->getPost('duration'),
            'status' => 'Active',
            'progress' => 0
        ];

        $this->programModel->insert($data);

        return redirect()->to('/mbkm')->with('success','Program berhasil ditambahkan!');
    }

    public function uploadReport()
    {


        $npm = session()->get('npm'); 
        if (!$npm) {
            return redirect()->to('/login');
        }

        $file = $this->request->getFile('report_file');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak valid atau tidak diupload.');
        }

        // Generate nama aman
        $newName = $file->getRandomName();

        // Pastikan folder ada
        $uploadPath = WRITEPATH . 'uploads/reports';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Pindahkan file
        $file->move($uploadPath, $newName);

        // SIMPAN KE DATABASE 
        $this->reportModel->insert([
            'program_id' => $this->request->getPost('program_id'),
            'npm'   => $npm,
            'title'      => $file->getClientName(),
            'file_path'  => 'uploads/reports/' . $newName,
            'status'     => 'Submitted',
            'created_at'=> date('Y-m-d H:i:s') 
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil diupload.');
    }

    public function program($id = null)
    {
        $program = $this->programModel->find($id);
        if (!$program) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Program MBKM tidak ditemukan.");
        }

        $evaluations = $this->evaluationModel->forProgram($id);

        return view('mbkm/program', [
            'title'         => $program['title'],
            'program'       => $program,
            'evaluations'   => $evaluations
        ]);
    }
}
