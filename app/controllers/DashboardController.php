<?php 

class DashboardController extends Controller
{
    private DashboardService $dashboardService;

    public function __construct()
    {
        AuthMiddleware::check();

        $db = Database::getInstance();
        $this->dashboardService = new DashboardService($db);
    }

    public function index()
    {
        $data = $this->dashboardService->getDashboardData();
        // dd($data);
        $this->view("dashboard", $data, "Dashboard");
    }
}